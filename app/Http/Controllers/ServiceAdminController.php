<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceAdminController extends Controller
{
  public function index()
  {
    $exp = Service::all();
    return view('service',['exps'=>$exp]);
  }

  public function saveS(Request $req)
  {
    $exp = new Service;
    $exp->titre = $req->input('titre');
    $exp->contenu = $req->input('contenu');
    $exp->couleur = $req->input('couleur');
    $exp->icon = $req->input('icon');
    $exp->save();
    return back();
  }

  public function editS(Request $req)
  {
    $exp = Service::find($req->input('id'));
    $exp->titre = $req->input('titre');
    $exp->contenu = $req->input('contenu');
    $exp->couleur = $req->input('couleur');
    $exp->icon = $req->input('icon');
    $exp->save();
    return back();
  }

  public function deleteS(Request $req)
  {
    $exp = Service::find($req->input('id'))->delete();
    return back();
  }
}
