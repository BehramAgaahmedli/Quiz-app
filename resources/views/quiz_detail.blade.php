<x-app-layout>
    <x-slot name="header">
  
      {{$quiz['title']}}
  
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               @if(session("status"))
                        <div class="alert alert-primary" role="alert">
                        <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> {{session("status")}}
                          
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
            @if($quiz['finished_at'])
     <li class="list-group-item d-flex justify-content-between align-items-center">
    Son Qatılım Tarixi 
   
    <span title="{{$quiz['finished_at']}}" class="badge bg-secondary rounded-pill">{{$quiz['finished_at']->diffForHumans()}}</span>
  </li>
  @endif

  <li class="list-group-item d-flex justify-content-between align-items-center">
    Kateqoriya
   
    <span class="badge bg-warning rounded-pill">
      
    @foreach($ustimtahanlars as  $ust)
     <?php
       if($quiz['ustimtahan_id']==$ust->id):

       
     echo $ust->name ;
    endif;
     
    ?>
    @endforeach




    @foreach($altimtahanlars as  $alt)
     <?php
       if($quiz['ustimtahan_id']==$alt->id):

       
     echo '('.$alt->name.')' ;
    endif;
     
    ?>
    @endforeach
    
    </span>
  </li>





  @if($quiz['subject1'] || $quiz['random_number1'])
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Sual sayısı
   
    <span class="badge bg-primary rounded-pill">{{ $quiz['subject1'] }} ({{ $quiz['random_number1'] }})</span>
  </li>
  @endif
  @if($quiz['subject2'] || $quiz['random_number2'])
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Sual sayısı
   
    <span class="badge bg-danger rounded-pill">{{ $quiz['subject2'] }} ({{ $quiz['random_number2'] }})</span>
  </li>
  @endif
  @if($quiz['subject3'] || $quiz['random_number3'])
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Sual sayısı
   
    <span class="badge bg-success rounded-pill">{{ $quiz['subject3'] }} ({{ $quiz['random_number3'] }})</span>
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
       <form action="{{ route('quiz.join') }}" method="POST">
       {{csrf_field()}}
       <input type="hidden" name="quiz_id" value="{{$quiz['id']}}">
       <button type="submit" class="bg-primary  btn-sm form-control text-white"  >Quizə Qatıl</button>
      </form>
       </div>
        </div>
    
       
  </div>
</div>

        </div>
    </div>
</x-app-layout>
