<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Url;
class UrlsController extends Controller
{

    public function home()
    {
        $urls = Url::all();
        return view('back.urls.home', [
            'urls' => $urls
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'url' => new Url(),
            'endpoint' => route('store_url'),
        ];

        return view('back.urls.edit', $data);
    }

    public function store_after_added(Request $request) 
    {
        $url        = $request->get('url');
        $content    = $request->get('description');

        $url_added =[
            'title'     =>  $request->get('title'),
            'url'       =>  $url,
            'description'   =>  $content,
            'shortened' => \App\Helpers\Shortened::getUniqueShortUrl(),
            'created_at'=> (new \Carbon\Carbon())->format('Y-m-d H:i:s')
            
        ];

        $data = Url::where(["url" => $url])->first();

        if (!$data) {
            Url::create($url_added);
            
            $data = Url::where(["url" => $url])->first();
        }


        return redirect()->route('show_details', [
                "shortened" => $data->shortened
            ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id )
    {
        
        $url = Url::where([
            'id' => $id
        ])->first();

        $data = [
            'url' => $url,
            'endpoint' => route('url_updater', ['id' => $id]),
        ];

        return view('back.urls.edit', $data);
    }


        /**
    * Modification
    */
    public function update($id, Request $request) 
    {
        $this->validate($request, ['url' => 'required|url']);
        $url_from_database = Url::find($id)->first();

        if ($url_from_database->created_at == null) {
            $url_from_database->created_at = (new \Datetime('NOW'))
                                                ->format('Y-m-d H:i:s');
            $url_from_database->save();
        }
        
        $data = [
            'url'           => $request->get('url'),
            'title'         => $request->get('title'),
            'description'   => $request->get('description'),
        ];

        Url::find($id)->update($data);

        return redirect()->route('show_url_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
