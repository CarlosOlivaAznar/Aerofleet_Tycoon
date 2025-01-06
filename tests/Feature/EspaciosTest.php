<?php

namespace Tests\Feature;

use App\Models\Espacio;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class EspaciosTest extends TestCase
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

    public function test_mostrar_pagina_espacios_sin_autentificar()
    {
        $response = $this->get('/espacios');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_mostrar_pagina_espacios()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->get('/espacios');

        $response->assertStatus(200);
    }

    public function test_comprar_espacio()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->post(route('espacios.comprar'), [
            'aeropuerto' => "LEMD",
            'espacios' => rand(1, 5),
        ]);

        $response->assertRedirect(route('espacios.index'));
        $response->assertSessionHas('exito', trans('slots.slotBuySuccess'));

        $this->assertDatabaseHas('espacios', [
            'user_id' => $this->user->id,
        ]);
    }

    public function test_vender_espacio()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $espacio = Espacio::factory()->create();

        $response = $this->actingAs($this->user)->get(route('espacios.vender', ['id' => $espacio->id]));

        $response->assertRedirect(route('espacios.index'));
        $response->assertSessionHas('exito', trans('slots.sellSuccess') . ' ' . $espacio->aeropuerto->nombre);
    }

    public function test_vender_espacio_otro_usuario()
    {
        $user2 = User::factory()->create();

        // Autentificacion del usuario
        $this->actingAs($this->user);

        $espacio = Espacio::factory()->withUserId($user2->id)->create();

        $response = $this->actingAs($this->user)->get(route('espacios.vender', ['id' => $espacio->id]));

        $response->assertRedirect(route('espacios.index'));
        $response->assertSessionHas('error', trans('slots.errUser'));
    }
}
