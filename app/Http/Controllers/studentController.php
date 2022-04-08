<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\entity;
use App\Models\results;
use Illuminate\Http\Request;

class studentController extends Controller
{
    //return the student home view
    public function index(){
        return view('student.home');
    }

    public function resultView(Request $request){
        $matric_number = entity::select('matric_no')->where('id',Auth::user()->role)->first()->matric_no;

        $result = results::select()->where('matric_no',$matric_number)->get();

        $course = courses::select()->get()
    }
}
