<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;

class DashboardController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
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
    public function index()
    {
        return view('backend.dashboard');
    }

}
