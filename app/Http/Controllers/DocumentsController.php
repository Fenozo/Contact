<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Url;
use App\Models\Documentation;
use Illuminate\Support\Facades\Validator;
class DocumentsController extends Controller
{
    
    public function create($url_id)
    {
    	$url = Url::where(['id' => $url_id])->first();

    	// dd($url->toArray());
    	return view('page.document.edit',[
    			'url' => $url,
    			'endpoint' => route('document_store'),
    			'document' => new Documentation
    		]);
    }

    public function store(Request $request)
    {
    	$url_id = $request->get('url_id');

    	$this->validate($request, ['url_id' => 'required']);

    	if ($url_id == null) {
    		return redirect()->route('show_url_list');
    	}

    	$documentation = [
    			'url_id' 	=> $url_id,
    			'title'		=> $request->get('title'),
    			'content'	=> $request->get('content'),
    		];
    	$doc_created = Documentation::create($documentation);

    	return redirect()->route('document_show', ['id'=> $doc_created->id]);
    }

    public function show($id)
    {    	
    	if ($id == null) {
    		return redirect()->route('show_url_list');
    	}

    	$doc = Documentation::Where(['id' => $id])->first();
    	
    	return view('page.document.show', ['doc' => $doc]);
    }
}
