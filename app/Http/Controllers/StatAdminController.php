<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stat;

class StatAdminController extends Controller
{
  public function index()
  {
    $stat = Stat::all();
    return view('stat',['stats'=>$stat]);
  }

  public function saveSt(Request $req)
  {
    $stat = new Stat;
    $stat->tasse = $req->input('tasse');
    $stat->projet = $req->input('projet');
    $stat->client = $req->input('client');
    $stat->save();
    return back();
  }

  public function editSt(Request $req)
  {
    $stat = Stat::find($req->input('id'));
    $stat->tasse = $req->input('tasse');
    $stat->projet = $req->input('projet');
    $stat->client = $req->input('client');
    $stat->save();
    return back();
  }

  public function deleteSt(Request $req)
  {
    $stat = Stat::find($req->input('id'))->delete();
    return back();
  }
}
