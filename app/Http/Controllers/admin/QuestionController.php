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
        return view('admin.sual.index',['data'=>$data,'quiz'=>$quiz]);
    }
    else
    {
        return redirect('/');
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
             'image' => 'nullable|mimes:jpg,png,img',
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
