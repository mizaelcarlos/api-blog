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
    public function test_cadastro_comentario(){
        $hora = date('H:i:s');

        $categoria = Categoria::create([
            'nome' => 'Equipamentos '.$hora,
            'descricao' => 'Equipamentos Industriais'
        ]);

        $post = Post::create([
            'titulo' => 'Novo equipamento de geração de Energia '.$hora,
            'conteudo' => 'Esse é o novo gerador de energia',
            'foto' => '',
            'categoria_id' => $categoria->id
        ]);

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
        $hora = date('H:i:s');

        $categoria = Categoria::create([
            'nome' => 'Equipamentos '.$hora,
            'descricao' => 'Equipamentos Industriais'
        ]);

        $post = Post::create([
            'titulo' => 'Novo equipamento de geração de Energia '.$hora,
            'conteudo' => 'Esse é o novo gerador de energia',
            'foto' => '',
            'categoria_id' => $categoria->id
        ]);

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

    public function test_excluir_comentario(){
        $hora = date('H:i:s');

        $categoria = Categoria::create([
            'nome' => 'Equipamentos '.$hora,
            'descricao' => 'Equipamentos Industriais'
        ]);

        $post = Post::create([
            'titulo' => 'Novo equipamento de geração de Energia '.$hora,
            'conteudo' => 'Esse é o novo gerador de energia',
            'foto' => '',
            'categoria_id' => $categoria->id
        ]);

        $comentario = Comentario::create([
            'texto' => 'Comentario Teste ' .$hora ,
            'post_id' => $post->id
        ]);

        $this->assertDatabaseHas('comentario',[
            'texto' => 'Comentario Teste ' .$hora ,
        ]);

        $comentario->delete();

        $this->assertDatabaseMissing('comentario',[
            'texto' => 'Comentario Teste ' .$hora ,
        ]);

    }
}
