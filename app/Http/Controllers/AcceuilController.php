<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcceuilController extends Controller
{

  public function __construct()
  {

  }
    public function index()
    {

      return view(
        'acceuil',['propos'=> DB::table('propos')->first(),
        'expertises'=> DB::table('expertise')->get(),
        'stat'=>DB::table('stat')->first(),
        'competences'=>DB::table('competence')->get(),
        'educations'=>DB::table('education')->get(),
        'experiences'=>DB::table('experience')->get(),
        'contact'=>DB::table('contact')->first(),

      ]);
    }
}
