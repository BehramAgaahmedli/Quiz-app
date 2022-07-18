<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class QuizController extends Controller
{
    public function index()
    {
        $data = Quiz::paginate(10);
        return view('admin.quiz.index',['data'=>$data]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {


    }

    public function edit()
    {
      
    }


    public function update()
    {
     
    }



    public function delete()
    {
       
    } 
}
