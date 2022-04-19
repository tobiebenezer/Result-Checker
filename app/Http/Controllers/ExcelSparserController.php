<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\courses;
use App\Models\results;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Shuchkin\SimpleXLS;
use Shuchkin\SimpleXLSX;

class ExcelSparserController extends Controller
{

    //saving result
    public function saveResult($result){
        //dd($result['mat_no']);
        $results = new results();
                  
                    $results->setMatricNo($result['mat_no']);
                    $results->setGrade($result['grade']);
                    $results->setSession($result['session']);
                    $results->file_id=$result['file_n_id'];
                    $results->course_id = $result['course_id'];
                    $results->save();
                    
                    if($results->save()):
                        return 'successful';
                    else:
                        return 'fail';
                    endif;
                    
    }

    


    //get the file for parsing
    public function uploadContent($req)
    {
        $file = $req->file('result');
        
        if($file):
            $extension = $file->getClientOriginalExtension(); // get the extension of uploaded file
            $file_name = $file->getClientOriginalName();
            $temp_path = $file->getRealPath();
            $file_size = $file->getSize();
           
            //check for file extension and size
            // $this->checkUploadedFileProperties($extension,$file_size);
            //where uploaded file will be stored on the server 
          
                //getting the couses title, creadi load and level from results sheet.
                            $credit_load = $req->input('credit_load');
                            $course_title= $req->input('course_title');
                            $level = $req->input('level');
                            $session = $req->input('session');                

                //check if course exit, if it those return the course id also create new course and return course id
                try{
                    DB::beginTransaction();
                $check = courses::select()->where('course_name',$course_title)->exists();

                if($check):
                    $course = new courses();
                    $course['course_name'] =$course_title;
                    $course['level']=$level;
                    $course['credit_load'] = $credit_load;
                    $course->save();

                    // returning id
                    $course_id = $course::select('id')->orderBy('id','DESC')->first()->id;

                endif;
                DB::commit();
                }catch(\Exception $e){
                    // 
                    DB::rollBack();
                }
               
                
                $check1 = File::select()->where('file_name',$file_name)->exists();
                
                try{
   
                   DB::beginTransaction();
                   
                if(!$check1){
                //upload file
                $new_file = new File();
                Storage::disk('public')->put($file_name,$temp_path);
                $new_file['file_name']= $file_name;
                    $new_file['file_path'] = $temp_path;
                    $new_file['user_id'] = Auth::id();
                    $new_file->save();
                    
                    //getting id for the uploaded file
                    $file_n_id=File::select('id')->orderBy('id','DESC')->first()->id;
                }else{
                    $file_n_id=File::select('id')->where('file_name',$file_name)->first()->id;
                    
                    
                    if($extension == 'xls'){
                        if($xls= SimpleXLS::parse($temp_path)):
                            foreach($xls->rows() as $i => $value):
                                if($i === 0){
                                    continue;
                                }
                                $mat_no = $value[1];
                                $grade = $value[2];
                                
                                    
                                    $result=[
                                        'mat_no'=>$mat_no,
                                        'grade'=>$grade,
                                        'session' => $session,
                                        'file_n_id' => $file_n_id,
                                        'course_id' => $course_id,
                                    ];
                                    
                                    
                                    $this->saveResult($result);
                                    
                                endforeach;
                            endif;
                        }elseif($extension == 'xlsx'){
                            
                            if($xlsx= SimpleXLSX::parse($temp_path)):
                                foreach($xlsx->rows() as $i => $value):
                                    if($i === 0){
                                        continue;
                                    }
                                    $mat_no = $value[1];
                                    $grade = $value[2];
                                
                                    
                                    $result=[
                                        'mat_no'=>$mat_no,
                                        'grade'=>$grade,
                                        'session' => $session,
                                        'file_n_id' => $file_n_id,
                                        'course_id' => $course_id,
                                    ]; 
                                    
                                   $this->saveResult($result);
                                   
                            endforeach;
                        endif;

                    }

                }

                                DB::commit();

                               return 'Success'; 
                            }catch(\Exception $e){
            
                                DB::rollBack();
                                return $e;
                            }
                        

        endif;
        
    }
}
