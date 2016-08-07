<?php

use App\Models\curso3;
use App\Repositories\curso3Repository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class curso3RepositoryTest extends TestCase
{
    use Makecurso3Trait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var curso3Repository
     */
    protected $curso3Repo;

    public function setUp()
    {
        parent::setUp();
        $this->curso3Repo = App::make(curso3Repository::class);
    }

    /**
     * @test create
     */
    public function testCreatecurso3()
    {
        $curso3 = $this->fakecurso3Data();
        $createdcurso3 = $this->curso3Repo->create($curso3);
        $createdcurso3 = $createdcurso3->toArray();
        $this->assertArrayHasKey('id', $createdcurso3);
        $this->assertNotNull($createdcurso3['id'], 'Created curso3 must have id specified');
        $this->assertNotNull(curso3::find($createdcurso3['id']), 'curso3 with given id must be in DB');
        $this->assertModelData($curso3, $createdcurso3);
    }

    /**
     * @test read
     */
    public function testReadcurso3()
    {
        $curso3 = $this->makecurso3();
        $dbcurso3 = $this->curso3Repo->find($curso3->id);
        $dbcurso3 = $dbcurso3->toArray();
        $this->assertModelData($curso3->toArray(), $dbcurso3);
    }

    /**
     * @test update
     */
    public function testUpdatecurso3()
    {
        $curso3 = $this->makecurso3();
        $fakecurso3 = $this->fakecurso3Data();
        $updatedcurso3 = $this->curso3Repo->update($fakecurso3, $curso3->id);
        $this->assertModelData($fakecurso3, $updatedcurso3->toArray());
        $dbcurso3 = $this->curso3Repo->find($curso3->id);
        $this->assertModelData($fakecurso3, $dbcurso3->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletecurso3()
    {
        $curso3 = $this->makecurso3();
        $resp = $this->curso3Repo->delete($curso3->id);
        $this->assertTrue($resp);
        $this->assertNull(curso3::find($curso3->id), 'curso3 should not exist in DB');
    }
}
