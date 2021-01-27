<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;

class UploadcvAdminController extends Controller
{
    public function index()
    {
      return view('uploadcv');
    }


    public function uploadFile(Request $request)
    {
      // if(file_exists(Storage::path('CVWilfrid.pdf'))){
      //   unlink(Storage::path('CVWilfrid.pdf'));
      // }
      $request->file('pdf')->storeAs('public','CVWilfrid.pdf');
      return redirect()->back();
    }

    public function downloadFile()
    {
      // return Storage::download(asset('storage/app/public/CVWilfrid.pdf'));
      return response()->download(public_path('storage/CVWilfrid.pdf'),'CV_DE_Wilfrid.pdf');
    }
}
