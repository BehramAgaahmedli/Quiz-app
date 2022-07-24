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
            $questions=Question::where('quiz_id',$id)->where('subject',1)->inRandomOrder()->take($quiz[0]['random_number1'])->get();
            $questions2=Question::where('quiz_id',$id)->where('subject',2)->inRandomOrder()->take($quiz[0]['random_number2'])->get();
            $questions3=Question::where('quiz_id',$id)->where('subject',3)->inRandomOrder()->take($quiz[0]['random_number3'])->get();
       
           return view('quiz',['quiz'=>$quiz,'questions'=>$questions,'questions2'=>$questions2,'questions3'=>$questions3]);
         }
          else
          {
              return redirect('/dashboard');
          }

    }


    public function quiz_answer($id,$slug)
    {
        $c = Quiz::where('id','=',$id)->where('slug',$slug)->where('final_price','0.00')->count();

        if($c!=0)     
         {
           

            $quiz= Quiz::where('id','=',$id)->where('slug',$slug)->with('questions.my_answer')->where('final_price','0.00')->get();
            $result=Result::where('quiz_id',$id)->orderByDesc('id')->get();
           $answers=Answer::where('quiz_id',$id)->where('created_at',$result[0]['created_at'])->get();
         
        
       
            $questions1=Question::where('quiz_id',$id)->where('subject',1)->get();
            $questions2=Question::where('quiz_id',$id)->where('subject',2)->get(); 
            $questions3=Question::where('quiz_id',$id)->where('subject',3)->get();
    

        
        return view('quiz_result',['quiz'=>$quiz,'questions1'=>$questions1,'questions2'=>$questions2,'questions3'=>$questions3]);
        
         }
          else{
        
          
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
            $questions=Question::where('quiz_id',$id)->where('subject',1)->get();
            $questions2=Question::where('quiz_id',$id)->where('subject',2)->get();
            $questions3=Question::where('quiz_id',$id)->where('subject',3)->get();
            //$e=Question::where('quiz_id',$id)->count();
            $quiz1=Quiz::where('id','=',$id)->where('slug',$slug)->get();
           $correct1=0;
           $correct2=0;
           $correct3=0;
           foreach($questions as $question):

            Answer::create([
                
                'user_id'=>auth()->user()->id,
                'quiz_id'=>$id,
                'question_id'=>$question['id'],
                'answer'=>$request->post('answer'.$question['id'])

            ]);
           
            if( $question['correct_answer']===$request->post('answer'.$question->id) )
            {
                $correct1+=1;
            }
           
           endforeach;


           foreach($questions2 as $question):

            Answer::create([
                
                'user_id'=>auth()->user()->id,
                'quiz_id'=>$id,
                'question_id'=>$question['id'],
                'answer'=>$request->post('answer'.$question['id'])

            ]);
           
            if( $question['correct_answer']===$request->post('answer'.$question->id) )
            {
                $correct2+=1;
            }
           
           endforeach;

           foreach($questions3 as $question):

            Answer::create([
                
                'user_id'=>auth()->user()->id,
                'quiz_id'=>$id,
                'question_id'=>$question['id'],
                'answer'=>$request->post('answer'.$question['id'])

            ]);
           
            if( $question['correct_answer']===$request->post('answer'.$question->id) )
            {
                $correct3+=1;
            }
           
           endforeach;
      
           $correct= ($correct1+$correct2+$correct3);
           /*
           if($e[0]['random_number1']=null){

            $e[0]['random_number1']=0;

        }
    elseif($e[0]['random_number2']=null){
        $e[0]['random_number2']=0;
    }
    elseif($e[0]['random_number3']=null){
        $e[0]['random_number3']=0;
    } */
   
      $point=round((100 / ($quiz1[0]['random_number1']+$quiz1[0]['random_number2']+$quiz1[0]['random_number3'])  * $correct));
          
         
          $wrong1=$quiz1[0]['random_number1']-$correct1;
         $wrong2=$quiz1[0]['random_number2']-$correct2;
         $wrong3=$quiz1[0]['random_number3']-$correct3;
        
          Result::create([

            'user_id'=>auth()->user()->id,
            'quiz_id'=>$quiz[0]['id'],
            'points'=>$point,
            'correct1'=> $correct1,
            'wrong1'=>$wrong1,
            'correct2'=> $correct2,
            'wrong2'=>$wrong2,
            'correct3'=> $correct3,
            'wrong3'=>$wrong3
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
