<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Classes\Helper;
use Illuminate\Support\Facades\Auth;
use File;

class PwaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $user = Auth::user();
        // if(!$user) return view('pwa.login');

        $pages = File::allFiles(resource_path('views/pwa/pages'));
        $scripts = File::allFiles(public_path('js/onsen'));

        return view('pwa.main',["pages"=>$pages,"scripts"=>$scripts]);
    }
}