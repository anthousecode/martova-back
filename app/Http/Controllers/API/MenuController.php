<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * @OA\Get(
     *     path="/menu-items",
     *     operationId="fetchMenuItems",
     *     tags={"All"},
     *     summary="Get all menu items",
     *     @OA\Response(
     *       response=200,
     *       description="OK",
     *       @OA\MediaType(
     *          mediaType="application/json",
     *         @OA\Property(
     *             property="menu_items",
     *             type="array",
     *             @OA\Items(),
     *             description="All menu items"
     *         )
     *       )
     *     )
     * )
     */
    public function fetchMenuItems()
    {
        dd(\DB::select('select * from pg_catalog.pg_tables'));
        return json_encode(['menu_items' => Menu::orderBy('order', 'ASC')->get()->toArray()]);
    }
}
