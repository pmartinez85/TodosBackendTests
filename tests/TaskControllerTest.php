<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class TaskControllerTest
 */
class TaskControllerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     * @group todo
     * @return void
     */
    public function testExample()
    {
        //1 Prepare test
        $this->login();

        //2

        $response = $this-> call('GET', '/tasks');

        //3

        static::assertEquals(200, $response->status());
        $this->assertViewHas('tasks');
    }

    /**
     * @return mixed
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';
        $app->make(Illuminate\Contracts\Http\Kernel::class);
        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        return $app;
    }

    /**
     * @return mixed
     */
    public function login()
    {
        $user = factory(\App\User::class)->create();
        //dd($user);
        $this->actingAs($user);

    }

}

