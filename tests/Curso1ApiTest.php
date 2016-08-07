<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Curso1ApiTest extends TestCase
{
    use MakeCurso1Trait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCurso1()
    {
        $curso1 = $this->fakeCurso1Data();
        $this->json('POST', '/api/v1/curso1s', $curso1);

        $this->assertApiResponse($curso1);
    }

    /**
     * @test
     */
    public function testReadCurso1()
    {
        $curso1 = $this->makeCurso1();
        $this->json('GET', '/api/v1/curso1s/'.$curso1->id);

        $this->assertApiResponse($curso1->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCurso1()
    {
        $curso1 = $this->makeCurso1();
        $editedCurso1 = $this->fakeCurso1Data();

        $this->json('PUT', '/api/v1/curso1s/'.$curso1->id, $editedCurso1);

        $this->assertApiResponse($editedCurso1);
    }

    /**
     * @test
     */
    public function testDeleteCurso1()
    {
        $curso1 = $this->makeCurso1();
        $this->json('DELETE', '/api/v1/curso1s/'.$curso1->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/curso1s/'.$curso1->id);

        $this->assertResponseStatus(404);
    }
}
