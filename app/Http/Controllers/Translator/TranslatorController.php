<?php

namespace App\Http\Controllers\Translator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Translator\TranslatorStoreRequest;
use App\Http\Requests\Translator\TranslatorUpdateRequest;
use App\Imports\Admin\ImportTranslator;
use App\Imports\Admin\ImportUser;
use App\Models\Counsellor;
use App\Models\CounsellorAvailableTime;
use App\Models\Translator;
use App\Models\TranslatorAvailableTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class TranslatorController extends Controller
{
    public function index()
    {
        return view('admin.pages.translator.index', [
            'translators' => Translator::where('name', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->paginate(10),
        ]);
    }

    public function show(Translator $translator)
    {
        return back()->with([
            'translator' => $translator,
            'show' => true
        ]);
    }

    public function create()
    {
        $days = [];
        $dayList = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        foreach($dayList as $dayName) {
            $days[] = [
                "day" => Str::ucfirst($dayName),
                "is_checked" => false,
                "start_at" => '',
                "end_at" => '',
            ];
        }

        return view('admin.pages.translator.create', [
            'days' => $days
        ]);
    }

    public function edit(Translator $translator)
    {
        $days = [];
        $dayList = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        foreach($dayList as $dayName) {
            $days[] = [
                "day" => Str::ucfirst($dayName),
                "is_checked" => (bool)TranslatorAvailableTime::where('translator_id', $translator->id)->where('day', $dayName)->first(),
                "start_at" => TranslatorAvailableTime::where('translator_id', $translator->id)->where('day', $dayName)->first()->start_at ?? '',
                "end_at" => TranslatorAvailableTime::where('translator_id', $translator->id)->where('day', $dayName)->first()->end_at ?? '',
            ];
        }

        return view('admin.pages.translator.edit', [
            'translator' => $translator,
            'days' => $days
        ]);
    }

    public function update(TranslatorUpdateRequest $request, Translator $translator) {
        $translator->fill($request->all());
        $translator->saveOrFail();

        TranslatorAvailableTime::where('translator_id', $translator->id)->delete();

        foreach ($request->day as $key => $day) {
            TranslatorAvailableTime::create([
                'translator_id' => $translator->id,
                'day' => $key,
                'start_at' => json_encode($request->start_at[$key]),
                'end_at' => json_encode($request->end_at[$key])
            ]);
        }

        return redirect(route('admin.user.translator.index'));
    }


    public function store(TranslatorStoreRequest $request) {
        $translator = new Translator();

        $translator->fill($request->all());
        $translator->saveOrFail();

        TranslatorAvailableTime::where('translator_id', $translator->id)->delete();

        foreach ($request->day as $key => $day) {
            TranslatorAvailableTime::create([
                'translator_id' => $translator->id,
                'day' => $key,
                'start_at' => json_encode($request->start_at[$key]),
                'end_at' => json_encode($request->end_at[$key])
            ]);
        }

        return redirect(route('admin.user.translator.index'));
    }

    public function destroy(Translator $translator)
    {
        $translator->delete();

        return back();
    }

    public function import()
    {
        Excel::import(new ImportTranslator, request()->file('user_file'));

        return back();
    }
}
