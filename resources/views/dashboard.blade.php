<x-app-layout>
    <x-slot name="header">
    
      İstifadəçi paneli 
    
     
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="GET" action="">

        <div class="row">
       <div class=" col-md-12 ">

                <div class="form-row">
                <div class="col-md-3">
                   <input type="text" name="title" value="{{request()->get('title')}}" class="form-control" placeholder="Quiz Adı" >
                    </div>
                    <div class="col-md-3">
                   <select class="form-control" onchange="this.form.submit()" name="status">
                    <option value="" >Durum Seçiniz</option>
                    <option @if(request()->get('status')=='0.00') selected @endif value="0.00" >Ödənişsiz</option>
                  
                  
                   </select>
                    </div>
                    @if(request()->get('title') || request()->get('status'))
                    <div class="col-md-3">
                   <a href="{{route('dashboard')}}" class="btn btn-secondary ">Sıfırla</a>
                    </div>
                  @endif
                </div>
                </form>
            </div>
           </div>


<br>

        <div class="row">


    
        <div class=" col-md-8 ">

        <div class="list-group">
          @foreach($quizzes as  $quiz)
          <a href="{{ route('quiz.detail',['id'=>$quiz['id'],'slug'=>$quiz['slug']]) }}" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1 text-info" >{{$quiz['title']}}</h5>
      <small class="text-danger">@if($quiz['finished_at']) {{$quiz['finished_at']->diffForHumans()}} sonlanır @endif</small>
    </div>
    <p class="mb-1 text-primary">{{Str::limit($quiz['description'],100)}}</p>
    @if($quiz['price'])
    <p class="mb-1 text-danger"> 
    Kateqoriya : <span class="text-danger">
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
    </p>
    
      <p class="mb-1 text-success"> 
    Əvvəlki  qiymət <span class="text-success">{{$quiz['price']}} Azn </span>
    
    </p>
    @endif
    @if($quiz['final_price']==0.00)
   <p class="mb-1 text-danger">pulsuz</p>
 
      @else 
      <p class="mb-1 text-success"> 
      Qiyməti <span class="text-success">{{$quiz['final_price']}} Azn</span>
    
    </p>
    @endif
    <small class="text-primary">@if($quiz['subject1'] || $quiz['random_number1'] ) {{$quiz['subject1']}}  {{$quiz['random_number1']}} @endif</small>
    <small class="text-danger">@if($quiz['subject2'] || $quiz['random_number2'] ) {{$quiz['subject2']}}  {{$quiz['random_number2']}} @endif</small>
    <small class="text-success">@if($quiz['subject3'] || $quiz['random_number3'] ) {{$quiz['subject3']}}  {{$quiz['random_number3']}} @endif</small>
  </a>
@endforeach
<div class="mt-2">
{{ $quizzes->withQueryString()->links() }}
</div>

</div>
</div>


           <div class=" col-md-4 ">
         sdsd
</div>
</div>

        </div>
    </div>
</x-app-layout>











