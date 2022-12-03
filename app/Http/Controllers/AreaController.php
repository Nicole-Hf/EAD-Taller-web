<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function getAreas()
    {
        $areas = Area::all();

        return response([
            'areas' => $areas
        ], 200);
    }

    public function getArea($id)
    {
        $area = Area::findOrFail($id);

        return response([
            'area' => $area
        ], 200);
    }
}
