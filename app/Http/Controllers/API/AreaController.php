<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * @param null $num
     */
    public function searchArea($num = null)
    {
        return Area::where('number', $num)->get()->pluck('id')->toJson();
    }

    /**
     * @param null $status
     */
    public function filterByStatus($status = null)
    {
        return Area::where('status', $status)->get()->pluck('id')->toJson();
    }

    /**
     * @param null $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return Area::where('id', $id)->get()->toJson();
    }

    /**
     * @return string
     */
    public function fetchAreas()
    {
        return Area::all()->toJson();
    }

    /**
     * @param null $id
     */
    public function downloadPlan($id = null)
    {
        // todo: download XML file from storage for area, that's id was passed
    }

    /**
     * @param null $id
     */
    public function downloadSurvey($id = null)
    {
        // todo: download survey from storage by path for area, of waht id was passed
    }
}
