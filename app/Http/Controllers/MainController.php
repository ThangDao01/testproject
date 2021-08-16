<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataSupportRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    //
    public function testSeed(){
        $data = null;
        if (Session::has('dataSupport')) {
            $data = Session::get('dataSupport');
        } else {
            $data = [];
        }
        return view('admin.data.result', [
            'data' => $data
        ]);
    }
    public function createView()
    {
        return view('admin.data.create');
    }
    public function create(DataSupportRequest $request)
    {
        //

//        $request->validated();
        $obj = new DataSupport();
        $obj->values = $request->get('values');
        $obj->words_vi = $request->get('words_vi');
        $obj->words_en = $request->get('words_en');
        $obj->voice_vi = $request->get('voice_vi');
        $obj->voice_en = $request->get('voice_en');
        $obj->images = $request->get('images');
        $obj->key = $request->get('key');
        $obj->createBy = 0;
        $obj->created_at = Carbon::now();
        $obj->updated_at = Carbon::now();
        Session::put('dataSupport', $obj);
        return view('admin.data.create');
    }
}
