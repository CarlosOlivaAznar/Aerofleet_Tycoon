<?php

namespace Tests\Feature;

use App\Models\Aeropuerto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        // Ejecutar los seeders
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);

        $this->user = User::factory()->create([
            'password' => Hash::make('password'),
            'saldo' => 4000000000,
        ]);

        $_COOKIE['modoOscuro'] = "false";
    }

    public function test_mostrar_pagina_home_sin_autentificar()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_mostrar_pagina_home()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->get('/home');

        // Como no tenemos sede nos tendra que redirigir a la pestaña de crear compañia
        $response->assertStatus(302);
        $response->assertRedirect('/home/company');
    }

    public function test_crear_aerolinea()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $aeropuertoId = rand(1,30);
        $nombreAerolinea = "Test Airways";

        $response = $this->post(route('home.submit'), [
            'sedeHid' => $aeropuertoId,
            'nombreCompanyia' => $nombreAerolinea,
        ]);

        $response->assertRedirect(route('home.index'));

        $this->assertDatabaseHas('sedes', [
            'user_id' => $this->user->id,
            'aeropuerto_id' => $aeropuertoId,
        ]);

        $this->assertDatabaseHas('users', [
            'nombreCompanyia' => $nombreAerolinea,
        ]);
    }
}
