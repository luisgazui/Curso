<?php

use App\Models\curso;
use App\Repositories\cursoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class cursoRepositoryTest extends TestCase
{
    use MakecursoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var cursoRepository
     */
    protected $cursoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cursoRepo = App::make(cursoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatecurso()
    {
        $curso = $this->fakecursoData();
        $createdcurso = $this->cursoRepo->create($curso);
        $createdcurso = $createdcurso->toArray();
        $this->assertArrayHasKey('id', $createdcurso);
        $this->assertNotNull($createdcurso['id'], 'Created curso must have id specified');
        $this->assertNotNull(curso::find($createdcurso['id']), 'curso with given id must be in DB');
        $this->assertModelData($curso, $createdcurso);
    }

    /**
     * @test read
     */
    public function testReadcurso()
    {
        $curso = $this->makecurso();
        $dbcurso = $this->cursoRepo->find($curso->id);
        $dbcurso = $dbcurso->toArray();
        $this->assertModelData($curso->toArray(), $dbcurso);
    }

    /**
     * @test update
     */
    public function testUpdatecurso()
    {
        $curso = $this->makecurso();
        $fakecurso = $this->fakecursoData();
        $updatedcurso = $this->cursoRepo->update($fakecurso, $curso->id);
        $this->assertModelData($fakecurso, $updatedcurso->toArray());
        $dbcurso = $this->cursoRepo->find($curso->id);
        $this->assertModelData($fakecurso, $dbcurso->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletecurso()
    {
        $curso = $this->makecurso();
        $resp = $this->cursoRepo->delete($curso->id);
        $this->assertTrue($resp);
        $this->assertNull(curso::find($curso->id), 'curso should not exist in DB');
    }
}
