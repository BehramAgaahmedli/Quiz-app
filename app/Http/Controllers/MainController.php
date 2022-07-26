<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Result;
use App\Models\User;
use App\Models\Ustimtahanlar;
use App\Models\Altimtahanlar;
class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status','publish'); 
        $ustimtahanlars = Ustimtahanlar::get();
        $altimtahanlars = Altimtahanlar::get();
        if(request()->get('title')){

            $quizzes=$quizzes->where('title','LIKE',"%".request()->get('title')."%");
         }
    
         if(request()->get('status')){
    
            $quizzes=$quizzes->where('final_price',request()->get('status'));
        }
          

        $quizzes=$quizzes->orderByDesc('id')->paginate(4);



        return view('dashboard',['quizzes'=>$quizzes,'ustimtahanlars'=>$ustimtahanlars,'altimtahanlars'=>$altimtahanlars]);
    }

    public function quiz_detail($id,$slug)   
    {     $c = Quiz::where('id','=',$id)->where('slug','=',$slug)->count();

        if($c!=0)     
         {
            $ustimtahanlars = Ustimtahanlar::get();
            $altimtahanlars = Altimtahanlar::get();
          $quiz= Quiz::where('id','=',$id)->where('slug',$slug)->with('questions','my_result','results','topTen.user')->first();
         
           return view('quiz_detail',compact('quiz'),['ustimtahanlars'=>$ustimtahanlars,'altimtahanlars'=>$altimtahanlars]);
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



    public function quiz(Request $request)
    {
       
        $id=$request->post('quiz_id');

        $all = $request->except('_token');
      
        $c = Quiz::where('id','=',$id)->count();

        if($c!=0)     
         {
            
        $quiz= Quiz::where('id','=',$id)->get();
        
           

                        
             
                //$balans_user=auth()->user()->balans- $quiz[0]['final_price'];
               // $teacherbalans=($quiz[0]['final_price'] / 100) * 30;
               // $teacher_balans=auth()->user()->teacher_balans+$teacherbalans;
               // $user['balans']=$balans_user;   
               // $teacher['teacher_balans']=$teacher_balans;             
                //User::where('id',auth()->user()->id)->update('balans',$balans);
               // $all= User::where('id','=',auth()->user()->id)->update($user);
               // $all1= User::where('id','=',$quiz[0]['user_id'])->update($teacher);

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
        $c = Quiz::where('id','=',$id)->where('slug',$slug)->count();

        if($c!=0)     
         {
           
            
            $quiz= Quiz::where('id','=',$id)->where('slug',$slug)->with('my_result')->first();
           
            $questions1=Question::where('quiz_id',$id)->where('subject',1)->get();
            $questions2=Question::where('quiz_id',$id)->where('subject',2)->get(); 
            $questions3=Question::where('quiz_id',$id)->where('subject',3)->get();
    

        
        return view('quiz_result',compact('quiz'),['questions1'=>$questions1,'questions2'=>$questions2,'questions3'=>$questions3]);
        
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
            
          
            $quiz= Quiz::where('id','=',$id)->where('slug',$slug)->get();
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
                'question_id'=>$question['id'],
                'answer'=>$request->post('answer'.$question['id'])

            ]);
           
            if( $question['correct_answer']===$request->post('answer'.$question->id) )
            {
                $correct3+=1;
            }
           
           endforeach;
      
           $correct= ($correct1+$correct2+$correct3);
         
      $point=round((100 / ($quiz1[0]['random_number1']+$quiz1[0]['random_number2']+$quiz1[0]['random_number3']))  * $correct);
          
         
          $wrong1=$quiz1[0]['random_number1']-$correct1;
         $wrong2=$quiz1[0]['random_number2']-$correct2;
         $wrong3=$quiz1[0]['random_number3']-$correct3;
        
          Result::create([

            'user_id'=>auth()->user()->id,
            'quiz_id'=>$id,
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


  
}
