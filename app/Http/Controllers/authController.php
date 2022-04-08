<?php

namespace App\Http\Controllers;

use App\Models\entity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    //redirect user to login based on roles
    public function home(){
        $role=entity::select('role')->where('id',Auth::user()->getEntity())->first()->role;
    if($role=='hod'){
        return route('admin.home');
    }elseif($role == 'lecturer'){
        return route('lecturer.home');
    }else{
        return route('student.home');
    }
    }
        
}
