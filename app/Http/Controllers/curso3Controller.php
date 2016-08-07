<?php

namespace App\Http\Controllers;

use App\DataTables\curso3DataTable;
use App\Http\Requests;
use App\Http\Requests\Createcurso3Request;
use App\Http\Requests\Updatecurso3Request;
use App\Repositories\curso3Repository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class curso3Controller extends AppBaseController
{
    /** @var  curso3Repository */
    private $curso3Repository;

    public function __construct(curso3Repository $curso3Repo)
    {
        $this->curso3Repository = $curso3Repo;
    }

    /**
     * Display a listing of the curso3.
     *
     * @param curso3DataTable $curso3DataTable
     * @return Response
     */
    public function index(curso3DataTable $curso3DataTable)
    {
        return $curso3DataTable->render('curso3s.index');
    }

    /**
     * Show the form for creating a new curso3.
     *
     * @return Response
     */
    public function create()
    {
        return view('curso3s.create');
    }

    /**
     * Store a newly created curso3 in storage.
     *
     * @param Createcurso3Request $request
     *
     * @return Response
     */
    public function store(Createcurso3Request $request)
    {
        $input = $request->all();

        $curso3 = $this->curso3Repository->create($input);

        Flash::success('curso3 saved successfully.');

        return redirect(route('curso3s.index'));
    }

    /**
     * Display the specified curso3.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $curso3 = $this->curso3Repository->findWithoutFail($id);

        if (empty($curso3)) {
            Flash::error('curso3 not found');

            return redirect(route('curso3s.index'));
        }

        return view('curso3s.show')->with('curso3', $curso3);
    }

    /**
     * Show the form for editing the specified curso3.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $curso3 = $this->curso3Repository->findWithoutFail($id);

        if (empty($curso3)) {
            Flash::error('curso3 not found');

            return redirect(route('curso3s.index'));
        }

        return view('curso3s.edit')->with('curso3', $curso3);
    }

    /**
     * Update the specified curso3 in storage.
     *
     * @param  int              $id
     * @param Updatecurso3Request $request
     *
     * @return Response
     */
    public function update($id, Updatecurso3Request $request)
    {
        $curso3 = $this->curso3Repository->findWithoutFail($id);

        if (empty($curso3)) {
            Flash::error('curso3 not found');

            return redirect(route('curso3s.index'));
        }

        $curso3 = $this->curso3Repository->update($request->all(), $id);

        Flash::success('curso3 updated successfully.');

        return redirect(route('curso3s.index'));
    }

    /**
     * Remove the specified curso3 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $curso3 = $this->curso3Repository->findWithoutFail($id);

        if (empty($curso3)) {
            Flash::error('curso3 not found');

            return redirect(route('curso3s.index'));
        }

        $this->curso3Repository->delete($id);

        Flash::success('curso3 deleted successfully.');

        return redirect(route('curso3s.index'));
    }
}
