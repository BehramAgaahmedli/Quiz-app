<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status','publish')->where('final_price','0.00')->paginate(4); 

        return view('dashboard',['quizzes'=>$quizzes]);
    }

    public function quiz_detail($slug)   
    {     $c = Quiz::where('slug','=',$slug)->count();

        if($c!=0)     
         {
        $quiz = Quiz::where('slug',$slug)->get();
       
           return view('quiz_detail',['quiz'=>$quiz]);
         }
          else
          {
              return redirect('/dashboard');
          }
          
    }

    public function quiz($id,$slug)
    {
        $c = Quiz::where('id','=',$id)->where('slug',$slug)->where('final_price','0.00')->count();

        if($c!=0)     
         {
      
            $quiz= Quiz::where('id','=',$id)->where('slug',$slug)->where('final_price','0.00')->get();
            $questions=Question::where('quiz_id',$id)->get();
       
           return view('quiz',['quiz'=>$quiz,'questions'=>$questions]);
         }
          else
          {
              return redirect('/dashboard');
          }

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
