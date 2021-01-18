<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceAdminController extends Controller
{
  public function index()
  {
    $expee = Experience::all();
    return view('experience',['exps'=>$expee]);
  }

  public function saveEx(Request $req)
  {
    $expe = new Experience;
    $expe->titre = $req->input('titre');
    $expe->contenu = $req->input('contenu');
    $expe->annee = $req->input('annee');
    $expe->color = $req->input('color');
    $expe->save();
    return back();
  }

  public function editEx(Request $req)
  {
    $expe = Experience::find($req->input('id'));
    $expe->titre = $req->input('titre');
    $expe->contenu = $req->input('contenu');
    $expe->annee = $req->input('annee');
    $expe->color = $req->input('color');
    $expe->save();
    return back();
  }

  public function deleteEx(Request $req)
  {
    $expe = Experience::find($req->input('id'))->delete();
    return back();
  }
}
