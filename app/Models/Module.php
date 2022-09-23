<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function worksheets()
    {
        
        
        return $this->hasOne('App\Models\Worksheet', 'module_id', 'id');
    }

    public function quizzes()
    {
        
        
        return $this->hasOne('App\Models\Quizz', 'module_id', 'id');
    }
}
