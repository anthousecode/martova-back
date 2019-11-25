<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Infrastructure;

class InfrastructureController extends Controller
{
    /**
     * @OA\Get(
     *     path="/infrastructure-items",
     *     operationId="InfrastructureItems",
     *     tags={"All"},
     *     summary="Get all infrastructure items",
     * @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\MediaType(
     *     mediaType="application/json",
     *       @OA\Property(
     *           type="array",
     *           property="infrastructure_items",
     *           description="All infrastructure items",
     *           @OA\Items()
     *       )
     *     )
     * )
     * )
     */
    public function fetchInfrastructureItems()
    {
        return json_encode(['infrastructure_items' => Infrastructure::with('category')->get()->toArray()]);
    }
}
