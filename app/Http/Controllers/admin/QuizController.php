<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Ustimtahanlar;
use App\Models\Altimtahanlar;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QuizController extends Controller
{
    public function index()
    {
        $data = Quiz::where('teacher_id',auth()->user()->id)->paginate(10);
        return view('admin.quiz.index',['data'=>$data]);
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
            'description' => 'required',
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
        $c = Quiz::where('id','=',$id)->count();
        if($c!=0)
        {
            $data = Quiz::where('id','=',$id)->get();
            $Ustimtahanlar = Ustimtahanlar::all();
        $Altimtahanlar = Altimtahanlar::all();
            return view('admin.quiz.edit',['data'=>$data,'Ustimtahanlar'=>$Ustimtahanlar,'Altimtahanlar'=>$Altimtahanlar]);
        }
        else
        {
            return redirect('/');
        }
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'finished_at' => 'nullable|after:'.now(),
        ]);

        $id = $request->route('id');
        $c = Quiz::where('id','=',$id)->count();
        if($c!=0)
        {
           
            $all = $request->except('_token');
           
            $update = Quiz::where('id','=',$id)->update($all);
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
            return redirect('/');
        }




    }



    public function delete()
    {
       
    } 

   

}
