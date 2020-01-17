<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\FormHelper\Form;
use App\Models\Contact;
use App\Models\Personne;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('back.contacts.index',
        [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new_contact($personne = null)
    {
        if ($personne === null) {
            return redirect()->route('back_contact_before_add',
        [
            'give_personne' => 'personne',
            'form_entity' => 'contact'
        ]);
        }

        $contact   = new Contact();
        $data = [
            'contact'   => $contact,
            'endpoint'  => route('contact_store'),
            'form'      => new Form($contact, ['prefix'=>'contact', 'fields'=>[
                [
                    'name'  => Personne::FOREINGKEY,
                    'value' => $personne,
                    'type'  => 'hidden'
                ]
                ]]),
        ];

        return view('back.contacts.edit',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_contact = $request->input('contact');
        $foreignKey = Personne::FOREINGKEY;
        $contact = new Contact();
        $contact->pays          = $new_contact['pays'];
        $contact->ville         = $new_contact['ville'];
        $contact->email         = $new_contact['email'];
        $contact->telephone     = $new_contact['telephone'];
        $contact->adresse       = $new_contact['adresse'];
        $contact->$foreignKey   = $new_contact[$foreignKey];
        $contact->save();
        
        return redirect()->route('contact_show', [
                "id" => $contact->id
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id)->first();
        return view('back.contacts.show', 
        [
            'contact' => $contact
        ]);
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
