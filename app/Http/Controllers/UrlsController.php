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

        $this->validate($request, ['url' => 'required|url']);

        $record = $this->getRecordUrl($request->get('url'));

        return view('page.home.result')->with('shortened', $record->shortened);

    }

    public function show ($shortened)
    {
        $url = Url::whereShortened($shortened)->firstOrFail();

        return redirect($url->url);

    }

    private function getRecordUrl($url) {

        $record = Url::whereUrl($url)->first();

        if ($record) {
            return $record;
        }


        return Url::create([
            'url'       => $url,
            'shortened' => \App\Helpers\Shortened::getUniqueShortUrl(),
        ]);

       

    }
}
