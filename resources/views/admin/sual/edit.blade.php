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
                            <h4 class="title">Sual Düzənlə</h4>
                            <p class="category">{{$quiz[0]['title']}}</p>
                        </div>
                        <div class="card-content">
                            <form action="{{route('admin.quiz.sual.edit.post',['id'=>$question[0]['id']]) }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                    





                                    <div class="form-group label-floating is-empty">
                                            <label>Bölüm</label>

                                            <select name="Subject" class="form-control" id="">
                                               
                                                    <option @if($question[0]['subject'] == 1) selected @endif value="1">1</option>
                                                    <option @if($question[0]['subject'] == 2) selected @endif value="2">2</option>
                                                    <option @if($question[0]['subject'] == 3) selected @endif value="3">3</option>
                                               
                                       
                                                        </select >
                                            
                                            <span class="material-input"></span></div>

                                        <div class="form-group label-floating is-empty">
                                            <label >Sual</label>
                                            <textarea name="question"  class="form-control" rows="10">{{$question[0]['question']}}</textarea>
                                          
                                            <span class="material-input"></span></div>


                                            <div class="form-group label-floating is-empty">
                                           
                                            <label >Şəkil</label>
                                            @if($question[0]['image']!="")
                                            <a href="{{asset($question[0]['image'])}}" target="_blank">göstər </a>
                                               
                                            @endif
                                            <input type="file" name="image" style="opacity: 1;position: inherit" class="form-control">
                                           
                                            
                                            <span class="material-input"></span></div>
                                
                                            <div class="form-group label-floating is-empty">
                                            <label >Video</label>
                                            @if($question[0]['video']!="")
                                            <a href="{{asset($question[0]['video'])}}" target="_blank">göstər </a>
                                               
                                                @endif
                                            <input type="file" name="video" style="opacity: 1;position: inherit" class="form-control">
                                           
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label >Audio</label>
                                            @if($question[0]['audio']!="")
                                            <a href="{{asset($question[0]['audio'])}}" target="_blank">göstər </a>
                                               
                                                @endif
                                            <input type="file" name="audio" style="opacity: 1;position: inherit" class="form-control">
                                           
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>A) Variantı</label>
                                            <textarea name="answer1"  class="form-control" rows="4">{{$question[0]['answer1']}}</textarea>
                                          
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>B) Variantı</label>
                                            <textarea name="answer2"  class="form-control" rows="4">{{$question[0]['answer2']}}</textarea>
                                            
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>C) Variantı</label>
                                            <textarea name="answer3"  class="form-control" rows="4">{{$question[0]['answer3']}}</textarea>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>D) Variantı</label>
                                            <textarea name="answer4"  class="form-control" rows="4">{{$question[0]['answer4']}}</textarea>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>E) Variantı</label>
                                            <textarea name="answer5"  class="form-control" rows="4">{{$question[0]['answer5']}}</textarea>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Doğru Variantı</label>
                                            <select name="correct_answer" class="form-control" id="">
                                            
                                            <option @if($question[0]['correct_answer']==='answer1') selected @endif value="answer1">A) Variantı</option>
                                            <option @if($question[0]['correct_answer']==='answer2') selected @endif value="answer2">B) Variantı</option>
                                            <option @if($question[0]['correct_answer']==='answer3') selected @endif value="answer3">C) Variantı</option>
                                            <option @if($question[0]['correct_answer']==='answer4') selected @endif value="answer4">D) Variantı</option>
                                            <option  @if($question[0]['correct_answer']==='answer5') selected @endif value="answer5">E) Variantı</option>
                                                   
                                            </select>

                                            
                                            <span class="material-input"></span></div>


                                          








                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Sual Düzənlə</button>
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