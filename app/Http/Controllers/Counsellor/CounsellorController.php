<?php

namespace App\Http\Controllers\Counsellor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Counsellor\CounsellorStoreRequest;
use App\Http\Requests\Counsellor\CounsellorUpdateRequest;
use App\Models\Counsellor;
use App\Models\CounsellorEducation;
use App\Models\CounsellorLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CounsellorController extends Controller
{
    public function index()
    {
        return view('admin.pages.psychologist.index', [
            'psychologists' => Counsellor::where('name', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.pages.psychologist.create');
    }

    public function edit(Counsellor $psychologist)
    {
        return view('admin.pages.psychologist.edit', [
            'psychologist' => $psychologist
        ]);
    }

    public function show(Counsellor $psychologist)
    {
        return back()->with(['psychologist' => $psychologist]);
    }

    public function store(CounsellorStoreRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $counsellor = new Counsellor();

            $counsellor->fill($request->all());
            $counsellor->saveOrFail();

            foreach ($request->education['institution'] as $key => $education) {
                CounsellorEducation::create([
                    'counsellor_id' => $counsellor->id,
                    'institution' => $education,
                    'major' => $request->education['major'][$key]
                ]);
            }

            foreach ($request->language as $language) {
                CounsellorLanguage::create([
                    'counsellor_id' => $counsellor->id,
                    'language' => $language,
                ]);
            }

            return redirect(route('admin.user.psychologist.index'));
        });
    }

    public function update(CounsellorUpdateRequest $request, Counsellor $psychologist)
    {
        return DB::transaction(function () use ($request, $psychologist) {
            $psychologist->fill($request->all());
            $psychologist->saveOrFail();

            CounsellorEducation::where('counsellor_id', $psychologist->id)->delete();
            CounsellorLanguage::where('counsellor_id', $psychologist->id)->delete();

            foreach ($request->education['institution'] as $key => $education) {
                CounsellorEducation::create([
                    'counsellor_id' => $psychologist->id,
                    'institution' => $education,
                    'major' => $request->education['major'][$key]
                ]);
            }

            foreach ($request->language as $language) {
                CounsellorLanguage::create([
                    'counsellor_id' => $psychologist->id,
                    'language' => $language,
                ]);
            }

            return redirect(route('admin.user.psychologist.index'));
        });
    }

    public function destroy(Counsellor $psychologist)
    {
        $psychologist->delete();

        return back();
    }
}
