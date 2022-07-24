<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Result;
class Question extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function my_answer()
    {
        $Result= new Result;
        return $this->hasOne('App\Models\Answer')->where('user_id',auth()->user()->id)->orderByDesc('id');

    }
    

   






}
