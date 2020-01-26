<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    use RefreshDatabase;

    /** @test */
    public function index_returns_a_view()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertStatus(200);
    }

    /** @test */
    public function index_redirects_when_unauthorized()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(302);
    }
}
