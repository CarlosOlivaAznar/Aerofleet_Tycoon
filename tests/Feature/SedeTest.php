<?php

namespace Tests\Feature;

use App\Models\Flota;
use App\Models\Hangar;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SedeTest extends TestCase
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

    public function test_mostrar_pagina_sede_sin_autentificar()
    {
        $response = $this->get('/sede');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_mostrar_pagina_sede()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->get('/sede');

        $response->assertStatus(200);
    }

    public function test_comprar_hangar()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->actingAs($this->user)->get(route('sede.comprarHangar'));

        $response->assertRedirect(route('sede.index'));
        $response->assertSessionHas('exito', trans('hq.hangarBuySuccess'));
    }

    public function test_contratar_ingenieros()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->actingAs($this->user)->get(route('sede.contratarIngenieros'));

        $response->assertRedirect(route('sede.index'));
        $response->assertSessionHas('exito', trans('hq.hireEngSuccess'));
    }

    public function test_ampliar_hangar()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $hangar = Hangar::factory()->create();

        $response = $this->actingAs($this->user)->get(route('sede.ampliarHangar', ["id" => $hangar->id]));

        $response->assertRedirect(route('sede.index'));
        $response->assertSessionHas('exito', trans('hq.hangarEnlarge'));

        $hangar->refresh();
    
        $this->assertEquals(3, $hangar->espacios);
    }

    public function test_quitar_mantenimiento()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $flota = Flota::factory()->create();
        $flota->estado = 2;
        $flota->update();

        $response = $this->actingAs($this->user)->get(route('sede.quitarMantenimiento', ["id" => $flota->id]));

        $response->assertRedirect(route('sede.index'));

        $flota->refresh();
    
        $this->assertEquals(0, $flota->estado);
    }

    public function test_modificar_nombre()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $nombre = "Tests Airways";

        $response = $this->post(route('sede.modificarNombre'), [
            'nombreNuevo' => $nombre,
        ]);

        $response->assertRedirect(route('sede.index'));
        
        $this->assertDatabaseHas('users', [
            'nombreCompanyia' => $nombre,
        ]);
    }
}
