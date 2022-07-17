@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @if(session("status"))
                        <div class="alert alert-primary" role="alert">
                            {{session("status")}}
                        </div>
                    @endif


                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title"> Üst İmtahan Kategori Əlavə Et</h4>
                            <p class="category">Kategori Oluşturunuz</p>
                        </div>
                        <div class="card-content">
                            <form enctype="multipart/form-data" action="{{route('admin.altimtahanlar.create.post')}}" method="POST">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">

                                    <div class="form-group label-floating is-empty">
                                            <label >Ust Kategori Adı</label>
                                              <select name="ustimtahan_id" class="form-control" id="">
                                                @foreach($data as $key => $value)
                                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                                    @endforeach
                                            </select>
                                            <span class="material-input"></span></div>


                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Kategori Adı</label>
                                            <input type="text" name="name" class="form-control">
                                            <span class="material-input"></span></div>

                                           
                                            <div class="form-group label-floating is-empty">
                                            <input type="file" name="image" style="opacity: 1;position: inherit" class="form-control">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Kategori Əlavə Et</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection