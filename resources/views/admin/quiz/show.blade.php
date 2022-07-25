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
          <h5 class="my-2">
          <a href="{{route('admin.quiz.index')}}" class="btn btn-secondary btn-sm "><i class="fa fa-arrow-left" aria-hidden="true"></i> Quizlərə Dön</a>
         
          </h5>
        <div class="col-md-4">

        <ul class="list-group">
       
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
       {{$quiz['description']}}</p>
     <div class="table-responsive">
       <table class="table table-striped mt-3">
  <thead>
    <tr>
     
      <th scope="col">Ad Soyad</th>
      <th scope="col">Puan</th>
      <th scope="col">1.Doğru</th>
      <th scope="col">1.Yanlış</th>
      <th scope="col">2.Doğru</th>
      <th scope="col">2.Yanlış</th>
      <th scope="col">3.Doğru</th>
      <th scope="col">3.Yanlış</th>
      <th scope="col">Tarix</th>
      
    
    </tr>
  </thead>
  <tbody>
    @foreach($quiz->results_details as $result)
    <tr>
      <td>{{$result->user->name}}</td>
      <td>{{$result->points}}</td>
      <td>{{$result->correct1}}</td>
      <td>{{$result->wrong1}}</td>
      <td>{{$result->correct2}}</td>
      <td>{{$result->wrong2}}</td>
      <td>{{$result->correct3}}</td>
      <td>{{$result->wrong3}}</td>
      <td title="{{$result->created_at}}">{{$result->created_at->diffForHumans()}}</td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
       </div>
        </div>
    
 
  </div>
</div>

        </div>
    </div>
</x-app-layout>
