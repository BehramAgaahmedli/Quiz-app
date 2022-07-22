<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Questions;
class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status','publish')->paginate(4); 

        return view('dashboard',['quizzes'=>$quizzes]);
    }

    public function quiz_detail($slug)   
    {     $c = Quiz::where('slug','=',$slug)->count();

        if($c!=0)     
         {
        $quiz = Quiz::where('slug',$slug)->first();
       
           return view('quiz_detail',['quiz'=>$quiz]);
         }
          else
          {
              return redirect('/dashboard');
          }
          
    }

    public function store(Request $request)
    {
      


    }

    public function edit($id)
    {
     
    }


    public function update(Request $request)
    {
     
    }



    public function delete($id)
    {
       
    } 
}
