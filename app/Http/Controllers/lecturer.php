<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\results;
use App\Models\User;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExcelSparserController as parse;

class lecturer extends Controller
{
    //display dashboard
    public function viewUpload(){
        //get the lecture id
        $lecturer = Auth::id();

        $view_data= [];
        $view_data['title'] = "Lecturers Dashboard";
        $view_data['upload'] = file::select()->where('id',$lecturer);

        return view('lecturer.index')->with('viewData',$view_data);
    }

    //Display update form
    public function form(){
        $view_data= [];
        $view_data['title'] = "Lecturers Dashboard";
        return view('lecturer.upload')->with('viewData',$view_data);
    }

    public function upload(Request $request){
        $content_parse = new parse();
        $content_parse->uploadContent($request);
        $view_data= [];
        $view_data['title'] = "Lecturers Dashboard";
        $view_data['message'] = "Successful";
        return view('lecturer.upload')->with('viewData',$view_data);
    }

    
}
