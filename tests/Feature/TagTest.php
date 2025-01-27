<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tag;

class TagTest extends TestCase
{
    // use RefreshDataBase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_cadastro_tag(){

        $tag = Tag::create([
            'nome' => 'Noticias'
        ]);

        $this->assertDatabaseHas('tag',[
            'nome' => 'Noticias'
        ]);

        $this->assertEquals('Noticias',$tag->nome);
    }

    public function test_atualizar_tag(){
        $tag = Tag::create([
            'nome' => 'Forun'
        ]);

        $tag->update([
            'nome' => 'Forum'
        ]);

        $this->assertDatabaseHas('tag',[
            'nome' => 'Forum'
        ]);

    }

    public function test_excluir_tag(){
        $tag = Tag::create([
            'nome' => 'Blog'
        ]);

        $this->assertDatabaseHas('tag',[
            'nome' => 'Blog'
        ]);

        $tag->delete();

        $this->assertDatabaseMissing('tag',[
            'nome' => 'Blog'
        ]);

    }
}
