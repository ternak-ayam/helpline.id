<?php

namespace App\Http\Controllers\Translator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Translator\TranslatorStoreRequest;
use App\Http\Requests\Translator\TranslatorUpdateRequest;
use App\Imports\Admin\ImportTranslator;
use App\Imports\Admin\ImportUser;
use App\Models\Counsellor;
use App\Models\Translator;
use Illuminate\Http\Request;
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


    public function edit(Translator $translator)
    {
        return back()->with([
            'translator' => $translator,
            'edit' => true
        ]);
    }

    public function update(TranslatorUpdateRequest $request, Translator $translator) {
        $translator->fill($request->all());
        $translator->saveOrFail();

        return back();
    }


    public function store(TranslatorStoreRequest $request) {
        $translator = new Translator();

        $translator->fill($request->all());
        $translator->saveOrFail();

        return back();
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
