<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\Admin\ProjectResource;
use App\Models\Project;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectsApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/projects",
     *      operationId="getProjectsList",
     *      tags={"Projects"},
     *      summary="取得專案清單",
     *      description="回傳專案清單",
     *      @OA\Response(
     *          response=200,
     *          description="成功的操作",
     *          @OA\JsonContent(ref="#/components/schemas/ProjectResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="未經認證",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="禁止存取"
     *      )
     *     )
     */
    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectResource(Project::with(['author'])->get());
    }

    /**
     * @OA\Post(
     *      path="/projects",
     *      operationId="storeProject",
     *      tags={"Projects"},
     *      summary="儲存新專案",
     *      description="回傳專案資料",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreProjectRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="成功的操作",
     *          @OA\JsonContent(ref="#/components/schemas/Project")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="錯誤請求"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="未經認證",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="禁止存取"
     *      )
     * )
     */
    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/projects/{id}",
     *      operationId="getProjectById",
     *      tags={"Projects"},
     *      summary="取得專案資訊",
     *      description="回傳專案資料",
     *      @OA\Parameter(
     *          name="編號",
     *          description="專案編號",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="成功的操作",
     *          @OA\JsonContent(ref="#/components/schemas/Project")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="錯誤請求"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="未經認證",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="禁止存取"
     *      )
     * )
     */
    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectResource($project->load(['author']));
    }

    /**
     * @OA\Put(
     *      path="/projects/{id}",
     *      operationId="updateProject",
     *      tags={"Projects"},
     *      summary="更新既有專案",
     *      description="回傳更新專案資料",
     *      @OA\Parameter(
     *          name="id",
     *          description="專案編號",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateProjectRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="成功的操作",
     *          @OA\JsonContent(ref="#/components/schemas/Project")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="錯誤請求"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="未經認證",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="禁止存取"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="找不到資源"
     *      )
     * )
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/projects/{id}",
     *      operationId="deleteProject",
     *      tags={"Projects"},
     *      summary="刪除既有專案",
     *      description="刪除一筆資料且回傳空的內容",
     *      @OA\Parameter(
     *          name="id",
     *          description="專案編號",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="成功的操作",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="未經認證",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="禁止存取"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="找不到資源"
     *      )
     * )
     */
    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
