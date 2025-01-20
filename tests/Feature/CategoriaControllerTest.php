<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Categoria;

class CategoriaControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function criando_uma_categoria()
    {
         // Cria um usuário para autenticação
         $usuario = User::factory()->create();

         // Autentica o usuário e pega o token
         $token = $usuario->createToken('Test Token')->plainTextToken;

        // Dados para criação de categoria
        $dados = [
            'nome' => 'Categoria Teste',
            'descricao' => 'Descrição da categoria teste'
        ];

        // Realiza a requisição POST com o token Bearer
         $response = $this->postJson('/api/categoria/salvar', $dados, [
            'Authorization' => 'Bearer ' . $token,
        ]);

         // Verifica se a resposta tem status 201 (Created)
         $response->assertStatus(201);

         // Verifica se a categoria foi criada
         $this->assertDatabaseHas('categoria', [
             'nome' => 'Categoria Teste',
             'descricao' => 'Descrição da Categoria Teste',
         ]);
    }

    /**
     * Testa o método index com token Bearer.
     *
     * @return void
     */
    public function test_index()
    {
        // Cria um usuário e gera o token
        $usuario = User::factory()->create();
        $token = $usuario->createToken('Test Token')->plainTextToken;

        // Realiza a requisição GET para o índice com o Bearer token
        $response = $this->getJson('/api/categorias', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        // Verifica se a resposta tem status 200
        $response->assertStatus(200);

    }
}
