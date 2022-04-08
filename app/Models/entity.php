<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class entity extends Model
{
    use HasFactory;

        protected $fillable = [
            'matric_no',
            'role',
        ];
        protected $hidden = [
            
        ];
    

    /**
     * $this->attribute['entity_no'] -int- contain entity_id
     * $this->attribute['matric_no'] -string - contain the unique matic number of students
     * $this->attributes['Role']- string - contain the role of the user either student Lecturer or hod
     */
    
     public function getId()
     {
         $this->attributes['id'];
     }
     public function setId($id)
     {
         $this->attributes['id']=$id;
     }
     public function getRole()
     {
         $this->attributes['role'];
     }
     public function setRole($role)
     {
         $this->attributes['role']=$role;
     }
     public function getMatricNo()
     {
         $this->attributes['matric_no'];
     }
     public function setMatricNo($user_id,$reg_yrs)
     {
         $this->attributes['matric_no']="UJ/".$reg_yrs."CS".$user_id;
     }


}
