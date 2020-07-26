<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\branch;
use App\Models\Language;
use App\Models\Department;
use App\Models\University;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UniversityController extends Controller
{
    private $uploadPath = "uploads/universities/logo/";


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:University-list|University-create|University-edit|University-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:University-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:University-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:University-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $universities = University::all();
        return view('backend.universities.index', compact('universities'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        $departments = Department::all();
        $branches = Branch::all();
        $cities = City::all();
        return view('backend.universities.create', compact('branches','cities','languages', 'departments'));
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
            'logo' => 'required',
        ]);


        // Start of Upload Files
        $formFileName = "logo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() . rand(1111, 9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        $university = new  University();
        $university->logo =  $fileFinalName;

        $university->video_url = $request->video_url;
        $university->city_id = $request->city_id;


        $university->founded_year = $request->founded_year;
        $university->students_count = $request->students_count;
        $university->website_url = $request->website_url;

        $university->show_in_home = $request->show_in_home;
        $university->branch_id = $request->branch_id;


        $university->name_ar = $request->name_ar;
        $university->name_tr = $request->name_tr;
        $university->name_en = $request->name_en;

        $university->slug = Str::slug($request->name_en, '-');

        $university->overview_en = $request->overview_en;
        $university->overview_ar = $request->overview_ar;
        $university->overview_tr = $request->overview_tr;

        $university->contact_details_en = $request->contact_details_en;
        $university->contact_details_ar = $request->contact_details_ar;
        $university->contact_details_tr = $request->contact_details_tr;




        $university->save();

        $university->languages()->sync($request->languages);
        $university->departments()->sync($request->departments);



        return redirect(route('universities.index'))->with('success', trans('Information has been added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        $languages = Language::all();
        $departments = Department::all();
        $branches = Branch::all();
        $cities = City::all();

        return view('backend.universities.edit', compact('university', 'branches', 'cities', 'languages', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
      request()->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'name_tr' => 'required',
            'logo' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            if ($university->logo != "") {
                $path = $this->getUploadPath();
                unlink($path . $university->logo);
            }
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore =  time() . '.' . $extension;
            $path = $this->getUploadPath();
            $request->file('logo')->move($path, $fileNameToStore);
            $university->logo = $fileNameToStore;
            $university->save();
        }

        $university->video_url = $request->video_url;
        $university->city_id = $request->city_id;


        $university->founded_year = $request->founded_year;
        $university->students_count = $request->students_count;
        $university->website_url = $request->website_url;

        $university->show_in_home = $request->show_in_home;
        $university->branch_id = $request->branch_id;


        $university->name_ar = $request->name_ar;
        $university->name_tr = $request->name_tr;
        $university->name_en = $request->name_en;

        $university->slug = Str::slug($request->name_en, '-');

        $university->overview_en = $request->overview_en;
        $university->overview_ar = $request->overview_ar;
        $university->overview_tr = $request->overview_tr;

        $university->contact_details_en = $request->contact_details_en;
        $university->contact_details_ar = $request->contact_details_ar;
        $university->contact_details_tr = $request->contact_details_tr;

        $university->update($request->except('logo'));
        $university->languages()->sync($request->languages);
        $university->departments()->sync($request->departments);
        return redirect(route('universities.index'))->with('success', trans('Information has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        if ($university->logo != "") {
            $path = $this->getUploadPath();
            unlink($path . $university->logo);
        }

        $university->delete();
        return redirect(route('universities.index'))->with('success', trans('Information has been deleted successfully'));
    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }
}
