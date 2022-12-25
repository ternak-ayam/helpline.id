<?php

namespace App\Http\Controllers\Api\V1\Counsellor\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\Counsellor\GetCounsellorResource;
use App\Models\Counsellor;
use Illuminate\Http\Request;

class CounsellorController extends Controller
{
    public function index()
    {
        $counsellors = Counsellor::orderBy('id', 'DESC')->paginate(6);

        return GetCounsellorResource::collection($counsellors);
    }
}
