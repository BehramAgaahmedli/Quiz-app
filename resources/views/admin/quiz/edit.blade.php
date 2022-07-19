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
                            <h4 class="title">Quiz Düzənlə</h4>
                            <p class="category">{{$data[0]['title']}}</p>
                        </div>
                        <div class="card-content">
                            <form action="{{route('admin.quiz.edit.post',['id'=>$data[0]['id']]) }}" method="POST">
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                    





                                            <div class="form-group label-floating is-empty">
                                            <label >Quiz Başlığı</label>
                                            <input type="text" name="title" value="{{ $data[0]['title'] }}" class="form-control">
                                            <span class="material-input"></span></div>


                                            <div class="form-group label-floating is-empty">
                                            <label >Quiz Açıqlama</label>
                                            <textarea name="description"  class="form-control" rows="10">{{ $data[0]['description'] }}</textarea>
                                            <span class="material-input"></span></div>



                                            <div class="form-group label-floating is-empty">
                                            <label>Üst kategoriya</label>
                                            <select name="ustimtahan_id" class="form-control" id="">
                                            @foreach($Ustimtahanlar as $key => $value)
                                                    <option @if($value['id'] == $data[0]['ustimtahan_id']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                                @endforeach
                                               
                                            </select>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Alt kategoriya</label>
                                            <select name="altimtahan_id" class="form-control" id="">
                                            @foreach($Altimtahanlar as $key => $value)
                                                    <option @if($value['id'] == $data[0]['altimtahan_id']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                                @endforeach
                                               
                                            </select>
                                            <span class="material-input"></span></div>


                                            <div class="form-group label-floating is-empty">
                                            <label>Quiz Qiyməti (endirimə qoyulacaqsa yüksək qiymət yazılmalıdır)</label>
                                            <input type="text" name="price" class="form-control" value="{{$data[0]['price']}}"> 
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Son Quiz Qiyməti</label>
                                            <input type="text" name="final_price" class="form-control" value="{{$data[0]['final_price']}}">
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Quiz Vaxtı (Dəqiqə Yazın)</label>
                                            <input type="text" name="time" class="form-control" value="{{$data[0]['time']}}">
                                            <span class="material-input"></span></div>


                                            <div  class="form-group label-floating is-empty">
                                            <input  id="isFinished" @if( $data[0]['finished_at']  ) checked @endif type="checkbox">
                                            <label>Bitiş tarixi olacaqmı? </label>                                       
                                            <span class="material-input"></span></div>


                                            <div id="finishedInput" @if(  !$data[0]['finished_at']  ) style="display:none" @endif class="form-group label-floating is-empty">
                                            <label >Bitiş tarixi</label>
                                            <input type="datetime-local" @if($data[0]['finished_at'] ) value="{{ date('Y-m-d\TH:i', strtotime($data[0]['finished_at'])) }}" @endif name="finished_at" class="form-control">
                                            <span class="material-input"></span></div>






                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Quiz Düzənlə</button>
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