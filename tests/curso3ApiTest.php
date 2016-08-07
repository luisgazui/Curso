<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class curso3ApiTest extends TestCase
{
    use Makecurso3Trait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatecurso3()
    {
        $curso3 = $this->fakecurso3Data();
        $this->json('POST', '/api/v1/curso3s', $curso3);

        $this->assertApiResponse($curso3);
    }

    /**
     * @test
     */
    public function testReadcurso3()
    {
        $curso3 = $this->makecurso3();
        $this->json('GET', '/api/v1/curso3s/'.$curso3->id);

        $this->assertApiResponse($curso3->toArray());
    }

    /**
     * @test
     */
    public function testUpdatecurso3()
    {
        $curso3 = $this->makecurso3();
        $editedcurso3 = $this->fakecurso3Data();

        $this->json('PUT', '/api/v1/curso3s/'.$curso3->id, $editedcurso3);

        $this->assertApiResponse($editedcurso3);
    }

    /**
     * @test
     */
    public function testDeletecurso3()
    {
        $curso3 = $this->makecurso3();
        $this->json('DELETE', '/api/v1/curso3s/'.$curso3->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/curso3s/'.$curso3->id);

        $this->assertResponseStatus(404);
    }
}
