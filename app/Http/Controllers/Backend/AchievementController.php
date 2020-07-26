<?php

namespace App\Http\Controllers\Backend;


use App\Models\branch;
use App\Models\Achievement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AchievementType;
use Illuminate\Support\Facades\Validator;

class AchievementController extends Controller
{
    private $uploadPath = "uploads/achievements/images/";


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:Achievement-list|Achievement-create|Achievement-edit|Achievement-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:Achievement-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:Achievement-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:Achievement-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $achievements = Achievement::all();
        return view('backend.achievements.index', compact('achievements'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        $achievementtypes = AchievementType::all();
        return view('backend.achievements.create', compact('branches', 'achievementtypes'));
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
            'title_ar' => 'required',
            'student_name_ar' => 'required',
            'body_ar' => 'required',
        ]);


        // Start of Upload Files
        $formFileName = "image";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() . rand(1111, 9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        $achievement = new  Achievement();
        $achievement->image =  $fileFinalName;

        $achievement->student_name_ar = $request->student_name_ar;
        $achievement->student_name_en = $request->student_name_en;
        $achievement->student_name_tr = $request->student_name_tr;



        $achievement->title_ar = $request->title_ar;
        $achievement->title_tr = $request->title_tr;
        $achievement->title_en = $request->title_en;

        $achievement->slug = Str::slug($request->title_en, '-');

        $achievement->url = $request->url;

        $achievement->body_en = $request->body_en;
        $achievement->body_ar = $request->body_ar;
        $achievement->body_tr = $request->body_tr;

        $achievement->show_in_home = $request->show_in_home;
        $achievement->branch_id = $request->branch_id;
        $achievement->status = $request->status;

        $achievement->save();
        $achievement->achievementtypes()->sync($request->achievementtypes);
        return redirect(route('achievements.index'))->with('success', trans('Information has been added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function edit(Achievement $achievement)
    {

        $branches = Branch::all();
        $achievementtypes = AchievementType::all();
        return view('backend.achievements.edit', compact('achievement', 'branches', 'achievementtypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achievement $achievement)
    {
         request()->validate([
            'title_ar' => 'required',
            'student_name_ar' => 'required',
            'body_ar' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if ($achievement->image != "") {
                $path = $this->getUploadPath();
                unlink($path . $achievement->image);
            }
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore =  time() . '.' . $extension;
            $path = $this->getUploadPath();
            $request->file('image')->move($path, $fileNameToStore);
            $achievement->image = $fileNameToStore;
            $achievement->save();
        }

        $achievement->student_name_ar = $request->student_name_ar;
        $achievement->student_name_en = $request->student_name_en;
        $achievement->student_name_tr = $request->student_name_tr;



        $achievement->title_ar = $request->title_ar;
        $achievement->title_tr = $request->title_tr;
        $achievement->title_en = $request->title_en;

        $achievement->slug = Str::slug($request->title_en, '-');

        $achievement->url = $request->url;

        $achievement->body_en = $request->body_en;
        $achievement->body_ar = $request->body_ar;
        $achievement->body_tr = $request->body_tr;

        $achievement->show_in_home = $request->show_in_home;
        $achievement->branch_id = $request->branch_id;
        $achievement->status = $request->status;


        $achievement->update($request->except('image'));
        $achievement->achievementtypes()->sync($request->achievementtypes);

        return redirect(route('achievements.index'))->with('success', trans('Information has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achievement $achievement)
    {
        if ($achievement->image != "") {
            $path = $this->getUploadPath();
            unlink($path . $achievement->image);
        }

        $achievement->delete();
        return redirect(route('achievements.index'))->with('success', trans('Information has been deleted successfully'));
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
