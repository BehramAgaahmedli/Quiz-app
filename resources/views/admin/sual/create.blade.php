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
                            <h4 class="title"> {{$quiz[0]['title']}} üçün sual əlavə et</h4>
                            <p class="category">Sual Oluşturunuz</p>
                        </div>
                        <div class="card-content">
                            <form  action="{{route('admin.quiz.sual.create.post')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                            <label>Bölüm</label>
                                            <select name="Subject" class="form-control" id="">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>   
                                            
                                            </select>

                                            
                                            <span class="material-input"></span></div>

                                        <div class="form-group label-floating is-empty">
                                            <label >Sual</label>
                                            <textarea name="question"  class="form-control" rows="10">{{ old('question') }}</textarea>
                                          
                                            <span class="material-input"></span></div>


                                            <div class="form-group label-floating is-empty">
                                            <label >Şəkil</label>
                                            <input type="file" name="image" style="opacity: 1;position: inherit" class="form-control">
                                           
                                            <span class="material-input"></span></div>
                                
                                            <div class="form-group label-floating is-empty">
                                            <label >Video</label>
                                            <input type="file" name="video" style="opacity: 1;position: inherit" class="form-control">
                                           
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label >Audio</label>
                                            <input type="file" name="audio" style="opacity: 1;position: inherit" class="form-control">
                                           
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>A) Variantı</label>
                                            <textarea name="answer1"  class="form-control" rows="4">{{ old('answer1') }}</textarea>
                                          
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>B) Variantı</label>
                                            <textarea name="answer2"  class="form-control" rows="4">{{ old('answer2') }}</textarea>
                                            
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>C) Variantı</label>
                                            <textarea name="answer3"  class="form-control" rows="4">{{ old('answer3') }}</textarea>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>D) Variantı</label>
                                            <textarea name="answer4"  class="form-control" rows="4">{{ old('answer4') }}</textarea>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>E) Variantı</label>
                                            <textarea name="answer5"  class="form-control" rows="4">{{ old('answer5') }}</textarea>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Doğru Variantı</label>
                                            <select name="correct_answer" class="form-control" id="">
                                            
                                            <option @if(old('correct_answer')==='answer1') selected @endif value="answer1">A) Variantı</option>
                                            <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">B) Variantı</option>
                                            <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">C) Variantı</option>
                                            <option @if(old('correct_answer')==='answer4') selected @endif value="answer4">D) Variantı</option>
                                            <option  @if(old('correct_answer')==='answer5') selected @endif value="answer5">E) Variantı</option>
                                                   
                                            </select>

                                            
                                            <span class="material-input"></span></div>

                                          

                                            <div class="form-group label-floating is-empty">
                                           
                                            <input type="hidden" name="quiz_id" value="{{$quiz[0]['id']}}">
                                            <span class="material-input"></span></div>

                                            


                                            


                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Sual Əlavə Et</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

  

   
@endsection