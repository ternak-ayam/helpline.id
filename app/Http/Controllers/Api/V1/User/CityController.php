<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::select('name', 'email')->get()->unique('name');

        return CityResource::collection($cities);
    }
}
