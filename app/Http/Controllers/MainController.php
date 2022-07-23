<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Result;

class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status','publish')->where('final_price','0.00')->paginate(4); 

        return view('dashboard',['quizzes'=>$quizzes]);
    }

    public function quiz_detail($id,$slug)   
    {     $c = Quiz::where('id','=',$id)->where('slug','=',$slug)->count();

        if($c!=0)     
         {
          $quiz= Quiz::where('id','=',$id)->where('slug',$slug)->with('questions','my_result','results','topTen.user')->first();
         
           return view('quiz_detail',compact('quiz'));
         }
          else
          {
              return redirect('/dashboard');
          }
          
    }



    public function answer_quiz_detail($id,$slug)   
    {     $c = Quiz::where('id','=',$id)->where('slug','=',$slug)->count();

        if($c!=0)     
         {
         $quiz = Quiz::where('id','=',$id)->where('slug','=',$slug)->with('questions','my_result','results','topTen.user')->first();
       
           return view('answer_quiz_detail',compact('quiz'));
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

    public function result(Request $request,$id,$slug)
    {
        $c = Quiz::where('id','=',$id)->where('slug',$slug)->count();

        if($c!=0)     
         {
            $all = $request->except('_token');
           
            $quiz= Quiz::where('id','=',$id)->where('slug',$slug)->where('final_price','0.00')->get();
           $questions=Question::where('quiz_id',$id)->get();
            $e=Question::where('quiz_id',$id)->count();
           $correct=0;

           foreach($questions as $question):

            Answer::create([

                'user_id'=>auth()->user()->id,
                'question_id'=>$question['id'],
                'answer'=>$request->post($question['id'])

            ]);
           
            if( $question['correct_answer']===$request->post($question->id) )
            {
                $correct+=1;
            }


          
           endforeach;
          
         $point=round((100 / $e) * $correct);
         $wrong=$e-$correct;
          Result::create([

            'user_id'=>auth()->user()->id,
            'quiz_id'=>$quiz[0]['id'],
            'points'=>$point,
            'correct'=> $correct,
            'wrong'=>$wrong
        ]);

      
        return redirect()->route('answer.quiz.detail',['id'=>$quiz[0]['id'],'slug'=>$quiz[0]['slug']])->with('status','Başarıyla Quizi Bitirdin. Puanın : '.$point);

         }
          else
          {
              return redirect('/dashboard');
          }
    }


    public function update(Request $request)
    {
     
    }



    public function delete($id)
    {
       
    } 
}
