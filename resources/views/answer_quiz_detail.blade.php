<x-app-layout>
    <x-slot name="header">
  
      {{$quiz['title']}}
      
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               @if(session("status"))
                        <div class="alert alert-primary" role="alert">
                        <i class="fa fa-check text-success" aria-hidden="true" ></i>  {{session("status")}}
                          
                        </div>
                    @endif
        <div class="card" >
  <div class="card-body">
    <p class="card-text">
        <div class="row">
        <div class="col-md-4">

        <ul class="list-group">
        @if($quiz->my_rank )
        <li class="list-group-item d-flex justify-content-between align-items-center">
     Sıralama
    
    <span  class="badge bg-success rounded-pill">#{{ $quiz->my_rank }}</span>
  </li>

  @endif


        @if($quiz->my_result )
        <li class="list-group-item d-flex justify-content-between align-items-center">
     Puan
    
    <span  class="badge bg-primary rounded-pill">{{ $quiz->my_result->points }}</span>
  </li>
 
   @if( $quiz->my_result->correct1 || $quiz->my_result->wrong1 )
  <li class="list-group-item d-flex justify-content-between align-items-center">
  @if( $quiz['subject1'] )
  {{ $quiz['subject1'] }}
  @else
  Doğru / Yanlış
  @endif 
   <div class="float-right">
   <span  class="badge bg-success rounded-pill">{{ $quiz->my_result->correct1 }} Doğru </span>
   <span  class="badge bg-danger rounded-pill">{{ $quiz->my_result->wrong1 }} Yanlış</span>
   </div>
    
  </li>
  @endif
  @if( $quiz->my_result->correct2 || $quiz->my_result->wrong2 )
  <li class="list-group-item d-flex justify-content-between align-items-center">
  @if( $quiz['subject2'] )
  {{ $quiz['subject2'] }}
  @else
  Doğru / Yanlış
  @endif

   <div class="float-right">
   <span  class="badge bg-success rounded-pill">{{ $quiz->my_result->correct2 }} Doğru </span>
   <span  class="badge bg-danger rounded-pill">{{ $quiz->my_result->wrong2 }} Yanlış</span>
   </div>
    
  </li>
  @endif
  @if( $quiz->my_result->correct3 || $quiz->my_result->wrong3 )
  <li class="list-group-item d-flex justify-content-between align-items-center">
  @if( $quiz['subject3'] )
  {{ $quiz['subject3'] }}
  @else
  Doğru / Yanlış
  @endif

   <div class="float-right">
   <span  class="badge bg-success rounded-pill">{{ $quiz->my_result->correct3 }} Doğru </span>
   <span  class="badge bg-danger rounded-pill">{{ $quiz->my_result->wrong3 }} Yanlış</span>
   </div>
    
  </li>
  @endif
  @endif
            @if($quiz['finished_at'])
     <li class="list-group-item d-flex justify-content-between align-items-center">
    Son Qatılım Tarixi 
   
    <span title="{{$quiz['finished_at']}}" class="badge bg-secondary rounded-pill">{{$quiz['finished_at']->diffForHumans()}}</span>
  </li>
  @endif
  @if($quiz['subject1'] || $quiz['random_number1'])
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Sual sayısı
   
    <span class="badge bg-secondary rounded-pill">{{ $quiz['subject1'] }} ({{ $quiz['random_number1'] }})</span>
  </li>
  @endif
  @if($quiz['subject2'] || $quiz['random_number2'])
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Sual sayısı
   
    <span class="badge bg-secondary rounded-pill">{{ $quiz['subject2'] }} ({{ $quiz['random_number2'] }})</span>
  </li>
  @endif
  @if($quiz['subject3'] || $quiz['random_number3'])
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Sual sayısı
   
    <span class="badge bg-secondary rounded-pill">{{ $quiz['subject3'] }} ({{ $quiz['random_number3'] }})</span>
  </li>
  @endif
  @if($quiz['time'])
  <li class="list-group-item d-flex justify-content-between align-items-center">
    İmtahan Vaxtı
   
    <span class="badge bg-info rounded-pill">{{ $quiz['time'] }} dəqiqə</span>
  </li>
  @endif
  @if($quiz->details!== null )
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Qatılım sayısı
   
    <span class="badge bg-warning rounded-pill">{{ $quiz->details['join_count'] }}</span>
  </li>
  
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Ortalama Puan
    <span class="badge bg-black rounded-pill">{{ $quiz->details['average'] }}</span>
  </li>
  @endif

  @if($quiz['price'])
  
 
  <li class="list-group-item d-flex justify-content-between align-items-center">
Əvvəlki  qiymət <span class="badge bg-primary rounded-pill">{{$quiz['price']}} Azn </span>

</li>
@endif
@if($quiz['final_price']==0.00)
<li class="list-group-item d-flex justify-content-between align-items-center"> Qiyməti
<span class="badge bg-danger rounded-pill">pulsuz</span></li>

  @else 
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Qiyməti <span class="badge bg-success rounded-pill">{{$quiz['final_price']}} Azn</span>

</li>
@endif



</ul>
      <div class="card mt-3">
      <div class="card-body">
         <h5 class="card-title">İlk 10</h5>
         <ul class="list-group">
         
           @foreach($quiz->topTen as  $result )
           <li class="list-group-item d-flex justify-content-between align-items-center">
         <strong class="h5">{{$loop->iteration}}</strong>
         @if($result->user)
         <img class="w-8 h-8 rounded-full" src="{{$result->user->profile_photo_url}}">
         <span @if(auth()->user()->id == $result->user_id)  class="text-danger" @endif >{{ $result->user->name}}</span>
         @else
          Anonim
          @endif
         <span class="badge bg-success rounded-pill">{{ $result->points }}</span>
           </li>
           @endforeach
         
        </ul>
      </div>
      </div>
      
       </div>
       <div class="col-md-8">

       {{$quiz['description']}}</p><br>
       @if($quiz->my_result)
       <a href="{{ route('quiz.answer',['id'=>$quiz['id'],'slug'=>$quiz['slug'] ]) }}" class="btn btn-warning  btn-sm form-control">Quizi Görüntülə</a>
       @else
    <a href="{{ route('quiz.join',['id'=>$quiz['id'],'slug'=>$quiz['slug'] ]) }}" class="btn btn-primary  btn-sm form-control">Quizə Qatıl</a>
        @endif
       </div>
        </div>
    
 
  </div>
</div>

        </div>
    </div>
</x-app-layout>
