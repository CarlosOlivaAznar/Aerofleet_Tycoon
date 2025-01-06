<?php

namespace Tests\Feature;

use App\Models\Sede;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class MapaTest extends TestCase
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

    public function test_mostrar_pagina_mapa_sin_autentificar()
    {
        $response = $this->get('/mapa');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_mostrar_pagina_mapa()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->get('/mapa');

        $response->assertStatus(200);
    }
}
