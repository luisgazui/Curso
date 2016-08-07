<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCurso1APIRequest;
use App\Http\Requests\API\UpdateCurso1APIRequest;
use App\Models\Curso1;
use App\Repositories\Curso1Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class Curso1Controller
 * @package App\Http\Controllers\API
 */

class Curso1APIController extends InfyOmBaseController
{
    /** @var  Curso1Repository */
    private $curso1Repository;

    public function __construct(Curso1Repository $curso1Repo)
    {
        $this->curso1Repository = $curso1Repo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/curso1s",
     *      summary="Get a listing of the Curso1s.",
     *      tags={"Curso1"},
     *      description="Get all Curso1s",
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
     *                  @SWG\Items(ref="#/definitions/Curso1")
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
        $this->curso1Repository->pushCriteria(new RequestCriteria($request));
        $this->curso1Repository->pushCriteria(new LimitOffsetCriteria($request));
        $curso1s = $this->curso1Repository->all();

        return $this->sendResponse($curso1s->toArray(), 'Curso1s retrieved successfully');
    }

    /**
     * @param CreateCurso1APIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/curso1s",
     *      summary="Store a newly created Curso1 in storage",
     *      tags={"Curso1"},
     *      description="Store Curso1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Curso1 that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Curso1")
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
     *                  ref="#/definitions/Curso1"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCurso1APIRequest $request)
    {
        $input = $request->all();

        $curso1s = $this->curso1Repository->create($input);

        return $this->sendResponse($curso1s->toArray(), 'Curso1 saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/curso1s/{id}",
     *      summary="Display the specified Curso1",
     *      tags={"Curso1"},
     *      description="Get Curso1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Curso1",
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
     *                  ref="#/definitions/Curso1"
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
        /** @var Curso1 $curso1 */
        $curso1 = $this->curso1Repository->find($id);

        if (empty($curso1)) {
            return Response::json(ResponseUtil::makeError('Curso1 not found'), 404);
        }

        return $this->sendResponse($curso1->toArray(), 'Curso1 retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCurso1APIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/curso1s/{id}",
     *      summary="Update the specified Curso1 in storage",
     *      tags={"Curso1"},
     *      description="Update Curso1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Curso1",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Curso1 that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Curso1")
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
     *                  ref="#/definitions/Curso1"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCurso1APIRequest $request)
    {
        $input = $request->all();

        /** @var Curso1 $curso1 */
        $curso1 = $this->curso1Repository->find($id);

        if (empty($curso1)) {
            return Response::json(ResponseUtil::makeError('Curso1 not found'), 404);
        }

        $curso1 = $this->curso1Repository->update($input, $id);

        return $this->sendResponse($curso1->toArray(), 'Curso1 updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/curso1s/{id}",
     *      summary="Remove the specified Curso1 from storage",
     *      tags={"Curso1"},
     *      description="Delete Curso1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Curso1",
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
        /** @var Curso1 $curso1 */
        $curso1 = $this->curso1Repository->find($id);

        if (empty($curso1)) {
            return Response::json(ResponseUtil::makeError('Curso1 not found'), 404);
        }

        $curso1->delete();

        return $this->sendResponse($id, 'Curso1 deleted successfully');
    }
}
