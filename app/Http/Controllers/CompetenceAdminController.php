<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competence;

class CompetenceAdminController extends Controller
{
  public function index()
  {
    $comp = Competence::all();
    return view('competence',['comps'=>$comp]);
  }

  public function saveC(Request $req)
  {
    $comp = new Competence;
    $comp->name = $req->input('name');
    $comp->colors = $req->input('colors');
    $comp->width = $req->input('width');
    $comp->save();
    return back();
  }

  public function editC(Request $req)
  {
    $comp = Competence::find($req->input('id'));
    $comp->name = $req->input('name');
    $comp->colors = $req->input('colors');
    $comp->width = $req->input('width');
    $comp->save();
    return back();
  }

  public function deleteC(Request $req)
  {
    $comp = Competence::find($req->input('id'))->delete();
    return back();
  }
}
