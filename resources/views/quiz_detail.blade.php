<x-app-layout>
    <x-slot name="header">
  
      {{$quiz[0]['title']}}
  
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      
        <div class="card" >
  <div class="card-body">
    <p class="card-text">
        <div class="row">
        <div class="col-md-4">

        <ul class="list-group">
            @if($quiz[0]['finished_at'])
     <li class="list-group-item d-flex justify-content-between align-items-center">
    Son Qatılım Tarixi 
   
    <span title="{{$quiz[0]['finished_at']}}" class="badge bg-secondary rounded-pill">{{$quiz[0]['finished_at']->diffForHumans()}}</span>
  </li>
  @endif
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Sual sayısı
   
    <span class="badge bg-secondary rounded-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Qatılım sayısı
   
    <span class="badge bg-secondary rounded-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Ortalama Puan
    <span class="badge bg-secondary rounded-pill">14</span>
  </li>
 
</ul>

       </div>
       <div class="col-md-8">

       {{$quiz[0]['description']}}</p><br>
    <a href="{{ route('quiz.join',['id'=>$quiz[0]['id'],'slug'=>$quiz[0]['slug'] ]) }}" class="btn btn-primary  btn-sm form-control">Quizə Qatıl</a>

       </div>
        </div>
    
 
  </div>
</div>

        </div>
    </div>
</x-app-layout>
