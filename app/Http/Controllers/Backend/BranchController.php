<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    private $uploadPath = "uploads/branches/logo/";


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:branch-list|branch-create|branch-edit|branch-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:branch-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:branch-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:branch-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branches = Branch::all();
        return view('backend.branches.index', compact('branches'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('backend.branches.create',compact('cities'));
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
            'branch_subdomain' => 'required|unique:branches',
            'logo' => 'required',
        ]);


        // Start of Upload Files
        $formFileName = "logo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() . rand(1111,9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        $branch = new  Branch();
        $branch->logo =  $fileFinalName;

        $branch->branch_subdomain = $request->branch_subdomain;
        $branch->city_id = $request->city_id;

        $branch->name_ar = $request->name_ar;
        $branch->name_tr = $request->name_tr;
        $branch->name_en = $request->name_en;

        $branch->description_ar = $request->description_ar;
        $branch->description_tr = $request->description_tr;
        $branch->description_en = $request->description_en;




        $branch->save();
        return redirect(route('branches.index'))->with('success', trans('Information has been added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $cities = City::all();

        return view('backend.branches.edit', compact('branch', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
      request()->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'name_tr' => 'required',
            'branch_subdomain' => 'required|unique:branches',
        ]);

        if ($request->hasFile('logo')) {
            if ($branch->logo != "") {
                $path = $this->getUploadPath();
                unlink($path. $branch->logo);
            }
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore =  time() . '.' . $extension;
            $path = $this->getUploadPath();
            $request->file('logo')->move($path, $fileNameToStore);
            $branch->logo = $fileNameToStore;
            $branch->save();
        }

        $branch->branch_subdomain = $request->branch_subdomain;
        $branch->city_id = $request->city_id;

        $branch->name_ar = $request->name_ar;
        $branch->name_tr = $request->name_tr;
        $branch->name_en = $request->name_en;

        $branch->description_ar = $request->description_ar;
        $branch->description_tr = $request->description_tr;
        $branch->description_en = $request->description_en;


        $branch->update($request->except('logo'));
        return redirect(route('branches.index'))->with('success', trans('Information has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        if($branch->logo != ""){
            $path = $this->getUploadPath();
            unlink($path. $branch->logo);
        }

        $branch->delete();
        return redirect(route('branches.index'))->with('success', trans('Information has been deleted successfully'));

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
