<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactAdminController extends Controller
{
  public function index()
  {
    $cont = Contact::all();
    return view('contact',['conts'=>$cont]);
  }

  public function saveCo(Request $req)
  {
    $cont = new Contact;
    $cont->email = $req->input('email');
    $cont->adresse = $req->input('adresse');
    $cont->tel = $req->input('tel');
    $cont->save();
    //Mail::to('wtiam36@gmail.com')->send(new Contact($req->except('_token')));
    return back();
  }

  public function editCo(Request $req)
  {
    $comp = Contact::find($req->input('id'));
    $comp->email = $req->input('email');
    $comp->adresse = $req->input('adresse');
    $comp->tel = $req->input('tel');
    $comp->save();
    return back();
  }

  public function deleteCo(Request $req)
  {
    $cont = Contact::find($req->input('id'))->delete();
    return back();
  }
}
