<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Quiz extends Model
{
    protected $dates=['finished_at'];
    use HasFactory;
    use Sluggable;
    protected $guarded =[];
    
    protected $appends = ['details','my_rank'];

    public function my_result(){

        return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id)->orderByDesc('id');
    }
    public function questions(){

        return $this->hasMany('App\Models\Question');
    }



    public function getMyRankAttribute()
    {  
        
           $rank=0;
            foreach ($this->results()->orderByDesc('points')->get() as $result)
            {
           $rank +=1;
             if(auth()->user()->id == $result->user_id)
             {

                return $rank ;

             }
            }

            
       
    }




    public function getDetailsAttribute()
    {
        if($this->results()->count()>0){

   return 
   [
       'average' => round($this->results()->avg('points')),
       'join_count'=>$this->results()->count()
   ];
   
    }
    return null;
    }





    public function results(){

        return $this->hasMany('App\Models\Result');
    }

    public function topTen()
    {

    return $this->results()->orderByDesc('points')->take(10);

    }
   
   
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
