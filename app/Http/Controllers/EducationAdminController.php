<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationAdminController extends Controller
{
  public function index()
  {
    $edu = Education::all();
    return view('education',['edus'=>$edu]);
  }

  public function saveEd(Request $req)
  {
    $edu = new Education;
    $edu->entete = $req->input('entete');
    $edu->contenu = $req->input('contenu');
    $edu->colapse = $req->input('colapse');
    $edu->heading = $req->input('heading');
    $edu->save();
    return back();
  }

  public function editEd(Request $req)
  {
    $edu = Education::find($req->input('id'));
    $edu->entete = $req->input('entete');
    $edu->contenu = $req->input('contenu');
    $edu->colapse = $req->input('colapse');
    $edu->heading = $req->input('heading');
    $edu->save();
    return back();
  }

  public function deleteEd(Request $req)
  {
    $edu = Education::find($req->input('id'))->delete();
    return back();
  }
}
