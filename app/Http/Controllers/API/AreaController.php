<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;

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
        return json_encode(['areas_ids' => Area::where('number', $num)->get()->pluck('id')->toArray()]);
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
        return json_encode(['areas_ids' => Area::where('status', $status)->get()->pluck('id')->toArray()]);
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
        return json_encode(['area' => Area::where('id', $id)->get()->toArray()]);
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
        return json_encode(['areas' => Area::all()->toArray()]);
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
        $filePath = Area::select('plan')->where('id', $id)->get()->pluck('plan')->toArray()[0];
        $filePath = public_path() . '/upload/' . $filePath;
        $headers = [
            'Content-type' => 'application/xml'
        ];
        return response()->download($filePath, 'plan.xml', $headers);
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
        $filePath = Area::select('survey')->where('id', $id)->get()->pluck('survey')->toArray()[0];
        $filePath = public_path() . '/upload/' . $filePath;
        $headers = [
            'Accept' => 'application/dwg',
            'Accept' => 'application/pdf',
        ];
        return response()->download('/' . $filePath, 'survey', $headers);
    }
}
