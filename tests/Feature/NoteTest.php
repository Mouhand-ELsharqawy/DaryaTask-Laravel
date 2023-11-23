<?php

namespace Tests\Feature;

use Tests\TestCase;

class NoteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function testGetDataWithOutAuth(){
        $response = $this->get('/api/note');
        $response->assertStatus(500);
    }

    public function testAddDataWithOutAuth(){
        $response = $this->call('POST', '/api/note',[
            'title' => fake()->word(),
            'content' => fake()->word().' hbjafvadbjhdbhchsd'
        ]);
        $response->assertStatus(500);

    }

    public function testAddGetOneWithOutAuth(){
        $response = $this->call('GET', '/api/note/1');
        $response->assertStatus(500);
    }
    public function testUpdateDataWithOutAuth(){

        $response = $this->call('PaTch', '/api/note/1',[
            'title' => fake()->word(),
            'content' => fake()->word() . ' hbjafvadbjhdbhchsd'
        ]);

        $response->assertStatus(500);

    }
    public function testDeleteDataWithOutAuth(){
        $response = $this->call('DELETE', '/api/note/1');
        $response->assertStatus(500);
    }


}
