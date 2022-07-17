<?php

namespace App\Http\Controllers\admin\kategori\ustimtahanlar;

use App\Helper\mHelper;
use App\Models\Ustimtahanlar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index()
    {
        $data = Ustimtahanlar::paginate(10);
        return view('admin.imtahanlar.index',['data'=>$data]);
    }

    public function create()
    {
        return view('admin.imtahanlar.create');
    }

    public function store(Request $request)
    {

        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert = Ustimtahanlar::create($all);
        if($insert)
        {
            return redirect()->back()->with('status','Kategori Başarı ile Eklendi');
        }
        else
        {
            return redirect()->back()->with('status','Kategori Eklenemedi');
        }


    }

    public function edit($id)
    {
        $c = Ustimtahanlar::where('id','=',$id)->count();
        if($c!=0) {
            $data = Ustimtahanlar::where('id', '=', $id)->get();
            return view('admin.imtahanlar.edit', ['data' => $data]);
        }
        else
        {
            return redirect('/');
        }
    }


    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Ustimtahanlar::where('id','=',$id)->count();
        if($c!=0)
        {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Ustimtahanlar::where('id','=',$id)->update($all);
            if($update)
            {
                return redirect()->back()->with('status','Kategori Düzenlendi');
            }
            else
            {
                return redirect()->back()->with('status','Kategori Düzenlenemedi');
            }
        }
        else
        {
            return redirect('/');
        }
    }



    public function delete($id)
    {
        $c = Ustimtahanlar::where('id','=',$id)->count();
        if($c!=0)
        {
            $delete = Ustimtahanlar::where('id','=',$id)->delete();
            return redirect()->back();
        }
        else
        {
            return redirect('/');
        }
    } 
}
