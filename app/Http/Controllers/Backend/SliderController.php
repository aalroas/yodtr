<?php

namespace App\Http\Controllers\Backend;


use App\Models\Branch;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    private $uploadPath = "uploads/sliders/images/";


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:Slider-list|Slider-create|Slider-edit|Slider-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:Slider-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:Slider-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:Slider-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sliders = Slider::all();
        return view('backend.sliders.index', compact('sliders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        return view('backend.sliders.create', compact('branches'));
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
            'image' => 'required',
            'text_ar' => 'required',
        ]);


        // Start of Upload Files
        $formFileName = "image";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() . rand(1111, 9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        $slider = new  Slider();
        $slider->image =  $fileFinalName;



        $slider->title_ar = $request->title_ar;
        $slider->title_tr = $request->title_tr;
        $slider->title_en = $request->title_en;


        $slider->url = $request->url;

        $slider->text_en = $request->text_en;
        $slider->text_ar = $request->text_ar;
        $slider->text_tr = $request->text_tr;

        $slider->show_in_home = $request->show_in_home;
        $slider->branch_id = $request->branch_id;
        $slider->status = $request->status;

        $slider->save();

        return redirect(route('sliders.index'))->with('success', trans('Information has been added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $branches = Branch::all();
        return view('backend.sliders.edit', compact('slider', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
      request()->validate([
            'title_ar' => 'required',
            'image' => 'required',
            'text_ar' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if ($slider->image != "") {
                $path = $this->getUploadPath();
                unlink($path . $slider->image);
            }
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore =  time() . '.' . $extension;
            $path = $this->getUploadPath();
            $request->file('image')->move($path, $fileNameToStore);
            $slider->image = $fileNameToStore;
            $slider->save();
        }


        $slider->title_ar = $request->title_ar;
        $slider->title_tr = $request->title_tr;
        $slider->title_en = $request->title_en;


        $slider->url = $request->url;

        $slider->text_en = $request->text_en;
        $slider->text_ar = $request->text_ar;
        $slider->text_tr = $request->text_tr;

        $slider->show_in_home = $request->show_in_home;
        $slider->branch_id = $request->branch_id;
        $slider->status = $request->status;

        $slider->update($request->except('image'));


        return redirect(route('sliders.index'))->with('success', trans('Information has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image != "") {
            $path = $this->getUploadPath();
            unlink($path . $slider->image);
        }

        $slider->delete();
        return redirect(route('sliders.index'))->with('success', trans('Information has been deleted successfully'));
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
