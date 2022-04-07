<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\courses;
use App\Models\File;

class results extends Model
{
    use HasFactory;

    protected $fillable = [
        'session',
        'matric_no',
        'grade',
        'course_id',
        'file_id'
    ];
    


    /**
     * $this->attributes['id'] - int- contains the index of the result
     * $this->attributes['file_id']-int- contains the id of the excel file the result was updated from
     * $this->attributes['grade']-string- contains the string of the grade obtained
     * $this->attributes['session']-int -contains the year grade was awarded
     * $this->courses()-courses[]-int-contains the
     * $this->attributes['matric_no']-string- contains the students matric number.
     *
     */

     public function getId()
     {
         $this->attributes['id'];
     }
     public function setId($id)
     {
         $this->attributes['id'] = $id;
     }
     public function getGrade()
     {
         $this->attributes['grade'];
     }
     public function setGrade($grade)
     {
         $this->attributes['grade'] = $grade;
     }
     public function getMatricNo(){
        $this->attributes['matric_no'];
     }
     public function setMatricNo($matNo){
        $this->attributes['matric_no']= $matNo;
     }
     public function getSession(){
        $this->attributes['session'];
     }
     public function setSession($sess){
        $this->attributes['session'] = $sess;
     }
     public function course(){
         $this->hasMany(courses::class);
     }
     public function getCourse(){
         $this->course;
     }
     public function setCourse($course){
         $this->course = $course;
     }
     public function file(){
         $this->hasMany(File::class);
     }
    
     public function getFile()
     {
         $this->file;
     }
     public function setFile($file){
         $this->file = $file;
     }
}
