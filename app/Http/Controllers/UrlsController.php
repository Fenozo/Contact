<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Url;

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

        $url_list = Url::orderBy('id', 'desc')->paginate(3);

        return view('page.home.index', [
            'url_list' => $url_list
            ]);
    }

    public function render_show($data) 
    {
        return view('page.url.show_details', $data);
    }


    public function show_details($shortened)
    {   
        $data = []; $documentations = [];

        if ($shortened) {
            $data = Url::where(['shortened' => $shortened])->first();
            $documentations = Url::where([
                    'shortened' => $shortened
                ])->first()->documentations;
           
        } else 
            {
                return redirect()->route('show_url_list');
            }

            
        $data = [
            'data'  => $data,
            'documentations' => $documentations,
        ];
            
        return $this->render_show($data);
    }

    public function finder(Request $request) 
    {
        $url = $request->get('url');

        $urls = \App\Models\Url::where(
            [
                'url' => $url 
            ])->get();

        $urls =[
            'urls' => $urls
        ];


        return view('page.url.list', $urls);
    }


    public function store(Request $request)
    {

        $this->validate($request, ['url' => 'required|url']);

        $record = $this->getRecordUrl($request->get('url'));

        return view('page.home.result')->with('shortened', $record->shortened);

    }

    public function showUrlList(Request $request)
    {
      
        $url = $request->input('url', null);
        if ($url === null) {
            $url = '';
        }

        $url_list = Url::where('url', 'like', '%'.$url.'%')
                        ->orderBy('id', 'desc')
                        ->paginate(3);

        return view('page.url.showOrcreate' ,[
            'url_list'  => $url_list,
            'finding'   => $url,
        ]);
    }

    public function show_with_shortened ($shortened)
    {
        $url = Url::whereShortened($shortened)->firstOrFail();

        return redirect($url->url);

    }

    public function show_with_url($url)
    {
        $url = Url::whereUrl($url)->firstOrFail();

        return redirect($url->url);
    }

    private function getRecordUrl($url) {

        return Url::firstOrCreate(
            ['url'       => $url ], 
            [
                'shortened' => \App\Helpers\Shortened::getUniqueShortUrl()
            ]);

    }

    public function show()
    {
        
    }
}
