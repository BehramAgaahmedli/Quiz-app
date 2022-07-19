@extends('layouts.admin')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                
                @if($errors->any())
                    <div class="alert alert-primary" role="alert">
                    @foreach($errors->all() as $error)
                       
                          <li> {{$error}}</li>
                       
                        @endforeach
                        </div>
                    @endif
                    @if(session("status"))
                        <div class="alert alert-primary" role="alert">
                            {{session("status")}}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title"> Quiz Əlavə Et</h4>
                            <p class="category">Quiz Oluşturunuz</p>
                        </div>
                        <div class="card-content">
                            <form action="{{route('admin.quiz.create.post')}}" method="POST">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label >Quiz Başlığı</label>
                                            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                            <span class="material-input"></span></div>


                                            <div class="form-group label-floating is-empty">
                                            <label >Quiz Açıqlama</label>
                                            <textarea name="description"  class="form-control" rows="10">{{ old('description') }}</textarea>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Üst kategoriya</label>
                                            <select name="ustimtahan_id" class="form-control" id="">
                                                @foreach($Ustimtahanlar as $key => $value)
                                                    <option  value="{{$value['id']}}">{{$value['name']}}</option>
                                                    @endforeach
                                            </select>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Alt kategoriya</label>
                                            <select name="altimtahan_id" class="form-control" id="">
                                                @foreach($Altimtahanlar as $key => $value)
                                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                                    @endforeach
                                            </select>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Quiz Qiyməti (endirimə qoyulacaqsa yüksək qiymət yazılmalıdır)</label>
                                            <input type="text" name="price" class="form-control" value="0.00"> 
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Son Quiz Qiyməti</label>
                                            <input type="text" name="final_price" class="form-control" value="0.00">
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                          <input type="hidden" name="teacher_id" class="form-control" value="{{auth()->user()->id}}">
                                            <span class="material-input"></span></div>

                                            <div  class="form-group label-floating is-empty">
                                            <input  id="isFinished" @if( old('finished_at')) checked @endif type="checkbox">
                                            <label>Bitiş tarixi olacaqmı? </label>                                       
                                            <span class="material-input"></span></div>


                                            <div id="finishedInput" @if( !old('finished_at')) style="display:none" @endif class="form-group label-floating is-empty">
                                            <label >Bitiş tarixi</label>
                                            <input type="datetime-local" value="{{ old('finished_at') }}" name="finished_at" class="form-control">
                                            <span class="material-input"></span></div>


                                            


                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Quiz Əlavə Et</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @section('script')
  
$('#isFinished').change(function(){
   if($('#isFinished').is(':checked')){
    $('#finishedInput').show();
   }
   else{
    $('#finishedInput').hide();
   }
});

@endsection

   
@endsection