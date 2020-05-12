<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Http\Resources\Area as AreaResource;
use App\Models\AreaImage;

class AreaController extends Controller
{
    /**
     * @OA\Get(
     *  path="/search-area/{num}",
     *  operationId="searchArea",
     *  tags={"All"},
     *  summary="Search for specific area",
     *  @OA\Parameter(
     *     name="num",
     *     in="path",
     *     description="Area cadastral number",
     *  ),
     *  @OA\Response(
     *    response=200,
     *    description="OK",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Property(
     *           property="areas_ids",
     *           type="array",
     *           @OA\Items(),
     *           description="Areas with equal cadastral number, as passed"
     *         ),
     *     )
     *  )
     * )
     */
    public function searchArea($num = null)
    {
        return AreaResource::collection(Area::where('number', $num)->get()->pluck('id'));
    }

    /**
     * @OA\Get(
     *  path="/filter-by-status/{status}",
     *  operationId="filterByStatus",
     *  tags={"All"},
     *  summary="Filter areas by status (search by status)",
     *  @OA\Parameter(
     *     name="status",
     *     in="path",
     *     description="Area status",
     *  ),
     *  @OA\Response(
     *    response=200,
     *    description="OK",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Property(
     *           property="areas_ids",
     *           type="array",
     *           @OA\Items(),
     *           description="Areas with equal status, as passed"
     *         ),
     *     )
     *  )
     * )
     */
    public function filterByStatus($status = null)
    {
        return AreaResource::collection(Area::where('status', $status)->get()->pluck('id'));
    }

    /**
     * @OA\Get(
     *  path="/show-specific/{id}",
     *  operationId="showSpecificArea",
     *  tags={"All"},
     *  summary="Get area by id",
     *  @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Area ID",
     *  ),
     *  @OA\Response(
     *    response=200,
     *    description="OK",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Property(
     *           property="area",
     *           type="object",
     *           description="Area, found by id"
     *         ),
     *     )
     *  )
     * )
     */
    public function show($id = null)
    {
        return new AreaResource(Area::where('id', $id)->first());
    }

    /**
     * @OA\Get(
     *  path="/fetch-areas",
     *  operationId="fetchAreas",
     *  tags={"All"},
     *  summary="Get all areas",
     *  @OA\Response(
     *    response=200,
     *    description="OK",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Property(
     *           property="areas",
     *           type="array",
     *           @OA\Items(),
     *           description="All areas"
     *         ),
     *     )
     *  )
     * )
     */
    public function fetchAreas()
    {
      //  return \Cache::remember('all_areas', 1440, function(){
            return AreaResource::collection(Area::all()->sortByDesc('id'));
     //   });
    }

    /**
     * @OA\Get(
     *  path="/download-plan/{id}",
     *  operationId="DownloadCadastralPlan",
     *  tags={"All"},
     *  summary="Download plan file of area",
     *  @OA\Parameter(
     *   name="id",
     *   in="path",
     *   description="Area ID"
     * ),
     *  @OA\Response(
     *    response=200,
     *    description="OK",
     *     @OA\Schema(
     *       type="string",
     *       format="binary"
     *     )
     *  )
     * )
     */
    public function downloadPlan($id = null)
    {
	    $filePath = Area::select('plan')->where('id', $id)->get()->pluck('plan')->toArray();

	    if (!$filePath) {
                return null;
	    }

        return \MediaManager::downloadFile($filePath[0]);
    }

    /**
     * @OA\Get(
     *  path="/download-survey/{id}",
     *  operationId="DownloadSurveyFile",
     *  tags={"All"},
     *  summary="Download survey file of area",
     *  @OA\Parameter(
     *   name="id",
     *   in="path",
     *   description="Area ID"
     * ),
     *  @OA\Response(
     *    response=200,
     *    description="OK",
     *     @OA\Schema(
     *       type="string",
     *       format="binary"
     *     )
     *  )
     * )
     */
    public function downloadSurvey($id = null)
    {
	    $filePath = Area::select('survey')->where('id', $id)->get()->pluck('survey')->toArray();

	    if (!$filePath) {
             
	    }

        return \MediaManager::downloadFile($filePath[0]);
    }

    /**
     * @OA\Get(
     *     operationId="FetchAreaImagesByNumber",
     *     summary="Get all images for specific area entity by its unique number",
     *     path="/get-area-images/{area_id}",
     *     tags={"All"},
     *     @OA\Parameter(
     *         name="area_id",
     *         in="path",
     *         description="Unique area identifier"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Property(
     *                 type="array",
     *                 property="links",
     *                 description="Files links to display",
     *                 @OA\Items(
     *                     type="string"
     *                 )
     *             )
     *         )
     *      )
     * )
     */
    public function fetchAreaImages($area_id)
    {
        $area = Area::find($area_id);
        if (!$area) {
            return response()->json(['message' => 'Area not found'], 404);
        }

        $filesIds = AreaImage::where('area_number', $area->number)
            ->get()
            ->pluck('image_id')
            ->toArray();

        $areaFilesLinks = [];
        foreach ($filesIds as $fId) {
            $areaFilesLinks[] = \MediaManager::getFileLink($fId);
        }
        $areaFilesLinks = array_unique($areaFilesLinks);

        return json_encode(['links' => $areaFilesLinks]);
    }

    public function getFile(string $file_id)
    {
        return response()->streamDownload(function () use ($file_id) {
            echo file_get_contents(\MediaManager::getFile($file_id));
        }, 'placeholder');
    }

}
