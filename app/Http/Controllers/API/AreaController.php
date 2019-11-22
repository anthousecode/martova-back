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
     * Download XML
     *
     * @param null $id
     */
    public function downloadPlan($id = null)
    {
        $filePath = Area::select('plan')->where('id', $id)->get()->pluck('plan')->toArray()[0];
        $filePath = public_path() . '/upload/' . $filePath;
        $headers = [
            'Content-type' => 'application/xml'
        ];
        return response()->download('/' . $filePath, 'plan.xml', $headers);
    }

    /**
     * Download PDF / DWG
     *
     * @param null $id
     */
    public function downloadSurvey($id = null)
    {
        $filePath = Area::select('survey')->where('id', $id)->get()->pluck('survey')->toArray()[0];
        $filePath = public_path() . '/upload/' . $filePath;
        $headers = [
            'Content-type' => 'application/dwg',
            'Content-type' => 'application/pdf',
        ];
        return response()->download('/' . $filePath, 'survey', $headers);
    }
}
