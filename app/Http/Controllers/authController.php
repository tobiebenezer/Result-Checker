<?php

namespace App\Http\Controllers;

use App\Models\entity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class authController extends Controller
{
    //redirect user to login based on roles
    public function home(){
        if(Auth::user()):
        $role=entity::select('role')->where('id',Auth::user()->getEntity())->first()->role;
        
        // DB::table("users")
        // ->join('entities','users.role','=','results.id')->select('users.role')->where('users.id',Auth::user()->id)

    if($role=='hod'){
        return redirect()->route('admin.home');
    }elseif($role == 'lecturer'){
        return redirect()->route('lecturer.home');
    }else{
        return redirect()->route('student.home');
    }
    
else: 
    return redirect()->route('home');
endif;
}
}