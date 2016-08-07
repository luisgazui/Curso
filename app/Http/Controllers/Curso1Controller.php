<?php

namespace App\Http\Controllers;

use App\DataTables\Curso1DataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCurso1Request;
use App\Http\Requests\UpdateCurso1Request;
use App\Repositories\Curso1Repository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class Curso1Controller extends AppBaseController
{
    /** @var  Curso1Repository */
    private $curso1Repository;

    public function __construct(Curso1Repository $curso1Repo)
    {
        $this->curso1Repository = $curso1Repo;
    }

    /**
     * Display a listing of the Curso1.
     *
     * @param Curso1DataTable $curso1DataTable
     * @return Response
     */
    public function index(Curso1DataTable $curso1DataTable)
    {
        return $curso1DataTable->render('curso1s.index');
    }

    /**
     * Show the form for creating a new Curso1.
     *
     * @return Response
     */
    public function create()
    {
        return view('curso1s.create');
    }

    /**
     * Store a newly created Curso1 in storage.
     *
     * @param CreateCurso1Request $request
     *
     * @return Response
     */
    public function store(CreateCurso1Request $request)
    {
        $input = $request->all();

        $curso1 = $this->curso1Repository->create($input);

        Flash::success('Curso1 saved successfully.');

        return redirect(route('curso1s.index'));
    }

    /**
     * Display the specified Curso1.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $curso1 = $this->curso1Repository->findWithoutFail($id);

        if (empty($curso1)) {
            Flash::error('Curso1 not found');

            return redirect(route('curso1s.index'));
        }

        return view('curso1s.show')->with('curso1', $curso1);
    }

    /**
     * Show the form for editing the specified Curso1.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $curso1 = $this->curso1Repository->findWithoutFail($id);

        if (empty($curso1)) {
            Flash::error('Curso1 not found');

            return redirect(route('curso1s.index'));
        }

        return view('curso1s.edit')->with('curso1', $curso1);
    }

    /**
     * Update the specified Curso1 in storage.
     *
     * @param  int              $id
     * @param UpdateCurso1Request $request
     *
     * @return Response
     */
    public function update($id, UpdateCurso1Request $request)
    {
        $curso1 = $this->curso1Repository->findWithoutFail($id);

        if (empty($curso1)) {
            Flash::error('Curso1 not found');

            return redirect(route('curso1s.index'));
        }

        $curso1 = $this->curso1Repository->update($request->all(), $id);

        Flash::success('Curso1 updated successfully.');

        return redirect(route('curso1s.index'));
    }

    /**
     * Remove the specified Curso1 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $curso1 = $this->curso1Repository->findWithoutFail($id);

        if (empty($curso1)) {
            Flash::error('Curso1 not found');

            return redirect(route('curso1s.index'));
        }

        $this->curso1Repository->delete($id);

        Flash::success('Curso1 deleted successfully.');

        return redirect(route('curso1s.index'));
    }
}
