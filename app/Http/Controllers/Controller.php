<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *  title="Areas API Docs",
 *  version="stable",
 * )
 * @OA\Tag(
 *  name="All",
 *  description="All api endpoints"
 * )
 * @OA\Server(
 *  description="Areas Open API server",
 *  url="http://sweews.herokuapp.com/api"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
