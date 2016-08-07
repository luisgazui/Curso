<?php

use App\Models\Curso1;
use App\Repositories\Curso1Repository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Curso1RepositoryTest extends TestCase
{
    use MakeCurso1Trait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var Curso1Repository
     */
    protected $curso1Repo;

    public function setUp()
    {
        parent::setUp();
        $this->curso1Repo = App::make(Curso1Repository::class);
    }

    /**
     * @test create
     */
    public function testCreateCurso1()
    {
        $curso1 = $this->fakeCurso1Data();
        $createdCurso1 = $this->curso1Repo->create($curso1);
        $createdCurso1 = $createdCurso1->toArray();
        $this->assertArrayHasKey('id', $createdCurso1);
        $this->assertNotNull($createdCurso1['id'], 'Created Curso1 must have id specified');
        $this->assertNotNull(Curso1::find($createdCurso1['id']), 'Curso1 with given id must be in DB');
        $this->assertModelData($curso1, $createdCurso1);
    }

    /**
     * @test read
     */
    public function testReadCurso1()
    {
        $curso1 = $this->makeCurso1();
        $dbCurso1 = $this->curso1Repo->find($curso1->id);
        $dbCurso1 = $dbCurso1->toArray();
        $this->assertModelData($curso1->toArray(), $dbCurso1);
    }

    /**
     * @test update
     */
    public function testUpdateCurso1()
    {
        $curso1 = $this->makeCurso1();
        $fakeCurso1 = $this->fakeCurso1Data();
        $updatedCurso1 = $this->curso1Repo->update($fakeCurso1, $curso1->id);
        $this->assertModelData($fakeCurso1, $updatedCurso1->toArray());
        $dbCurso1 = $this->curso1Repo->find($curso1->id);
        $this->assertModelData($fakeCurso1, $dbCurso1->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCurso1()
    {
        $curso1 = $this->makeCurso1();
        $resp = $this->curso1Repo->delete($curso1->id);
        $this->assertTrue($resp);
        $this->assertNull(Curso1::find($curso1->id), 'Curso1 should not exist in DB');
    }
}
