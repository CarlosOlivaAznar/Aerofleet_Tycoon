<?php

namespace Tests\Feature;

use App\Models\Avionsh;
use App\Models\Flota;
use App\Models\Hangar;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class FlotaTest extends TestCase
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
        $response = $this->get('/flota');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_mostrar_pagina_flota()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->get('/flota');

        $response->assertStatus(200);
    }

    public function test_comprar_avion_segunda_mano()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $avionSh = Avionsh::factory()->create();

        $response = $this->actingAs($this->user)->get(route('flota.comprarSegundaMano', ['id' => $avionSh->id]));

        $response->assertRedirect(route('flota.index'));
        $response->assertSessionHas('exito', trans('fleet.buySucces'));
    }

    public function test_comprar_avion_primera_mano()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->actingAs($this->user)->get(route('flota.comprar', ['id' => rand(1,30)]));

        $response->assertRedirect(route('flota.index'));
        $response->assertSessionHas('exito', trans('fleet.buySucces'));
    }

    public function test_vender_avion()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $flota = Flota::factory()->create();

        $response = $this->actingAs($this->user)->get(route('flota.vender', ['id' => $flota->id]));

        $response->assertRedirect(route('flota.index'));
        $response->assertSessionHas('exito', trans('fleet.sellSucces'));
        $this->assertDatabaseMissing('flota', ['id' => $flota->id]);
    }

    public function test_vender_avion_otro_usuario()
    {
        $user2 = User::factory()->create();

        // Autentificamos al usuario
        $this->actingAs($this->user);

        $flota =  Flota::factory()->withUserId($user2->id)->create();

        $response = $this->actingAs($this->user)->get(route('flota.vender', ['id' => $flota->id]));

        $response->assertRedirect(route('flota.index'));
        $response->assertSessionHas('error', trans('fleet.nyProperty'));
        $this->assertDatabaseHas('flota', ['id' => $flota->id]);
    }

    public function test_mantenimiento()
    {
        // Autentificamos al usuario
        $this->actingAs($this->user);

        $flota = Flota::factory()->create();
        $hangar = Hangar::factory()->withUserId($this->sede->id)->create();

        $response = $this->actingAs($this->user)->get(route('flota.mantenimiento', ['id' => $flota->id]));

        $response->assertRedirect(route('flota.index'));
        $flota->refresh();
        $this->assertEquals(2, $flota->estado);
    }

    public function test_mantenimiento_otro_usuario()
    {
        $user2 = User::factory()->create();

        // Autentificamos al usuario
        $this->actingAs($this->user);

        $flota =  Flota::factory()->withUserId($user2->id)->create();
        $hangar = Hangar::factory()->withUserId($this->sede->id)->create();

        $response = $this->actingAs($this->user)->get(route('flota.mantenimiento', ['id' => $flota->id]));


        $response->assertRedirect(route('flota.index'));
        $response->assertSessionHas('error', trans('fleet.nyProperty'));
        $flota->refresh();
        $this->assertEquals(1, $flota->estado);
    }
}
