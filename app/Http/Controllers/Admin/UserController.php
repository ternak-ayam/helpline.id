<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Imports\Admin\ImportUser;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('unhcr_number', 'like', '%' . \request()->get('query') . '%')->paginate(10);

        return view('admin.pages.user.index', compact('users'));
    }

    public function store(UserStoreRequest $request)
    {
        $user = new User();

        $user->fill($request->all());
        $user->saveOrFail();

        return redirect(route('admin.user.index'));
    }

    public function show(User $user)
    {
        return back()->with(['user' => $user]);
    }

    public function create()
    {
        $countries = json_decode(file_get_contents(storage_path('app/local/countries.json')), true);

        return view('admin.pages.user.create', [
            'countries' => $countries
        ]);
    }

    public function edit(User $user)
    {
        $countries = json_decode(file_get_contents(storage_path('app/local/countries.json')), true);

        return view('admin.pages.user.edit', [
            'user' => $user,
            'countries' => $countries
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->fill($request->all());
        $user->saveOrFail();

        return redirect(route('admin.user.index'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }

    public function import()
    {
        Excel::import(new ImportUser, request()->file('user_file'));

        return back();
    }
}
