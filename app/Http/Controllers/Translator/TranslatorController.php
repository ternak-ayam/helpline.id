<?php

namespace App\Http\Controllers\Translator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Translator\TranslatorStoreRequest;
use App\Models\Counsellor;
use App\Models\Translator;
use Illuminate\Http\Request;

class TranslatorController extends Controller
{
    public function index()
    {
        return view('admin.pages.translator.index', [
            'translators' => Translator::orderby('id', 'DESC')->paginate(10),
        ]);
    }

    public function show(Translator $translator)
    {
        return back()->with(['translator' => $translator]);
    }

    public function store(TranslatorStoreRequest $request) {
        $translator = new Translator();

        $translator->fill($request->all());

        $translator->saveOrFail();

        return back();
    }
}
