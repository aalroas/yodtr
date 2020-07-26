<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('backend.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      request()->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'name_tr' => 'required',
        ]);



        $city = new  City();


        $city->name_ar = $request->name_ar;
        $city->name_tr = $request->name_tr;
        $city->name_en = $request->name_en;

        $city->save();


        return redirect(route('cities.index'))->with('success', trans('Information has been added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {

        return view('backend.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
      request()->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'name_tr' => 'required',
        ]);


        $city->name_ar = $request->name_ar;
        $city->name_tr = $request->name_tr;
        $city->name_en = $request->name_en;
        $city->update();
        return redirect(route('cities.index'))->with('success', trans('Information has been updated successfully'));






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect(route('cities.index'))->with('success', trans('Information has been deleted successfully'));
    }
}
