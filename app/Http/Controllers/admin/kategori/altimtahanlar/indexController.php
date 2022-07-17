<?php

namespace App\Http\Controllers\admin\kategori\altimtahanlar;
use File;
use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Models\Altimtahanlar;
use App\Models\Ustimtahanlar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class indexController extends Controller
{
    public function index()
    {
        $data = Altimtahanlar::paginate(10);
        return view('admin.altimtahanlar.index',['data'=>$data]);
    }

    public function create()
    {$data = Ustimtahanlar::all();
        return view('admin.altimtahanlar.create',['data'=>$data]);
    }

    public function store(Request $request)
    {

        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image'] = imageUpload::singleUpload(rand(1,19000),"imtahanlar",$request->file('image'));
        $insert = Altimtahanlar::create($all);
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
        $data1 = Ustimtahanlar::all();
        $c = Altimtahanlar::where('id','=',$id)->count();
        if($c!=0) {
            $data = Altimtahanlar::where('id', '=', $id)->get();
            return view('admin.altimtahanlar.edit', ['data' => $data,'data1' => $data1]);
        }
        else
        {
            return redirect('/');
        }
    }


    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Altimtahanlar::where('id','=',$id)->count();
        if($c!=0)
        {
            $data = Altimtahanlar::where('id','=',$id)->get();
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $all['image'] = imageUpload::singleUploadUpdate(rand(1,9000),"imtahanlar",$request->file('image'),$data,"image");
            $update = Altimtahanlar::where('id','=',$id)->update($all);
         
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
        $c = Altimtahanlar::where('id','=',$id)->count();
        if($c!=0)
        {
            $delete = Altimtahanlar::where('id','=',$id)->delete();
            return redirect()->back();
        }
        else
        {
            return redirect('/');
        }
    } 
}
