<?php

namespace App\Http\Controllers\admin;
use App\Helper\imageUpload;
use App\Helper\mHelper;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;

class QuestionController extends Controller
{
    public function index($id)
    {
        $c = Quiz::where('id','=',$id)->where('teacher_id','=',auth()->user()->id)->count();
       if($c!=0)
        
        {
           $quiz= Quiz::where('id','=',$id)->get();
        $data =Question::where('quiz_id','=',$id)->paginate(10);
        $data1=Question::where('quiz_id','=',$id)->get();
        $countdata=count($data1);
        return view('admin.sual.index',['data'=>$data,'quiz'=>$quiz,'countdata'=>$countdata]);
    }
    else
    {
        return redirect('/dashboard');
    }
    }

    public function create($id)
    {
       // $id = $request->route('id');
        $c = Quiz::where('id','=',$id)->where('teacher_id','=',auth()->user()->id)->count();
        if($c!=0)
        
        {
            $quiz= Quiz::where('id','=',$id)->get();
        return view('admin.sual.create',['quiz'=>$quiz]);
    }
    else
    {
        return redirect('/');
    }
    }

    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'question' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'answer5' => 'required',
             'image' => 'image|nullable|mimes:jpg,png,img',
             'video' => 'nullable|mimes:mp4,webm,ogg',
             'audio' => 'nullable|mimes:mp3,ogg',
              'correct_answer' => 'required',
            
            
        ]);
     
        $all = $request->except('_token');
if($request->hasFile('image')){
        $ext = $request->image->extension();
        
       
        $fileName=rand(1,100).time().'.'.$ext;
       
$fileNameWithUpload='storage/suallarimage/'.$fileName;

$request->image->storeAs('public/suallarimage',$fileName);
$all['image']=$fileNameWithUpload;

}
  if($request->hasFile('video')){
    $ext = $request->video->extension();
    
   
    $fileName=rand(1,100).time().'.'.$ext;
   
$fileNameWithUpload='storage/suallarvideo/'.$fileName;

$request->video->storeAs('public/suallarvideo',$fileName);
$all['video']=$fileNameWithUpload;

}

if($request->hasFile('audio')){
    $ext = $request->audio->extension();
    
   
    $fileName=rand(1,100).time().'.'.$ext;
   
$fileNameWithUpload='storage/suallaraudio/'.$fileName;

$request->audio->storeAs('public/suallaraudio',$fileName);
$all['audio']=$fileNameWithUpload;

}

       
        $insert = Question::create($all);
        if($insert)
        {
            return redirect()->back()->with('status','Sual Başarı ile Eklendi');
        }
        else
        {
            return redirect()->back()->with('status','Sual Eklenemedi');
        }

    }

    public function edit($quiz_id,$id)
    {
       


        $c = Quiz::where('id','=',$quiz_id)->where('teacher_id','=',auth()->user()->id)->count();      
        $e=Question::where('id','=',$id)->where('quiz_id','=',$quiz_id)->count();
        if($c!=0 && $e!=0 )
        {   $quiz= Quiz::where('id','=',$quiz_id)->where('teacher_id','=',auth()->user()->id)->get();
            $question = Question::where('id','=',$id)->where('quiz_id','=',$quiz_id)->get();
         
            return view('admin.sual.edit',['question'=>$question,'quiz'=>$quiz]);
        }
        else
        {
            return redirect('/dashboard');
        }



    }


    public function update(Request $request)
    {
      
        $validated = $request->validate([
            'question' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'answer5' => 'required',
            'image' => 'image|nullable|mimes:jpg,png,img',
            'video' => 'nullable|mimes:mp4,webm,ogg',
            'audio' => 'nullable|mimes:mp3,ogg',
              'correct_answer' => 'required',
            
            
        ]);
       
        $id = $request->route('id');
        $c = Question::where('id','=',$id)->count();
        if($c!=0)
        {
           
            $all = $request->except('_token');



           $data= Question::where('id','=',$id)->get();
            if($request->hasFile('image')){
                $ext = $request->image->extension();
                
               
                $fileName=rand(1,100).time().'.'.$ext;
               
        $fileNameWithUpload='storage/suallarimage/'.$fileName;
        
        $request->image->storeAs('public/suallarimage',$fileName);
        $all['image']=$fileNameWithUpload;
        File::delete( $data[0]['image']);
        }
       
          if($request->hasFile('video')){
            $ext = $request->video->extension();
            
           
            $fileName=rand(1,100).time().'.'.$ext;
           
        $fileNameWithUpload='storage/suallarvideo/'.$fileName;
        
        $request->video->storeAs('public/suallarvideo',$fileName);
        $all['video']=$fileNameWithUpload;
        File::delete( $data[0]['video']);
        }
        
        if($request->hasFile('audio')){
            $ext = $request->audio->extension();
            
           
            $fileName=rand(1,100).time().'.'.$ext;
           
        $fileNameWithUpload='storage/suallaraudio/'.$fileName;
        
        $request->audio->storeAs('public/suallaraudio',$fileName);

        $all['audio']=$fileNameWithUpload;
        File::delete( $data[0]['audio']);
        }
      
            $update = Question::where('id','=',$id)->update($all);
            if($update)
            {
                return redirect()->back()->with('status','Sual Başarı ile Düzenlendi');
            }
            else
            {
                return redirect()->back()->with('status','Sual Düzenlenemedi');
            }
        }
        else
        {
            return redirect('/dashboard');
        }



    }



    public function delete($quiz_id,$id)
    {
       
       
        $c = Quiz::where('id','=',$quiz_id)->where('teacher_id','=',auth()->user()->id)->count();
        $f = Question::where('id','=',$id)->count();
        if($c!=0 && $f!=0)
        {
            
            $d = Quiz::where('id','=',$quiz_id)->get();
            $e = Question::where('id','=',$id)->get();
           
                File::delete($e[0]['image']);       
                File::delete($e[0]['video']);
                File::delete($e[0]['audio']);
            
            
            Question::where('id','=',$id)->where('quiz_id','=',$quiz_id)->delete();
            return redirect()->back();
        }
        else
        {
            return redirect('/dashboard');
        }


    } 
}
