<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\courses;
use App\Models\results;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExcelSparserController extends Controller
{
    //get the file for parsing
    public function uploadContent($req)
    {
        $file = $req->file('result');
        if($file):
            $extension = $file->getClientOriginalExtension(); // get the extension of uploaded file
            $file_name = $file->getClientOriginalName().".".$extension;
            $temp_path = $file->getRealPath();
            $file_size = $file->getSize();

            //check for file extension and size
            // $this->checkUploadedFileProperties($extension,$file_size);
            //where uploaded file will be stored on the server 
            $location = 'uploaded'; // Created an "uploads" folder for that 
            
            


            //Reading file
            $file = fopen($temp_path,'r');
            $importData = array();//Read through the file and store the content in an array
            $i = 0;
            
            //Read the contents of the uploaded file
            while(($file_data = fgetcsv($file,100,",")) != FALSE)
            {
                $num = count($file_data);
                
                //getting the couses title, creadi load and level from results sheet.
                            $credit_load = $req->input('credit_load');
                            $course_title= $req->input('course_title');
                            $level = $req->input('level');
                            $session = $req->input('session');

                // for($i;$i<4;$i++)
                    
                    
                //     switch($i)
                //     {
                //         case 0:
                //              $course_title = $file_data[2];
                //              break;
                //         case 1: 
                //             $credit_load = $file_data[2];
                //             break;
                //         case 2: 
                //             $level = $file_data[2];
                //             break;
                //         case 3:
                //             $session = $file_data[2];
                //             break;
                            
                //     }
                    
                // }

                

                //check if course exit, if it those return the course id also create new course and return course id
                
                    DB::beginTransaction();
                $check = courses::select()->where('course_name',$course_title)->exists();

                if($check):
                    continue;
                else:
                    $course = new courses();
                    $course['course_name'] =$course_title;
                    $course['level']=$level;
                    $course['credit_load'] = $credit_load;
                    $course->save();
                    // returning id
                    $course_id = $course::select('id')->orderBy('id','DESC')->first()->id;
                endif;
                DB::commit();
            
                // DB::rollBack();
            
                if($i==0):
                    $i++;
                endif;

                for($c = 0; $c< $num;$c++):
                    $importData_arr[$i][]= $file_data[$c];
                     
                endfor;

                $i++;


            }
            fclose($file);
            
            foreach($importData as $import_data){
                try{
                    //upload file
            $new_file = new File();
            Storage::disk('public')->put($file_name,$temp_path);
            $new_file['file_name']= $file_name;
            $new_file['file_path'] = $temp_path;
            $new_file['user_id'] = Auth::id();
            $new_file->save();

            //getting id for the uploaded file
            $file_n_id=File::select('id')->orderBy('id','DESC')->first()->id;

                    DB::beginTransaction();
                    $result = new results();
                    $result->setMatric_no($import_data[1]);
                    $result->setgrade_no($import_data[2])
                    ;
                    $result->setSession($session);
                    $result['file_id']=$file_n_id;
                    $result['course_id'] = $course_id;
                    DB::commit();

                }catch(\Exception $e){
                    DB::rollBack();
                    
                }
            }

        endif;
        
    }
}
