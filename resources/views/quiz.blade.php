<x-app-layout>
    <x-slot name="header">
  
      {{$quiz[0]['title']}}
  
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      
        <div class="card" >
  <div class="card-body">
  <strong><h3 class="text-center text-primary">{{$quiz[0]['subject1']}}</h3></strong>
      <form method="POST" action="{{ route('quiz.result',['id'=>$quiz[0]['id'],'slug'=>$quiz[0]['slug']]) }}" >
        @csrf
     @foreach($questions as $key=> $question)
     <strong>#{{$loop->iteration}}</strong> {{$question['question']}}

@if($question['image'])
<img src="{{ asset($question['image'] )}}" style="width: 50%" class="img-responsive" ><br>
@endif
<br>
@if($question['video'])
  
                        <section>
                                 <video controls="controls" controls loop controlslist="nodownload" style="width: 50%" >
                                    <source src="{{ asset($question['video'] )}}"   />                 
                                    </video>
                          </section>                    
                                    
<br>
@endif

@if($question['audio'])
  
     <section>
    <audio controls="controls" controls loop controlslist="nodownload" preload="none"  style="width: 50%">
    <source src="{{ asset($question['audio'] )}}"  />   
  </audio>                  
</section>                          

@endif


<br>
     <div class="form-check mt-2">
  <input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}1" value="answer1" required >
  <label class="form-check-label" for="quiz{{$question['id']}}1">
  {{$question['answer1']}}
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}2" value="answer2"  required>
  <label class="form-check-label" for="quiz{{$question['id']}}2">
  {{$question['answer2']}}
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}3" value="answer3"  required>
  <label class="form-check-label" for="quiz{{$question['id']}}3">
  {{$question['answer3']}}
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}4" value="answer4"  required>
  <label class="form-check-label" for="quiz{{$question['id']}}4">
  {{$question['answer4']}}
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}5" value="answer5"  required>
  <label class="form-check-label" for="quiz{{$question['id']}}5">
  {{$question['answer5']}}
  </label>
</div>
<input  type="hidden" name="{{$question['id']}}"  value="{{$question['id']}}"  >

   {{--@if(!$loop->last)--}}
   <hr>
   {{--@endif--}}
     @endforeach



    <?php  //----------------------------------------------------------------------?>




    <strong><h3 class="text-center text-primary">{{$quiz[0]['subject2']}}</h3></strong>
    @foreach($questions2 as $key=> $question)
     <strong>#{{$loop->iteration}}</strong> {{$question['question']}}

@if($question['image'])
<img src="{{ asset($question['image'] )}}" style="width: 50%" class="img-responsive" ><br>
@endif
<br>
@if($question['video'])
  
                        <section>
                                 <video controls="controls" controls loop controlslist="nodownload" style="width: 50%" >
                                    <source src="{{ asset($question['video'] )}}"   />                 
                                    </video>
                          </section>                    
                                    
<br>
@endif

@if($question['audio'])
  
     <section>
    <audio controls="controls" controls loop controlslist="nodownload" preload="none"  style="width: 50%">
    <source src="{{ asset($question['audio'] )}}"  />   
  </audio>                  
</section>                          

@endif


<br>
     <div class="form-check mt-2">
  <input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}1" value="answer1" required >
  <label class="form-check-label" for="quiz{{$question['id']}}1">
  {{$question['answer1']}}
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}2" value="answer2"  required>
  <label class="form-check-label" for="quiz{{$question['id']}}2">
  {{$question['answer2']}}
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}3" value="answer3"  required>
  <label class="form-check-label" for="quiz{{$question['id']}}3">
  {{$question['answer3']}}
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}4" value="answer4"  required>
  <label class="form-check-label" for="quiz{{$question['id']}}4">
  {{$question['answer4']}}
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}5" value="answer5"  required>
  <label class="form-check-label" for="quiz{{$question['id']}}5">
  {{$question['answer5']}}
  </label>
</div>
<input  type="hidden" name="{{$question['id']}}"  value="{{$question['id']}}"  >

   {{--@if(!$loop->last)--}}
   <hr>
   {{--@endif--}}
     @endforeach



     <?php  //----------------------------------------------------------------------?>




<strong><h3 class="text-center text-primary">{{$quiz[0]['subject3']}}</h3></strong>
@foreach($questions3 as $key=> $question)
 <strong>#{{$loop->iteration}}</strong> {{$question['question']}}

@if($question['image'])
<img src="{{ asset($question['image'] )}}" style="width: 50%" class="img-responsive" ><br>
@endif
<br>
@if($question['video'])

                    <section>
                             <video controls="controls" controls loop controlslist="nodownload" style="width: 50%" >
                                <source src="{{ asset($question['video'] )}}"   />                 
                                </video>
                      </section>                    
                                
<br>
@endif

@if($question['audio'])

 <section>
<audio controls="controls" controls loop controlslist="nodownload" preload="none"  style="width: 50%">
<source src="{{ asset($question['audio'] )}}"  />   
</audio>                  
</section>                          

@endif


<br>
 <div class="form-check mt-2">
<input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}1" value="answer1" required >
<label class="form-check-label" for="quiz{{$question['id']}}1">
{{$question['answer1']}}
</label>
</div>

<div class="form-check">
<input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}2" value="answer2"  required>
<label class="form-check-label" for="quiz{{$question['id']}}2">
{{$question['answer2']}}
</label>
</div>

<div class="form-check">
<input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}3" value="answer3"  required>
<label class="form-check-label" for="quiz{{$question['id']}}3">
{{$question['answer3']}}
</label>
</div>

<div class="form-check">
<input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}4" value="answer4"  required>
<label class="form-check-label" for="quiz{{$question['id']}}4">
{{$question['answer4']}}
</label>
</div>

<div class="form-check">
<input class="form-check-input" type="radio" name="answer{{$question['id']}}" id="quiz{{$question['id']}}5" value="answer5"  required>
<label class="form-check-label" for="quiz{{$question['id']}}5">
{{$question['answer5']}}
</label>
</div>
<input  type="hidden" name="{{$question['id']}}"  value="{{$question['id']}}"  >

{{--@if(!$loop->last)--}}
<hr>
{{--@endif--}}

 @endforeach
 


















     <br>
   <button  class="btn btn-success bg-success btn-sm form-control " type="submit">Quizi Bitir</button>
</form>
  
    
 
  </div>
</div>


        </div>
    </div>
</x-app-layout>
