<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Ustimtahanlar;
use App\Models\Altimtahanlar;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use File;
class QuizController extends Controller
{
    public function index()
    {

        $data = Quiz::where('user_id',auth()->user()->id);
     if(request()->get('title')){

        $data=$data->where('title','LIKE',"%".request()->get('title')."%");
     }

     if(request()->get('status')){

        $data=$data->where('status',request()->get('status'));
    }
          $data=$data->paginate(10);        
        $data1 = Quiz::where('user_id',auth()->user()->id)->get();
        $countdata=count($data1);
        return view('admin.quiz.index',['data'=>$data,'countdata'=>$countdata]);
    }

    public function create()
    {
        $Ustimtahanlar = Ustimtahanlar::all();
        $Altimtahanlar = Altimtahanlar::all();
       

        return view('admin.quiz.create',['Ustimtahanlar'=>$Ustimtahanlar,'Altimtahanlar'=>$Altimtahanlar]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'final_price' => 'required',
            'random_number1' => 'required',       
            'time' => 'required',
            'finished_at' => 'nullable|after:'.now(),
        ]);
        $all = $request->except('_token');
        $insert = Quiz::create($all);
        if($insert)
        {
            return redirect()->back()->with('status','Quiz Başarı ile Eklendi');
        }
        else
        {
            return redirect()->back()->with('status','Quiz Eklenemedi');
        }


    }

    public function edit($id)
    {
        $c = Quiz::where('id','=',$id)->where('user_id','=',auth()->user()->id)->count();
        if($c!=0)
        {
            $data = Quiz::where('id','=',$id)->get();
            $Ustimtahanlar = Ustimtahanlar::all();
        $Altimtahanlar = Altimtahanlar::all();
       
            return view('admin.quiz.edit',['data'=>$data,'Ustimtahanlar'=>$Ustimtahanlar,'Altimtahanlar'=>$Altimtahanlar]);
        }
        else
        {
            return redirect('/dashboard');
        }
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'final_price' => 'required',
            'random_number1' => 'required',
            'time' => 'required',
            'finished_at' => 'nullable|after:'.now(),
        ]);

       // $id = $request->route('id');
        $c = Quiz::where('id','=',$id)->count();
        if($c!=0)
        {
           
            $all = $request->except('_token');
           
            $update= Quiz::where('id','=',$id)->update($all);
          
            if($update)
            {
                return redirect()->back()->with('status','Quiz Başarı ile Düzenlendi');
            }
            else
            {
                return redirect()->back()->with('status','Quiz Düzenlenemedi');
            }
       
            }
        else
        {
            return redirect('/dashboard');
        }




    }



    public function delete($id)
    {
       
        $c = Quiz::where('id','=',$id)->count();
        if($c!=0)
        {
         
           
            Quiz::where('id','=',$id)->where('user_id','=',auth()->user()->id)->delete();
            $d=Question::where('quiz_id','=',$id)->get();
            foreach($d as $e):
            File::delete($e['image']);
            File::delete($e['video']);
            File::delete($e['audio']);
            endforeach;
            Question::where('quiz_id','=',$id)->delete();

            return redirect()->back();
        }
        else
        {
            return redirect('/dashboard');
        }
    



    } 

   

}
