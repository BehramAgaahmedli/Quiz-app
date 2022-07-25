<x-app-layout>
    <x-slot name="header">
  
      {{$quiz->title}} Cavabı
     
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      
        <div class="card" >
  <div class="card-body">
    <h3>Puan : <strong>{{$quiz->my_result->points}}</strong></h3> 
   <div class="alert alert-secondary">
   <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> İşarətlədiyin Variant  <br>
   <i class="fa fa-check text-success" aria-hidden="true" ></i> Doğru Variant <br>
   <i class="fa fa-times text-danger" aria-hidden="true" ></i> Yanlış Cavab
</div>
<strong><h3 class="text-center text-primary">{{$quiz->subject1}}</h3></strong>
      <?php $sayi=0; ?>
     @foreach($questions1 as  $question)
     
     @if($question->my_answer->answer)
     
     @if($question->correct_answer == $question->my_answer->answer)
    <i class="fa fa-check text-success" aria-hidden="true" ></i>
    
    
    @else
    <i class="fa fa-times text-danger" aria-hidden="true" ></i> 
     @endif
     <?php $sayi+=1 ;?>
     <strong># <?php echo $sayi; // {{$loop->iteration}}?></strong> {{$question->question}}
     <br>
     <smal>Bu suala <strong>{{$question->true_percent}}%</strong> doğru cavab verilib. </smal>
@if($question['image'])
<img src="{{ asset($question['image'] )}}" style="width: 50%" class="img-responsive" ><br>
@endif
<br>
@if($question['video'])
  
                        <section>
                                 <video controls="controls" controls loop controlslist="nodownload " style="width: 50%" >
                                    <source src="{{ asset($question['video'] )}}"   />                 
                                    </video>
                          </section>                    
                                    
<br>
@endif

@if($question['audio'])
  
     <section>
    <audio controls="controls" preload="none"  style="width: 400px;">
    <source src="{{ asset($question['audio'] )}}"  />   
  </audio>                  
</section>                          
<br>
@endif


<div class="form-check mt-2">
   @if('answer1' == $question['correct_answer'])
   <i class="fa fa-check text-success" aria-hidden="true" ></i>
     @elseif('answer1' == $question->my_answer->answer )
     <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
     @endif

   

  <label class="form-check-label" for="quiz{{$question['id']}}1">
  {{$question['answer1']}}
  </label>
</div>

<div class="form-check">
@if('answer2' == $question['correct_answer'])
   <i class="fa fa-check text-success" aria-hidden="true" ></i>
   @elseif('answer2' == $question->my_answer->answer )
   <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
     @endif
  
  <label class="form-check-label" for="quiz{{$question['id']}}2">
  {{$question['answer2']}}
  </label>
</div>

<div class="form-check">
@if('answer3' == $question['correct_answer'])
   <i class="fa fa-check text-success" aria-hidden="true" ></i>
   @elseif('answer3' == $question->my_answer->answer )
   <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
     @endif
  <label class="form-check-label" for="quiz{{$question['id']}}3">
  {{$question['answer3']}}
  </label>
</div>

<div class="form-check">
  @if('answer4' == $question['correct_answer'])
   <i class="fa fa-check text-success" aria-hidden="true" ></i>
   @elseif('answer4' == $question->my_answer->answer )
   <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
     @endif
  <label class="form-check-label" for="quiz{{$question['id']}}4">
  {{$question['answer4']}}
  </label>
</div>

<div class="form-check">
 @if('answer5' == $question['correct_answer'])
   <i class="fa fa-check text-success" aria-hidden="true" ></i>
   @elseif('answer5' == $question->my_answer->answer )
   <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
  @endif
  <label class="form-check-label" for="quiz{{$question['id']}}5">
  {{$question['answer5']}}
  </label>
 
</div>


    <hr>
   @endif
  
     @endforeach
    
  <?php //-----------------------------------------------------------------------------?>
  <strong><h3 class="text-center text-primary">{{$quiz->subject2}}</h3></strong>
  <?php $sayi=0; ?>
     @foreach($questions2 as  $question)
     
     @if($question->my_answer->answer)
     
     @if($question->correct_answer == $question->my_answer->answer)
    <i class="fa fa-check text-success" aria-hidden="true" ></i>
    
    
    @else
    <i class="fa fa-times text-danger" aria-hidden="true" ></i> 
     @endif
     <?php $sayi+=1 ;?>
     <strong># <?php echo $sayi; // {{$loop->iteration}}?></strong> {{$question->question}}
     <br>
     <smal>Bu suala <strong>{{$question->true_percent}}%</strong> doğru cavab verilib. </smal>
@if($question['image'])
<img src="{{ asset($question['image'] )}}" style="width: 50%" class="img-responsive" ><br>
@endif
<br>
@if($question['video'])
  
                        <section>
                                 <video controls="controls" controls loop controlslist="nodownload " style="width: 50%" >
                                    <source src="{{ asset($question['video'] )}}"   />                 
                                    </video>
                          </section>                    
                                    
<br>
@endif

@if($question['audio'])
  
     <section>
    <audio controls="controls" preload="none"  style="width: 400px;">
    <source src="{{ asset($question['audio'] )}}"  />   
  </audio>                  
</section>                          
<br>
@endif


<div class="form-check mt-2">
   @if('answer1' == $question['correct_answer'])
   <i class="fa fa-check text-success" aria-hidden="true" ></i>
     @elseif('answer1' == $question->my_answer->answer )
     <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
     @endif

   

  <label class="form-check-label" for="quiz{{$question['id']}}1">
  {{$question['answer1']}}
  </label>
</div>

<div class="form-check">
@if('answer2' == $question['correct_answer'])
   <i class="fa fa-check text-success" aria-hidden="true" ></i>
   @elseif('answer2' == $question->my_answer->answer )
   <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
     @endif
  
  <label class="form-check-label" for="quiz{{$question['id']}}2">
  {{$question['answer2']}}
  </label>
</div>

<div class="form-check">
@if('answer3' == $question['correct_answer'])
   <i class="fa fa-check text-success" aria-hidden="true" ></i>
   @elseif('answer3' == $question->my_answer->answer )
   <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
     @endif
  <label class="form-check-label" for="quiz{{$question['id']}}3">
  {{$question['answer3']}}
  </label>
</div>

<div class="form-check">
  @if('answer4' == $question['correct_answer'])
   <i class="fa fa-check text-success" aria-hidden="true" ></i>
   @elseif('answer4' == $question->my_answer->answer )
   <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
     @endif
  <label class="form-check-label" for="quiz{{$question['id']}}4">
  {{$question['answer4']}}
  </label>
</div>

<div class="form-check">
 @if('answer5' == $question['correct_answer'])
   <i class="fa fa-check text-success" aria-hidden="true" ></i>
   @elseif('answer5' == $question->my_answer->answer )
   <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
  @endif
  <label class="form-check-label" for="quiz{{$question['id']}}5">
  {{$question['answer5']}}
  </label>
 
</div>


   
   <hr>
   
   @endif
  
     @endforeach




     <?php //-----------------------------------------------------------------------------?>
     <strong><h3 class="text-center text-primary">{{$quiz->subject3}}</h3></strong>
    <?php $sayi=0; ?>
       @foreach($questions3 as  $question)
      
       @if($question->my_answer->answer)
       
       @if($question->correct_answer == $question->my_answer->answer)
      <i class="fa fa-check text-success" aria-hidden="true" ></i>
      
      
      @else
      <i class="fa fa-times text-danger" aria-hidden="true" ></i> 
       @endif
       <?php $sayi+=1 ;?>
       <strong># <?php echo $sayi; // {{$loop->iteration}}?></strong> {{$question->question}}
       <br>
     <smal>Bu suala <strong>{{$question->true_percent}}%</strong> doğru cavab verilib. </smal>
  @if($question['image'])
  <img src="{{ asset($question['image'] )}}" style="width: 50%" class="img-responsive" ><br>
  @endif
  <br>
  @if($question['video'])
    
                          <section>
                                   <video controls="controls" controls loop controlslist="nodownload " style="width: 50%" >
                                      <source src="{{ asset($question['video'] )}}"   />                 
                                      </video>
                            </section>                    
                                      
  <br>
  @endif
  
  @if($question['audio'])
    
       <section>
      <audio controls="controls" preload="none"  style="width: 400px;">
      <source src="{{ asset($question['audio'] )}}"  />   
    </audio>                  
  </section>                          
  <br>
  @endif
  
  
  <div class="form-check mt-2">
     @if('answer1' == $question['correct_answer'])
     <i class="fa fa-check text-success" aria-hidden="true" ></i>
       @elseif('answer1' == $question->my_answer->answer )
       <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
       @endif
  
     
  
    <label class="form-check-label" for="quiz{{$question['id']}}1">
    {{$question['answer1']}}
    </label>
  </div>
  
  <div class="form-check">
  @if('answer2' == $question['correct_answer'])
     <i class="fa fa-check text-success" aria-hidden="true" ></i>
     @elseif('answer2' == $question->my_answer->answer )
     <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
       @endif
    
    <label class="form-check-label" for="quiz{{$question['id']}}2">
    {{$question['answer2']}}
    </label>
  </div>
  
  <div class="form-check">
  @if('answer3' == $question['correct_answer'])
     <i class="fa fa-check text-success" aria-hidden="true" ></i>
     @elseif('answer3' == $question->my_answer->answer )
     <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
       @endif
    <label class="form-check-label" for="quiz{{$question['id']}}3">
    {{$question['answer3']}}
    </label>
  </div>
  
  <div class="form-check">
    @if('answer4' == $question['correct_answer'])
     <i class="fa fa-check text-success" aria-hidden="true" ></i>
     @elseif('answer4' == $question->my_answer->answer )
     <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
       @endif
    <label class="form-check-label" for="quiz{{$question['id']}}4">
    {{$question['answer4']}}
    </label>
  </div>
  
  <div class="form-check">
   @if('answer5' == $question['correct_answer'])
     <i class="fa fa-check text-success" aria-hidden="true" ></i>
     @elseif('answer5' == $question->my_answer->answer )
     <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
    @endif
    <label class="form-check-label" for="quiz{{$question['id']}}5">
    {{$question['answer5']}}
    </label>
   
  </div>
  
  
     @if(!$loop->last)
     <hr>
     @endif
     @endif
    
       @endforeach
  
  





  </div>
</div>


        </div>
    </div>
</x-app-layout>
