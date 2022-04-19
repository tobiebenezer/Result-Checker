<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\entity;
use App\Models\results;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    //return the student home view
    public function index(){
        return view('student.home');
    }

    public function resultView(Request $request){

        $matric_number = entity::find(Auth::user()->entity)->matric_no;
        ;

        // $result = results::select()->where('matric_no',$matric_number)->get();

        // $course = courses::select()->get()
        $user = DB::table("courses")
                        ->join('results','courses.id','=','results.course_id')->select('courses.course_name','courses.level','courses.credit_load','results.grade','results.session','results.matric_no')->where('results.matric_no',$matric_number)->get();
                       
        $viewData =[];
        $viewData['title'] = 'Result Page';
        $viewData['results'] =$user;
        $viewData['mat_no'] = $matric_number;
        // foreach($viewData['results'] as $result):
        //     dd($result);
        // endforeach;
        
        return view('student.result')->with('viewData', $viewData);
                        
    }
}
