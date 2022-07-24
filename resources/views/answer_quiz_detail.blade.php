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
 
  <li class="list-group-item d-flex justify-content-between align-items-center">
     Doğru sayısı / Yanlış sayısı

   <div class="float-right">
   <span  class="badge bg-success rounded-pill">{{ $quiz->my_result->correct }} Doğru </span>
   <span  class="badge bg-danger rounded-pill">{{ $quiz->my_result->wrong }} Yanlış</span>
   </div>
    
  </li>
  @endif
            @if($quiz['finished_at'])
     <li class="list-group-item d-flex justify-content-between align-items-center">
    Son Qatılım Tarixi 
   
    <span title="{{$quiz['finished_at']}}" class="badge bg-secondary rounded-pill">{{$quiz['finished_at']->diffForHumans()}}</span>
  </li>
  @endif
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Sual sayısı
   
    <span class="badge bg-secondary rounded-pill">{{ count($quiz->questions) }}</span>
  </li>
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
