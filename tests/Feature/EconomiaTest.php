<?php

namespace Tests\Feature;

use App\Models\Accion;
use App\Models\Flota;
use App\Models\Prestamo;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class EconomiaTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $sede;

    public function setUp(): void
    {
        parent::setUp();

        // Ejecutar los seeders
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);

        $this->user = User::factory()->create([
            'password' => Hash::make('password'),
            'saldo' => 4000000000,
        ]);

        // Creamos la sede
        $this->sede = Sede::factory()->create();

        $_COOKIE['modoOscuro'] = "false";
    }

    public function test_mostrar_pagina_flota_sin_autentificar()
    {
        $response = $this->get('/economia');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_mostrar_pagina_flota()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->get('/economia');

        $response->assertStatus(200);
    }

    public function test_mostrar_pagina_leasing()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->get('/economia/leasing');

        $response->assertStatus(200);
    }

    public function test_mostrar_pagina_prestamos()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->get('/economia/prestamos');

        $response->assertStatus(200);
    }

    public function test_mostrar_pagina_acciones()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->get('/economia/acciones');

        $response->assertStatus(200);
    }


    // Tests leasing
    public function test_contratar_leasing()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->post(route('economia.contratarLeasing'), [
            'avion' => 4,
            'dias' => rand(5,30),
        ]);

        $response->assertRedirect(route('economia.leasing'));
        $response->assertSessionHas('exito', trans('economy.leasingSuccess'));

        $this->assertDatabaseHas('flota', [
            'user_id' => $this->user->id,
            'avion_id' => 4,
            'leasing' => true,
        ]);
    }

    public function test_fin_leasing()
    {
        // Autentificamos al usuario
        $this->actingAs($this->user);

        $leasing = Flota::factory()->withUserIdLeasing($this->user->id, true)->create();

        $response = $this->actingAs($this->user)->get(route('economia.finLeasing', ['id' => $leasing->id]));

        $response->assertRedirect(route('economia.leasing'));
        $response->assertSessionHas('exito', trans('economy.successEndLease'));
    }

    public function test_fin_leasing_otro_usuario()
    {
        $user2 = User::factory()->create();

        // Autentificamos al usuario
        $this->actingAs($this->user);

        $leasing = Flota::factory()->withUserIdLeasing($user2->id, true)->create();

        $response = $this->actingAs($this->user)->get(route('economia.finLeasing', ['id' => $leasing->id]));

        $response->assertRedirect(route('economia.leasing'));
        $response->assertSessionHas('error', trans('economy.errorEndLeaseNP'));
        $this->assertDatabaseHas('flota', [
            'user_id' => $user2->id,
            'leasing' => true,
        ]);  
    }

    // Tests prestamos
    public function test_contratar_prestamo()
    {
        // Autentificamos al usuario
        $this->actingAs($this->user);

        $response = $this->post(route('economia.prestamoFinalizado'), [
            'prestamo' => 40000000,
            'meses' => rand(5,30),
        ]);

        $response->assertRedirect(route('economia.prestamos'));
        $response->assertSessionHas('exito', trans('economy.loanSuccess'));

        $this->assertDatabaseHas('prestamos', [
            'user_id' => $this->user->id,
        ]);
    }

    public function test_contratar_prestamo_limite()
    {
        // Autentificamos al usuario
        $this->actingAs($this->user);

        $response = $this->post(route('economia.prestamoFinalizado'), [
            'prestamo' => 300000001,
            'meses' => rand(5,30),
        ]);

        $response->assertSessionHas('error', trans('economy.loanLimitexceeded'));

        $this->assertDatabaseMissing('prestamos', [
            'user_id' => $this->user->id,
        ]);
    }

    public function test_devolver_prestamo()
    {
        // Autentificamos al usuario
        $this->actingAs($this->user);

        $prestamo = Prestamo::factory()->create();

        $response = $this->actingAs($this->user)->get(route('economia.devolverPrestamo', ['id' => $prestamo->id]));

        $response->assertRedirect(route('economia.prestamos'));
        $response->assertSessionHas('exito', trans('economy.loanReturned'));
        $this->assertDatabaseMissing('prestamos', [
            'user_id' => $this->user->id,
            'id' => $prestamo->id,
        ]);
    }

    public function test_devolver_prestamo_sin_saldo()
    {
        // Autentificamos al usuario
        $this->actingAs($this->user);

        $this->user->saldo = 5000000;
        $this->user->update();

        $prestamo = Prestamo::factory()->create();

        $response = $this->actingAs($this->user)->get(route('economia.devolverPrestamo', ['id' => $prestamo->id]));

        $response->assertRedirect(route('economia.prestamos'));
        $response->assertSessionHas('error', trans('economy.neBalance'));
        $this->assertDatabaseHas('prestamos', [
            'user_id' => $this->user->id,
            'id' => $prestamo->id,
        ]);
    }

    // Test acciones

    public function test_comprar_acciones()
    {
        $user2 = User::factory()->create();
        $sede2 = Sede::factory()->withUserIdShares($user2->id)->create();

        // Autentificamos al usuario
        $this->actingAs($this->user);

        $response = $this->post(route('economia.comprarAccionesPost'), [
            'sede' => $sede2->id,
            'porcentajeAcciones' => rand(1, 7),
        ]);

        $response->assertRedirect(route('economia.comprarAcciones'));
        $response->assertSessionHas('exito', trans('economy.buySharesSuccess'));

        $this->assertDatabaseHas('acciones', [
            'user_id' => $this->user->id,
            'sede_id' => $sede2->id
        ]);
    }

    public function test_vender_acciones()
    {
        $user2 = User::factory()->create();
        $sede2 = Sede::factory()->withUserIdShares($user2->id)->create();

        // Autentificamos al usuario
        $this->actingAs($this->user);

        $accion = Accion::factory()->create();

        $response = $this->actingAs($this->user)->get(route('economia.venderAcciones', ['id' => $accion->id]));

        $response->assertRedirect(route('economia.acciones'));
        $response->assertSessionHas('exito', trans('economy.sellSharesSuccess'));
        $this->assertDatabaseMissing('prestamos', [
            'user_id' => $this->user->id,
            'id' => $accion->id,
        ]);
    }

    public function test_vender_acciones_otro_usuario()
    {
        $user2 = User::factory()->create();
        $sede2 = Sede::factory()->withUserIdShares($user2->id)->create();

        $user3 = User::factory()->create();
        $sede3 = Sede::factory()->withUserIdShares($user3->id)->create();

        // Autentificamos al usuario
        $this->actingAs($this->user);

        $accion = Accion::factory()->create();

        $response = $this->actingAs($user3)->get(route('economia.venderAcciones', ['id' => $accion->id]));

        $response->assertRedirect(route('economia.acciones'));
        $response->assertSessionHas('error', trans('economy.sellSharesError'));
        $this->assertDatabaseHas('acciones', [
            'user_id' => $this->user->id,
            'id' => $accion->id,
        ]);
    }

    public function test_vender_acciones_propias()
    {
        // Autentificamos al usuario
        $this->actingAs($this->user);

        $response = $this->post(route('economia.venderAccionesPropias'), [
            'porcentajeVenta' => 15,
        ]);

        $response->assertRedirect(route('economia.acciones'));
        $response->assertSessionHas('exito', trans('economy.sellOwnSharesSuccess'));

        $this->assertDatabaseHas('sedes', [
            'user_id' => $this->user->id,
            'porcentajeVenta' => 0.15,
        ]);
    }

    public function test_recomprar_acciones_propias()
    {
        // Autentificamos al usuario
        $this->actingAs($this->user);

        $this->sede->porcentajeVenta = 0.15;
        $this->sede->update();

        $response = $this->post(route('economia.recomprarAccionesPropias'), [
            'porcentajeCompra' => 5,
        ]);

        $response->assertRedirect(route('economia.acciones'));
        $response->assertSessionHas('exito', trans('economy.buySharesSuccess'));

        $this->assertDatabaseHas('sedes', [
            'user_id' => $this->user->id,
            'porcentajeVenta' => 0.10,
        ]);
    }    
}
