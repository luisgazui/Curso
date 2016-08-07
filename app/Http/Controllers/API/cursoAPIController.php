<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecursoAPIRequest;
use App\Http\Requests\API\UpdatecursoAPIRequest;
use App\Models\curso;
use App\Repositories\cursoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class cursoController
 * @package App\Http\Controllers\API
 */

class cursoAPIController extends InfyOmBaseController
{
    /** @var  cursoRepository */
    private $cursoRepository;

    public function __construct(cursoRepository $cursoRepo)
    {
        $this->cursoRepository = $cursoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cursos",
     *      summary="Get a listing of the cursos.",
     *      tags={"curso"},
     *      description="Get all cursos",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/curso")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->cursoRepository->pushCriteria(new RequestCriteria($request));
        $this->cursoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cursos = $this->cursoRepository->all();

        return $this->sendResponse($cursos->toArray(), 'cursos retrieved successfully');
    }

    /**
     * @param CreatecursoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cursos",
     *      summary="Store a newly created curso in storage",
     *      tags={"curso"},
     *      description="Store curso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="curso that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/curso")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/curso"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatecursoAPIRequest $request)
    {
        $input = $request->all();

        $cursos = $this->cursoRepository->create($input);

        return $this->sendResponse($cursos->toArray(), 'curso saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cursos/{id}",
     *      summary="Display the specified curso",
     *      tags={"curso"},
     *      description="Get curso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of curso",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/curso"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var curso $curso */
        $curso = $this->cursoRepository->find($id);

        if (empty($curso)) {
            return Response::json(ResponseUtil::makeError('curso not found'), 404);
        }

        return $this->sendResponse($curso->toArray(), 'curso retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatecursoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cursos/{id}",
     *      summary="Update the specified curso in storage",
     *      tags={"curso"},
     *      description="Update curso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of curso",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="curso that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/curso")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/curso"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatecursoAPIRequest $request)
    {
        $input = $request->all();

        /** @var curso $curso */
        $curso = $this->cursoRepository->find($id);

        if (empty($curso)) {
            return Response::json(ResponseUtil::makeError('curso not found'), 404);
        }

        $curso = $this->cursoRepository->update($input, $id);

        return $this->sendResponse($curso->toArray(), 'curso updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cursos/{id}",
     *      summary="Remove the specified curso from storage",
     *      tags={"curso"},
     *      description="Delete curso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of curso",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var curso $curso */
        $curso = $this->cursoRepository->find($id);

        if (empty($curso)) {
            return Response::json(ResponseUtil::makeError('curso not found'), 404);
        }

        $curso->delete();

        return $this->sendResponse($id, 'curso deleted successfully');
    }
}
