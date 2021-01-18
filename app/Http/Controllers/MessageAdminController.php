<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class MessageAdminController extends Controller
{
  public function index()
  {
    $mes = Message::all();
    return view('message',['mes'=>$mes]);
  }

  public function saveM(Request $req)
  {
    $mes = new Message;
    $mes->name = $req->input('name');
    $mes->email = $req->input('email');
    $mes->subject = $req->input('subject');
    $mes->message = $req->input('message');
    $detail = [
      'title'=>'Mail de votre cv en ligne',
      'subject'=>  $mes->subject,
      'body'=>'Vous venez de recevoir un message de '.$mes->name.' dont l\'email est '.$mes->email.' et le message est : '.$mes->message,
    ];
     Mail::to('wtiam35@gmail.com')->send(new SendMail($detail));
    $mes->save();
    return back();
  }

  public function deleteM(Request $req)
  {
    $mes = Message::find($req->input('id'))->delete();
    return back();
  }
}
