<?php

namespace Tests\Feature;

use App\User;
use Faker\Factory;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuleTest extends TestCase
{
    use RefreshDatabase;

    function test_user_new()
    {
        $this->withExceptionHandling();
        $this->get('/usuarioas/nuevo')
            ->assertStatus(200)
            ->assertSee('Creando Usuarios');

    }

    function test_user_id()
    {
        $this->withExceptionHandling();
        $user = factory(User::class)->create(['name' => 'u1', 'web_site' => 'web_site']);

        $this->get('/usuarioas/' . $user->id)
            ->assertStatus(200)
            ->assertSee($user->name);

    }

    function test_user_name()
    {
        $this->withExceptionHandling();
        $this->get('/usuarioas/armando/')
            ->assertStatus(200)
            ->assertSee("hola :armando alias :Jon Doe");
    }

    function test_user_name_nickname()
    {
        $this->withExceptionHandling();
        $this->get('/usuarioas/armando/serrano/')
            ->assertStatus(200)
            ->assertSee("hola :armando alias :serrano");
    }

    function test_user_list()
    {


        factory(User::class)->create(['name' => 'u1', 'web_site' => 'web_site']);
        factory(User::class)->create(['name' => 'u2', 'web_site' => 'web_site2']);
        $this->withExceptionHandling();
        $this->get('/lista')
            ->assertStatus(200)
            ->assertSee('u1')
            ->assertSee('u2');
    }

    function test_user_no_list()
    {
        #$this->withExceptionHandling();
        $this->get('/lista')
            ->assertStatus(200)
            ->assertSee('Listado de Usuarios')
            ->assertSee('No Hay USER');
    }

    function test_if_not_found_id()
    {
        $this->withExceptionHandling();
        $this->get('/usuarioas/9999')->assertStatus(404)->assertSee('404');
    }


    function test_create_user()
    {


        $this->post(route('user.create'), [
            'name' => 'Sandra',
            'email' => 'schneider.adrienne@example.net',
            'password' => '123456'
        ])->assertRedirect(route('user.list'));


        /*$this->assertDatabaseHas('users',[
            'name'=>'Sandra',
            'email'=>'schneider.adrienne@example.net',
            'password'=>'123456'
        ]);*/

        $this->assertCredentials([
            'name' => 'Sandra',
            'email' => 'schneider.adrienne@example.net',
            'password' => '123456'
        ]);
    }

    public function test_name_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('user.create'))->post(route('user.create'), [
            'name' => '',
            'email' => 'schneider.s@example.net',
            'password' => '123456'
        ])->assertSessionHasErrors(['name'])
            ->assertRedirect(route('user.create'))
            ->assertSessionHasErrors(['name' => 'El nombre es requerido']);
        $this->assertEquals(0, User::count());
        //$this->assertDatabaseMissing('users',['email'=>'schneider.s@example.net']);

    }

    public function test_email_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('user.create'))->post(route('user.create'), [
            'name' => 'ima',
            'email' => '',
            'password' => '123456'
        ])->assertSessionHasErrors(['email'])
            ->assertRedirect(route('user.create'))
            ->assertSessionHasErrors(['email' => 'El email es requerido']);
        $this->assertEquals(0, User::count());
        //$this->assertDatabaseMissing('users',['email'=>'schneider.s@example.net']);

    }

    public function test_passwd_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('user.create'))->post(route('user.create'), [
            'name' => 'ima',
            'email' => 'a@aa.ac',
            'password' => ''
        ])->assertSessionHasErrors(['password'])
            ->assertRedirect(route('user.create'))
            ->assertSessionHasErrors(['password' => 'El password es requerido']);
        $this->assertEquals(0, User::count());
        //$this->assertDatabaseMissing('users',['email'=>'schneider.s@example.net']);

    }


    public function test_email_is_valid()
    {
        $this->withExceptionHandling();
        $this->from(route('user.create'))->post(route('user.create'), [
            'name' => 'ima',
            'email' => '',
            'password' => '123456'
        ])->assertSessionHasErrors(['email'])
            ->assertRedirect(route('user.create'))
            ->assertSessionHasErrors(['email' => 'El email es requerido']);
        $this->assertEquals(0, User::count());
        //$this->assertDatabaseMissing('users',['email'=>'schneider.s@example.net']);

    }

    public function test_email_is_unique()
    {
        factory(User::class)->create(['name' => 'ima',
            'email' => 'asi@asi.cu',
            'password' => '123456']);
        $this->withExceptionHandling();
        $this->from(route('user.create'))->post(route('user.create'), [
            'name' => 'ima',
            'email' => 'asi@asi.cu',
            'password' => '123456'
        ])->assertSessionHasErrors(['email'])
            ->assertRedirect(route('user.create'))
            ->assertSessionHasErrors(['email']);
        $this->assertEquals(1, User::count());
        //$this->assertDatabaseMissing('users',['email'=>'schneider.s@example.net']);

    }

    public function test_load_edit_users()
    {
        $this->withExceptionHandling();
        $user = factory(User::class)->create();
        $this->get("/usuarioas/{$user->id}/edit")
            ->assertStatus(200)
            ->assertViewIs('Usersedit')
            ->assertSee('Editando Usuario')
            ->assertViewHas('user', function ($viewUser) use ($user) {
                return $viewUser->id == $user->id;
            });

    }

    public function test_update_a_user()
    {

        $user = factory(User::class)->create();
        $this->put("/usuarioas/{$user->id}", [
            'name' => 'Gina',
            'email' => 'gina.drienne@example.net',
            'password' => '123456'
        ])->assertRedirect(route('user.details', $user->id));
        $this->assertCredentials([
            'name' => 'Gina',
            'email' => 'gina.drienne@example.net',
            'password' => '123456'
        ]);
    }




}
