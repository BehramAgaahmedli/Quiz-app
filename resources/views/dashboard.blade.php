<x-app-layout>
    <x-slot name="header">
  
      İstifadəçi paneli
  
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="row">
        <div class=" col-md-8 ">

        <div class="list-group">
          @foreach($quizzes as $quiz)
  <a href="{{ route('quiz.detail',$quiz['slug']) }}" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{$quiz['title']}}</h5>
      <small>@if($quiz['finished_at']) {{$quiz['finished_at']->diffForHumans()}} sonlanır @endif</small>
    </div>
    <p class="mb-1">{{Str::limit($quiz['description'],100)}}</p>
    <small>@if($quiz['subject1'] || $quiz['random_number1'] ) {{$quiz['subject1']}}  {{$quiz['random_number1']}} @endif</small>
    <small>@if($quiz['subject2'] || $quiz['random_number2'] ) {{$quiz['subject2']}}  {{$quiz['random_number2']}} @endif</small>
    <small>@if($quiz['subject3'] || $quiz['random_number3'] ) {{$quiz['subject3']}}  {{$quiz['random_number3']}} @endif</small>
  </a>
@endforeach
<div class="mt-2">
  {{ $quizzes->links() }}
</div>

</div>
</div>


<div class=" col-md-4 ">
dsd
</div>
</div>

        </div>
    </div>
</x-app-layout>
