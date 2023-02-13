<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
     public function index()
        {
            // dd(City::orderby('id', 'DESC')->get());
            return view('admin.pages.cities.index', [
                'cities' =>  City::orderby('id', 'DESC')->get(),
            ]);
        }

        public function createCity(Request $request){
                $this->validate($request,[
                    'name' => 'required',
                    'email' => 'required'
                ]);

                City::create([
                    'name' => $request->name,
                    'email' => $request->email
                ]);

                return redirect()->back();


        }
         public function UpdateCity(Request $request){
                $this->validate($request,[
                    'id' => 'required',
                    'name' => 'required',
                    'email' => 'required'
                ]);

                City::where('id', '=' , $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);

                return redirect()->back();

        }
        public function deleteCity($id){
            City::where('id', '=' , $id)->delete();
            return redirect()->back();
        }
}
