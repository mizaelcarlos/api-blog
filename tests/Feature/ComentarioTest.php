<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Comentario;
use App\Models\Post;
use App\Models\Categoria;

class ComentarioTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_cadastro_comentario(){

        $categoria = Categoria::create([
            'nome' => 'Equipamentos',
            'descricao' => 'Equipamentos Industriais'
        ]);

        $post = Post::create([
            'titulo' => 'Novo equipamento de geração de Energia',
            'conteudo' => 'Esse é o novo gerador de energia',
            'foto' => '',
            'categoria_id' => $categoria->id
        ]);
        $hora = date('H:i:s');
        $comentario = Comentario::create([
            'texto' => 'Comentario Teste ' .$hora ,
            'post_id' => $post->id
        ]);

        $this->assertDatabaseHas('comentario',[
            'texto' => 'Comentario Teste '.$hora
        ]);

        $this->assertEquals('Comentario Teste '.$hora,$comentario->texto);
    }

    public function test_atualizar_comentario(){
        $categoria = Categoria::create([
            'nome' => 'Equipamentos',
            'descricao' => 'Equipamentos Industriais'
        ]);

        $post = Post::create([
            'titulo' => 'Novo equipamento de geração de Energia',
            'conteudo' => 'Esse é o novo gerador de energia',
            'foto' => '',
            'categoria_id' => $categoria->id
        ]);
        $hora = date('H:i:s');
        $comentario = Comentario::create([
            'texto' => 'Comentario Teste ' .$hora ,
            'post_id' => $post->id
        ]);

        $comentario->update([
            'texto' => 'Comentario Teste atualizado ' .$hora ,
            'post_id' => $post->id
        ]);

        $this->assertDatabaseHas('comentario',[
           'texto' => 'Comentario Teste atualizado ' .$hora ,
        ]);

    }

    public function test_excluir_tag(){
        $categoria = Categoria::create([
            'nome' => 'Equipamentos',
            'descricao' => 'Equipamentos Industriais'
        ]);

        $post = Post::create([
            'titulo' => 'Novo equipamento de geração de Energia',
            'conteudo' => 'Esse é o novo gerador de energia',
            'foto' => '',
            'categoria_id' => $categoria->id
        ]);
        $hora = date('H:i:s');
        $comentario = Comentario::create([
            'texto' => 'Comentario Teste',
            'post_id' => $post->id
        ]);

        $this->assertDatabaseHas('comentario',[
            'texto' => 'Comentario Teste',
        ]);

        $comentario->delete();

        $this->assertDatabaseMissing('comentario',[
            'texto' => 'Comentario Teste',
        ]);

    }
}
