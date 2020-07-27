<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use App\Models\News;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\frontend\new_images;

class NewsController extends Controller
{
    private $uploadPath = "uploads/news/images/";


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:News-list|News-create|News-edit|News-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:News-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:News-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:News-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = News::all();
        return view('backend.news.index', compact('news'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $branches = Branch::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.news.create', compact('branches', 'categories', 'tags'));
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
            'image' => 'required',
        ]);


        // Start of Upload Files
        $formFileName = "image";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() . rand(1111, 9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        $new = new  News();
        $new->image =  $fileFinalName;

        $new->video_url = $request->video_url;


        $new->title_ar = $request->title_ar;
        $new->title_tr = $request->title_tr;
        $new->title_en = $request->title_en;
        if($request->title_en = ""){
            $new->slug = Str::slug($request->title_ar, '-');
        }else {
            $new->slug = Str::slug($request->title_en, '-');
        }

        $new->overview_en = $request->overview_en;
        $new->overview_ar = $request->overview_ar;
        $new->overview_tr = $request->overview_tr;

        $new->body_en = $request->body_en;
        $new->body_ar = $request->body_ar;
        $new->body_tr = $request->body_tr;


        $new->meta_description_ar = $request->meta_description_ar;
        $new->meta_keywords_ar = $request->meta_keywords_ar;

        $new->meta_description_en = $request->meta_description_en;
        $new->meta_keywords_en = $request->meta_keywords_en;

        $new->meta_description_tr = $request->meta_description_tr;
        $new->meta_keywords_tr = $request->meta_keywords_tr;


        $new->status = $request->status;
        $new->show_in_home = $request->show_in_home;
        $new->branch_id = $request->branch_id;



        $new->save();
        // Start of Upload Files
        if ($request->hasFile('news_images')) {
            $all_images = $request->file('news_images');
            $path = $this->getUploadPath();
            foreach ($all_images as $file) {
                $image_name = time() . rand(1111, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $image_name);
                $new_images = new news_images;
                $new_images->new_id = $new->id;
                $new_images->new_image_path = $image_name;
                $new_images->save();
            }
        }
        $new->categories()->sync($request->categories);
        $new->tags()->sync($request->tags);

        return redirect(route('news.index'))->with('success', trans('Information has been added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $new
     * @return \Illuminate\Http\Response
     */
    public function show(News $new)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $new
     * @return \Illuminate\Http\Response
     */
    public function edit(News $new)
    {
        $branches = Branch::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.news.edit', compact('new', 'branches', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $new
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $new)
    {
        request()->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'name_tr' => 'required',
            'image' => 'required',
        ]);


        if ($request->hasFile('image')) {
            if ($new->image != "") {
                $path = $this->getUploadPath();
                unlink($path . $new->image);
            }
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore =  time() . '.' . $extension;
            $path = $this->getUploadPath();
            $request->file('image')->move($path, $fileNameToStore);
            $new->image = $fileNameToStore;
            $new->save();
        }


        $new->video_url = $request->video_url;
        $new->title_ar = $request->title_ar;
        $new->title_tr = $request->title_tr;
        $new->title_en = $request->title_en;
        if ($request->title_en = "") {
            $new->slug = Str::slug($request->title_ar, '-');
        } else {
            $new->slug = Str::slug($request->title_en, '-');
        }
        $new->overview_en = $request->overview_en;
        $new->overview_ar = $request->overview_ar;
        $new->overview_tr = $request->overview_tr;
        $new->body_en = $request->body_en;
        $new->body_ar = $request->body_ar;
        $new->body_tr = $request->body_tr;
        $new->meta_description_ar = $request->meta_description_ar;
        $new->meta_keywords_ar = $request->meta_keywords_ar;
        $new->meta_description_en = $request->meta_description_en;
        $new->meta_keywords_en = $request->meta_keywords_en;
        $new->meta_description_tr = $request->meta_description_tr;
        $new->meta_keywords_tr = $request->meta_keywords_tr;
        $new->status = $request->status;
        $new->show_in_home = $request->show_in_home;
        $new->branch_id = $request->branch_id;
        $new->update($request->except('image'));

        // Start of Upload Files
        if ($request->hasFile('new_images')) {
            $all_images = $request->file('new_images');
            $path = $this->getUploadPath();
            foreach ($all_images as $file) {
                $image_name = time() . rand(1111, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $image_name);
                $new_images = new new_images;
                $new_images->new_id = $new->id;
                $new_images->new_image_path = $image_name;
                $new_images->save();
            }
        }

        $new->categories()->sync($request->categories);
        $new->tags()->sync($request->tags);

        return redirect(route('news.index'))->with('success', trans('Information has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $new
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $new)
    {

        $new_images = new_images::where('new_id', $new->id)->get();
        foreach ($new_images as $image) {
            if ($image->new_image_path != "") {
                $path = $this->getUploadPath();
                unlink($path . $image->new_image_path);
            }
        }
        if ($new->image != "") {
            $path = $this->getUploadPath();
            unlink($path . $new->image);
        }
        $new->delete();

        return redirect(route('news.index'))->with('success', trans('Information has been deleted successfully'));
    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

    public function deleteSingleImage($id)
    {
        $images = new new_images();
        $images = new_images::find($id);
        File::delete($this->getUploadPath() . $images->new_image_path);
        $images->delete($id);
        return response()->json([
            'success' => 'Data has been deleted successfully!'
        ]);
    }
}
