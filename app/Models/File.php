<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class File extends Model
{
    use HasFactory;
    protected $fillable =[
        'file_name',
        'file_path',
    ];

    /**
     * $this->attributes['file_name']-string- contain the name of the file
     * $this->attributes['file_path']-string- contain the path to the uploaded excel file.
    
     */
    
    public function getId(){
        $this->attributes['id'];
    }
    public function setId($id){
        $this->attributes['id'] = $id;
    }
    public function getFileName(){
        $this->attributes['file_name'];
    }
    public function setFileName($file_name){
        $this->attributes['file_name'] = $file_name;
    }

    public function getFilePath(){
        $this->attributes['file_path'];
    }
    public function setFilePath($file_path){
        $this->attributes['file_path'] = $file_path;
    }

}
