<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserNoteTest extends TestCase
{
    /**
     * A basic feature test example.
     */


    public function testUserCanAccessAndGetData()
        {
            
            $user = User::factory()->create();
            
            $response = $this->actingAs($user, 'api')->get('/api/note');

            $response->assertStatus(200);
  
        }


    public function testUserCanAccessAndAddData()
        {
            
            $user = User::factory()->create();
            
            $response = $this->actingAs($user, 'api')->post('/api/note',[
                'title' => 'test data',
                'content' => 'here is the content of note'
            ]);

            $response->assertStatus(200);
  
        }

        public function testUserCanAccessAndGetOneData()
        {
            
            $user = User::factory()->create();
            
            $response = $this->actingAs($user, 'api')->get('/api/note/1');

            $response->assertStatus(200);
  
        }

        
}
