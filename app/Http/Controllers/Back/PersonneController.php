<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personne;
use App\Helpers\FormHelper\Form;

use Symfony\Component\HttpFoundation\Response;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($give = null, $from=null)
    {
        
        $personnes = Personne::all();

        $data = 
            [
                'from'      => $from,
                'personnes' => $personnes
            ];

        return view('back.personnes.index',$data);
    }

    public function ajax_index( Request $request)
    {
        $personnes = Personne::all();
        if ($request->input('find_by_name', null) != null) {
            $personnes = Personne::where('name' , 'like', "%".$request->input('find_by_name')."%")
                        ->get();
        }
        // dump($personnes);

        array_walk($personnes, function(&$datas, $key) {
            if (is_array($datas)) {
                array_walk($datas, function($item, $key) {
                    $item->url_by_personne = route('add_contact', ['personne'=> $item->id]);
                    $item->url_by_id = route('back_personne_show', ['id' => $item->id]);
                });
            }
        });

        return new Response(json_encode($personnes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $personne   = new Personne();

        $data = [
            'personne'   => $personne,
            'endpoint'  => route('back_personne_store'),
            'form'      => new Form($personne, ['prefix'=>Personne::PREFIX ]),
        ];

        return view('back.personnes.edit',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pers = $request->input(Personne::PREFIX);

        $personne = new Personne();

        $personne->name                 = $pers['name'];
        $personne->prename              = $pers['prename'];
        $personne->date_naissance       = $pers['date_naissance'];
        $personne->lieu_naissance       = $pers['lieu_naissance'];
        $personne->cin                  = $pers['cin'];
        $personne->date_livraison_cin   = $pers['date_livraison_cin'];

        $personne->save();

        return redirect()->route('back_personne_show', ['id' => $personne->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personne = Personne::where(['id'=>$id])->first();
       
        return view('back.personnes.show', ['personne' => $personne]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
