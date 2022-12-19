<?php

namespace App\Http\Controllers\Counsellor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Counsellor\CounsellorStoreRequest;
use App\Models\Counsellor;
use Illuminate\Http\Request;

class CounsellorController extends Controller
{
    public function index()
    {
        return view('admin.pages.psychologist.index', [
            'psychologists' => Counsellor::orderby('id', 'DESC')->paginate(10),
        ]);
    }

    public function show(Counsellor $psychologist)
    {
        return back()->with(['psychologist' => $psychologist]);
    }

    public function store(CounsellorStoreRequest $request) {
        $counsellor = new Counsellor();

        $counsellor->fill($request->all());

        $counsellor->saveOrFail();

        return back();
    }
}
