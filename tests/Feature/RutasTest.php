<?php

namespace Tests\Feature;

use App\Models\Espacio;
use App\Models\Flota;
use App\Models\Ruta;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RutasTest extends TestCase
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
        ]);

        $_COOKIE['modoOscuro'] = "false";
    }

    /**
     * Probamos que el middleware de la pagina esta funcionando y no deja acceder a la aplicacion sin logearte
     */
    public function test_mostrar_pagina_rutas_sin_autentificar()
    {
        $response = $this->get('/rutas');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }


    /**
     *  Visualizamos la pagina de rutas
     */
    public function test_moastrar_pagina_rutas(): void
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $response = $this->get('/rutas');

        $response->assertStatus(200);
    }

    /**
     * Probar el crear ruta con datos aleatorios
     */
    public function test_nueva_ruta_creada_correctamente()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $espacioDep = Espacio::factory()->create();
        $espacioArr = Espacio::factory()->create();
        $avion = Flota::factory()->create();
        
        $response = $this->post(route('rutas.nuevaRuta'), [
            'destino1' => $espacioDep->id,
            'destino2' => $espacioArr->id,
            'avion' => $avion->id,
            'horaDep' => '6:00:00',
            'precioBillete' => 250
        ]);

        $response->assertRedirect(route('rutas.index'));
        $response->assertSessionHas('exito', trans('routes.routeCreated'));

        $this->assertDatabaseHas('rutas', [
            'flota_id' => $avion->id,
            'espacio_departure_id' => $espacioDep->id,
            'espacio_arrival_id' => $espacioArr->id,
        ]);
    }

    public function test_eliminar_ruta()
    {
        // Autentificacion del usuario
        $this->actingAs($this->user);

        $user = $this->user;

        $ruta = Ruta::factory()->withUserId($user->id)->create();

        $response = $this->actingAs($user)->get(route('rutas.borrarRuta', ['id' => $ruta->id]));

        $response->assertRedirect(route('rutas.index'));
        $response->assertSessionHas('exito', trans('routes.deleteSuccess'));
        $this->assertDatabaseMissing('rutas', ['id' => $ruta->id]);
    }

    public function test_eliminar_ruta_otro_usuario()
    {
        $user1 = $this->user;
        $user2 = User::factory()->create();

        // Autentificamos al usuario
        $this->actingAs($user1);

        $ruta = Ruta::factory()->withUserId($user2->id)->create();

        $response = $this->actingAs($user1)->get(route('rutas.borrarRuta', ['id' => $ruta->id]));

        $response->assertRedirect(route('rutas.index'));
        $response->assertSessionHas('error', trans('routes.deleteErr'));
        $this->assertDatabaseHas('rutas', ['id' => $ruta->id]);
    }

    public function test_modificar_ruta()
    {
        $ruta = Ruta::factory()->withUserId($this->user->id)->create();

        // Autentificamos al usuario
        $this->actingAs($this->user);

        // Solicitud de modificar la ruta
        $response = $this->post(route('rutas.modificar', ['id' => $ruta->id]), [
            'precioBillete' => 10,
        ]);

        // Comprobamos el precio de billete a cambiado
        $this->assertDatabaseHas('rutas', [
            'id' => $ruta->id,
            'precioBillete' => 10,
        ]);    

        $response->assertRedirect(route('rutas.index'));
        $response->assertSessionHas('exito', trans('routes.modSuccess'));
    }

    public function test_modificar_ruta_otro_usuario()
    {
        $user1 = $this->user;
        $user2 = User::factory()->create();

        // Ruta asociada al usuario 2
        $ruta = Ruta::factory()->withUserId($user2->id)->create();

        // Nos logeamos con el primer usuario
        $this->actingAs($user1);

        // Intentamos modificar la ruta del usuario 2 logeados como usuario 1
        $response = $this->post(route('rutas.modificar', ['id' => $ruta->id]), [
            'precioBillete' => 10,
        ]);

        // Obtenemos los datos desde la base de datos para ver si a cambiado o no
        $ruta->refresh();

        // Comprobamos que no haya cambiado el precio
        $this->assertNotEquals(10, $ruta->precioBillete);

        $response->assertRedirect(route('rutas.index'));
        $response->assertSessionHas('error', trans('routes.modErr'));
    }
}
