<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Url;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UrlsController extends Controller
{
    // *
    //  * Create a new controller instance.
    //  *
    //  * @return void
     
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd(DB::query('SELECT * FROM urls'));


        // http://google.com

        return view('page.home.index');
    }

    public function store(Request $request)
    {
        $url = trim($request->get('url'));

        Validator::make(compact('url'), ['url' => 'required|url'])->validate();

        $record = Url::where(['url'=> $url])->first();

        if ($record) {
            return view('page.home.result')->with('shortened', $record->shortened);
        }

        $get_shortened = \App\Helpers\Shortened::getUniqueShortUrl();

        $row = Url::create([
            'url'       => $url,
            'shortened' => $get_shortened,
        ]);

        if ($row) {
            return view('page.home.result')
            ->withShortened($row->shortened);
        }

    }

    public function show ($shortened)
    {
        $url = Url::whereShortened($shortened)->firstOrFail();

        return redirect($url->url);

    }
}
