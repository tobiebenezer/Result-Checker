<?php

namespace App\Http\Controllers;

use App\Models\entity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExcelSparserController as parse;
use App\Models\File;
use Illuminate\Support\Facades\DB;



class hodController extends Controller
{
    //
     //display dashboard
     public function viewUpload(){
        //get the lecture id
        $lecturer = Auth::id();

        $view_data= [];
        $view_data['title'] = "Lecturers Dashboard";
        $view_data['upload'] = file::select()->where('user_id',$lecturer)->paginate(15);
    
        // dd($view_data);
        return view('lecturer.index')->with('viewData',$view_data);
    }

    //Display update form
    public function form(){
        $view_data= [];
        $view_data['title'] = "Lecturers Dashboard";
        return view('lecturer.upload')->with('viewData',$view_data);
    }

    public function upload(Request $request){
        
        

        // 
        $content_parse = new parse();
        $view_data= [];
        $view_data['title'] = "Lecturers Dashboard";
        $view_data['message'] = $request->session()->flash('status',$content_parse->uploadContent($request));
        
        return redirect('/upload-form')->with('viewData',$view_data);
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
