<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AchievementType;
use Illuminate\Support\Facades\Validator;

class AchievementTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievementtypes = AchievementType::all();
        return view('backend.achievementtypes.index', compact('achievementtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.achievementtypes.create');
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



        $achievement_type = new  AchievementType();
        $achievement_type->name_ar = $request->name_ar;
        $achievement_type->name_tr = $request->name_tr;
        $achievement_type->name_en = $request->name_en;
        $achievement_type->slug = Str::slug($request->name_en, '-');
        $achievement_type->save();


        return redirect(route('achievementtypes.index'))->with('success', trans('Information has been added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AchievementType  $achievement_type
     * @return \Illuminate\Http\Response
     */
    public function show(AchievementType $achievement_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AchievementType  $achievement_type
     * @return \Illuminate\Http\Response
     */
    public function edit(AchievementType $achievement_type)
    {

        return view('backend.achievementtypes.edit', compact('AchievementType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AchievementType  $achievement_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AchievementType $achievement_type)
    {
      request()->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'name_tr' => 'required',
        ]);


        $achievement_type->name_ar = $request->name_ar;
        $achievement_type->name_tr = $request->name_tr;
        $achievement_type->name_en = $request->name_en;
        $achievement_type->slug = Str::slug($request->name_en, '-');
        $achievement_type->update();
        return redirect(route('achievementtypes.index'))->with('success', trans('Information has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AchievementType  $achievement_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(AchievementType $achievement_type)
    {
        $achievement_type->delete();
        return redirect(route('achievementtypes.index'))->with('success', trans('Information has been deleted successfully'));
    }
}
