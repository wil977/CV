<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propos;
use Validator;
use Illuminate\Support\Facedes\Input;
use Response;

class ProposAdminController extends Controller
{
  public function index()
  {
    $propos = Propos::all();
    return view('propos',['propos'=>$propos]);
  }

   protected function validator(array $data)
   {
       return Validator::make($data, [
           'commentaire' => 'required',
       ]);
   }

  public function saveP(Request $req)
  {
    $validator = $this->validator($req->all());
    if ($validator->fails()) {
      return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
    } else {
        $cmt = new Propos;
        $cmt->commentaire = $req->commentaire;
        $cmt->save();
        return back();
    }
  }

  public function editP(Request $req)
  {
      $cmt = Propos::find($req->input('idmodif'));
      $cmt->commentaire = $req->input('commentairemodif');
      $cmt->save();
      return back();
  }

  public function deleteP(Request $req)
  {
      $cmt = Propos::find($req->input('iddelete'))->delete();

      return back();
  }
}
