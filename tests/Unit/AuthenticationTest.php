<?php

namespace Tests\Unit;

use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    // public function test_example(): void
    // {
    //     $this->assertTrue(true);
    // }

    public function testUserRegistration()
    {
        $response = $this->call('POST','/api/register', [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => 'password#$$Javhuav4457hhvhbfbabv',
            'password_confirmation' => 'password#$$Javhuav4457hhvhbfbabv'
        ]);

        $response->assertStatus(200); 
        $this->assertTrue(true);
    }


    
}
