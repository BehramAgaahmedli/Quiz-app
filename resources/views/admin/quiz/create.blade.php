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
                                            <label >Quiz Başlığı (title)</label>
                                            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                            <span class="material-input"></span></div>


                                            <div class="form-group label-floating is-empty">
                                            <label >Quiz Açıqlama (description)</label>
                                            <textarea name="description"  class="form-control" rows="10">{{ old('description') }}</textarea>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Üst kategoriya</label>
                                            <select name="ustimtahan_id" class="form-control" id="">
                                                @foreach($Ustimtahanlar as $key => $value)
                                                    <option @if( old('ustimtahan_id')== $value['id'] ) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                                    @endforeach
                                            </select>
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Alt kategoriya</label>
                                            <select name="altimtahan_id" class="form-control" id="">
                                                @foreach($Altimtahanlar as $key => $value)
                                                    <option @if( old('altimtahan_id')== $value['id'] ) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                                    @endforeach
                                            </select>
                                            <span class="material-input"></span></div>


                                            <div class="form-group label-floating is-empty">
                                            <label>1-ci Bölüm(Fənn) (subject1)</label>
                                            <select name="subject1" class="form-control" id="">
                                              
                                            <option  value="">Seçiniz</option>                                         
                                            <option @if( old('subject1') == "Azərbaycan_dili" ) selected @endif  value="Azərbaycan_dili">Azərbaycan dili</option>
                                            <option @if( old('subject1') == "Ədəbiyyat" ) selected @endif value="Ədəbiyyat">Ədəbiyyat</option>
                                            <option   @if( old('subject1') == "Riyaziyyat" ) selected @endif value="Riyaziyyat">Riyaziyyat</option>
                                            <option  @if( old('subject1') == "Tarix" ) selected @endif value="Tarix">Tarix</option>
                                            <option @if( old('subject1') == "Fizika" ) selected @endif value="Fizika">Fizika</option>
                                            <option @if( old('subject1') == "Biologiya" ) selected @endif value="Biologiya">Biologiya</option>
                                            <option  @if( old('subject1') == "Kimya" ) selected @endif value="Kimya">Kimya</option>
                                            <option  @if( old('subject1') == "Coğrafiya" ) selected @endif value="Coğrafiya">Coğrafiya</option>
                                            <option  @if( old('subject1') == "İngilis_dili" ) selected @endif value="İngilis_dili">İngilis dili</option>
                                                  
                                            </select>
                                            <span class="material-input"></span></div>


                                            <div class="form-group label-floating is-empty">
                                            <label>1-ci Bölüm(Fənn) Sual Sayı (random_number1)</label>
                                            <input type="text" name="random_number1" value="{{ old('random_number1') }}"  class="form-control" >
                                            <span class="material-input"></span></div>




                                            <div class="form-group label-floating is-empty">
                                            <label>2-ci Bölüm(Fənn) (subject2)</label>
                                            <select name="subject2" class="form-control" id="">
                                              
                                            <option  value="">Seçiniz</option>                                         
                                            <option @if( old('subject2') == "Azərbaycan_dili" ) selected @endif  value="Azərbaycan_dili">Azərbaycan dili</option>
                                            <option @if( old('subject2') == "Ədəbiyyat" ) selected @endif value="Ədəbiyyat">Ədəbiyyat</option>
                                            <option   @if( old('subject2') == "Riyaziyyat" ) selected @endif value="Riyaziyyat">Riyaziyyat</option>
                                            <option  @if( old('subject2') == "Tarix" ) selected @endif value="Tarix">Tarix</option>
                                            <option @if( old('subject2') == "Fizika" ) selected @endif value="Fizika">Fizika</option>
                                            <option @if( old('subject2') == "Biologiya" ) selected @endif value="Biologiya">Biologiya</option>
                                            <option  @if( old('subject2') == "Kimya" ) selected @endif value="Kimya">Kimya</option>
                                            <option  @if( old('subject2') == "Coğrafiya" ) selected @endif value="Coğrafiya">Coğrafiya</option>
                                            <option  @if( old('subject2') == "İngilis_dili" ) selected @endif value="İngilis_dili">İngilis dili</option>
                                                  
                                            </select>
                                            <span class="material-input"></span></div>


                                            <div class="form-group label-floating is-empty">
                                            <label>2-ci Bölüm(Fənn) Sual Sayı (random_number2)</label>
                                            <input type="text" name="random_number2" value="{{ old('random_number2') }}" class="form-control" >
                                            <span class="material-input"></span></div>


                                            <div class="form-group label-floating is-empty">
                                            <label>3-cü Bölüm(Fənn) (subject3)</label>
                                            <select name="subject3" class="form-control" id="">
                                              
                                            <option  value="">Seçiniz</option>                                         
                                            <option @if( old('subject3') == "Azərbaycan_dili" ) selected @endif  value="Azərbaycan_dili">Azərbaycan dili</option>
                                            <option @if( old('subject3') == "Ədəbiyyat" ) selected @endif value="Ədəbiyyat">Ədəbiyyat</option>
                                            <option   @if( old('subject3') == "Riyaziyyat" ) selected @endif value="Riyaziyyat">Riyaziyyat</option>
                                            <option  @if( old('subject3') == "Tarix" ) selected @endif value="Tarix">Tarix</option>
                                            <option @if( old('subject3') == "Fizika" ) selected @endif value="Fizika">Fizika</option>
                                            <option @if( old('subject3') == "Biologiya" ) selected @endif value="Biologiya">Biologiya</option>
                                            <option  @if( old('subject3') == "Kimya" ) selected @endif value="Kimya">Kimya</option>
                                            <option  @if( old('subject3') == "Coğrafiya" ) selected @endif value="Coğrafiya">Coğrafiya</option>
                                            <option  @if( old('subject3') == "İngilis_dili" ) selected @endif value="İngilis_dili">İngilis dili</option>
                                                  
                                            </select>
                                            <span class="material-input"></span></div>

                                           
                                            <div class="form-group label-floating is-empty">
                                            <label>3-ci Bölüm(Fənn) Sual Sayı (random_number3)</label>
                                            <input type="text" name="random_number3" value="{{ old('random_number3') }}" class="form-control" >
                                            <span class="material-input"></span></div>


                                            <div class="form-group label-floating is-empty">
                                            <label>Quiz Qiyməti (endirimə qoyulacaqsa yüksək qiymət yazılmalıdır) (price)</label>
                                            <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="0.00"> 
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Son Quiz Qiyməti (final_price)</label>
                                            <input type="text" name="final_price" value="{{ old('final_price') }}" class="form-control" placeholder="0.00">
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                            <label>Quiz Vaxtı (Dəqiqə Yazın) (time)</label>
                                            <input type="text" name="time"  value="{{ old('time') }}"class="form-control" placeholder="90" >
                                            <span class="material-input"></span></div>

                                          

                                            <div class="form-group label-floating is-empty">
                                          <input type="hidden" name="user_id" class="form-control" value="{{auth()->user()->id}}">
                                            <span class="material-input"></span></div>

                                            <div  class="form-group label-floating is-empty">
                                            <input  id="isFinished" @if( old('finished_at')) checked @endif type="checkbox">
                                            <label>Bitiş tarixi olacaqmı? (finished_at) </label>                                       
                                            <span class="material-input"></span></div>


                                            <div id="finishedInput" @if( !old('finished_at')) style="display:none" @endif class="form-group label-floating is-empty">
                                            <label >Bitiş tarixi (finished_at)</label>
                                            <input type="datetime-local" value="{{ old('finished_at') }}" name="finished_at" class="form-control">
                                            <span class="material-input"></span></div>


                                            


                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Quiz Əlavə Et (save)</button>
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