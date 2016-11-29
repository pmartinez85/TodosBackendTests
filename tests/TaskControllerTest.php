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

    protected $apiResult = '[{
        "name": "Suscipit qui vitae voluptatem illo unde neque commodi.",
        "done": true,
        "priority": 5
            },
        {
            "name": "Quia et dolores et.",
            "done": true,
            "priority": 8
            },
        {
            "name": "Quaerat dicta aperiam unde dicta ut repellendus excepturi necessitatibus.",
            "done": true,
            "priority": 5
        }]';

    public function __construct()
    {
        $this->mock = Mockery::mock('GuzzleHttp\Client');
    }

    public function tearDown()
    {
        Mockery::close();
    }



    /**
     * A basic test example.
     * @group todo
     * @return void
     */
    public function testExample()
    {
        $stream = GuzzleHttp\Psr7\stream_for('{"data" : '. $this->apiResult . ' }');
        $response = new \GuzzleHttp\Psr7\Response(
            200,
            ['Content-Type' => 'application/json'],
            $stream
        );
        //1 Prepare test
        $this->login();

        //2
        $this->mock
            ->shouldReceive('request')
            ->once()
            ->andReturn($response);


        $this->app->instance('GuzzleHttp\Client', $this->mock);

        //3 comprovacions, assercions, shoulds, ecxpectations
        $response = $this-> call('GET', '/tasks');
        $this->assertEquals(200, $response->status());
        $this->assertViewHas('tasks');

        $tasks = $response->original->getData()['tasks'];
        $this->assertInstanceOf('Illuminate\Support\Collection', $tasks);
        $this->assertInstanceOf('StdClass', $tasks[0]);
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
        $this->actingAs($user);

    }

}

