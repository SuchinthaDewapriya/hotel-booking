<?php

namespace Tests\Feature;

<<<<<<< HEAD
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
=======
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
<<<<<<< HEAD
     */
    public function test_the_application_returns_a_successful_response(): void
=======
     *
     * @return void
     */
    public function testBasicTest()
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
