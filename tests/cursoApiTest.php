<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class cursoApiTest extends TestCase
{
    use MakecursoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatecurso()
    {
        $curso = $this->fakecursoData();
        $this->json('POST', '/api/v1/cursos', $curso);

        $this->assertApiResponse($curso);
    }

    /**
     * @test
     */
    public function testReadcurso()
    {
        $curso = $this->makecurso();
        $this->json('GET', '/api/v1/cursos/'.$curso->id);

        $this->assertApiResponse($curso->toArray());
    }

    /**
     * @test
     */
    public function testUpdatecurso()
    {
        $curso = $this->makecurso();
        $editedcurso = $this->fakecursoData();

        $this->json('PUT', '/api/v1/cursos/'.$curso->id, $editedcurso);

        $this->assertApiResponse($editedcurso);
    }

    /**
     * @test
     */
    public function testDeletecurso()
    {
        $curso = $this->makecurso();
        $this->json('DELETE', '/api/v1/cursos/'.$curso->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cursos/'.$curso->id);

        $this->assertResponseStatus(404);
    }
}
