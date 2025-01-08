<?php

namespace Tests\Feature;

use App\Models\Sede;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CompetenciaTest extends TestCase
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

    public function test_mostrar_pagina_competencia_sin_autentificar()
    {
        $response = $this->get('/competencia');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_mostrar_pagina_competencia()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->get('/competencia');

        $response->assertStatus(200);
    }

    public function test_ver_demanda_ruta()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->post(route('competencia.demandaRuta'), [
            'origenHid' => rand(1,20),
            'destinoHid' => rand(21,40),
        ]);

        $response->assertViewIs('competencia.demandaRuta');
    }

    public function test_ver_rutas_competencia()
    {
        $this->actingAs($this->user);

        $user2 = User::factory()->create();

        $response = $this->post(route('competencia.rutas'), [
            'companyiaHid' => $user2->id,
        ]);

        $response->assertViewIs('competencia.rutasCompetencia');
    }

    public function test_ver_rankings()
    {
        $this->actingAs($this->user);

        $user2 = User::factory()->create();
        $user3 = User::factory()->create();
        
        $sede2 = Sede::factory()->withUserId($user2->id)->create();
        $sede3 = Sede::factory()->withUserId($user3->id)->create();

        $response = $this->get('/competencia/rankings');
        $response->assertStatus(200);
    }
}
