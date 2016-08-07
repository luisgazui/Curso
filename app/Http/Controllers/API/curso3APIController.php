<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createcurso3APIRequest;
use App\Http\Requests\API\Updatecurso3APIRequest;
use App\Models\curso3;
use App\Repositories\curso3Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class curso3Controller
 * @package App\Http\Controllers\API
 */

class curso3APIController extends InfyOmBaseController
{
    /** @var  curso3Repository */
    private $curso3Repository;

    public function __construct(curso3Repository $curso3Repo)
    {
        $this->curso3Repository = $curso3Repo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/curso3s",
     *      summary="Get a listing of the curso3s.",
     *      tags={"curso3"},
     *      description="Get all curso3s",
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
     *                  @SWG\Items(ref="#/definitions/curso3")
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
        $this->curso3Repository->pushCriteria(new RequestCriteria($request));
        $this->curso3Repository->pushCriteria(new LimitOffsetCriteria($request));
        $curso3s = $this->curso3Repository->all();

        return $this->sendResponse($curso3s->toArray(), 'curso3s retrieved successfully');
    }

    /**
     * @param Createcurso3APIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/curso3s",
     *      summary="Store a newly created curso3 in storage",
     *      tags={"curso3"},
     *      description="Store curso3",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="curso3 that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/curso3")
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
     *                  ref="#/definitions/curso3"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createcurso3APIRequest $request)
    {
        $input = $request->all();

        $curso3s = $this->curso3Repository->create($input);

        return $this->sendResponse($curso3s->toArray(), 'curso3 saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/curso3s/{id}",
     *      summary="Display the specified curso3",
     *      tags={"curso3"},
     *      description="Get curso3",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of curso3",
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
     *                  ref="#/definitions/curso3"
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
        /** @var curso3 $curso3 */
        $curso3 = $this->curso3Repository->find($id);

        if (empty($curso3)) {
            return Response::json(ResponseUtil::makeError('curso3 not found'), 404);
        }

        return $this->sendResponse($curso3->toArray(), 'curso3 retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatecurso3APIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/curso3s/{id}",
     *      summary="Update the specified curso3 in storage",
     *      tags={"curso3"},
     *      description="Update curso3",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of curso3",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="curso3 that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/curso3")
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
     *                  ref="#/definitions/curso3"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatecurso3APIRequest $request)
    {
        $input = $request->all();

        /** @var curso3 $curso3 */
        $curso3 = $this->curso3Repository->find($id);

        if (empty($curso3)) {
            return Response::json(ResponseUtil::makeError('curso3 not found'), 404);
        }

        $curso3 = $this->curso3Repository->update($input, $id);

        return $this->sendResponse($curso3->toArray(), 'curso3 updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/curso3s/{id}",
     *      summary="Remove the specified curso3 from storage",
     *      tags={"curso3"},
     *      description="Delete curso3",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of curso3",
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
        /** @var curso3 $curso3 */
        $curso3 = $this->curso3Repository->find($id);

        if (empty($curso3)) {
            return Response::json(ResponseUtil::makeError('curso3 not found'), 404);
        }

        $curso3->delete();

        return $this->sendResponse($id, 'curso3 deleted successfully');
    }
}
