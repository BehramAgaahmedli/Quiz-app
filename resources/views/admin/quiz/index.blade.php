@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                <div class="col-md-3">
                    <a href="{{route('admin.quiz.create')}}" class="btn btn-success ">Quiz Əlavə Et</a>
                    </div>
                <form method="GET" action="">
                <div class="form-row">
                <div class="col-md-3">
                   <input type="text" name="title" value="{{request()->get('title')}}" class="form-control" placeholder="Quiz Adı" >
                    </div>
                    <div class="col-md-3">
                   <select class="form-control" onchange="this.form.submit()" name="status">
                    <option value="" >Durum Seçiniz</option>
                    <option @if(request()->get('status')=='publish') selected @endif value="publish" >Aktif</option>
                    <option  @if(request()->get('status')=='passive') selected @endif value="passive">Passif</option>
                    <option  @if(request()->get('status')=='draft') selected @endif value="draft">Taslak</option>
                   </select>
                    </div>
                    @if(request()->get('title') || request()->get('status'))
                    <div class="col-md-3">
                   <a href="{{route('admin.quiz.index')}}" class="btn btn-secondary ">Sıfırla</a>
                    </div>
                  @endif
                </div>
                </form>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Quizlər ({{$countdata}})</h4>
                            <p class="category">Burada əlavə olunan Quizlərin listesini bulabilirsiniz.</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                    <th><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></th>
                                    <th>Ad</th>
                                    <th>Açıqlama</th>
                                    <th>status</th>
                                    <th>qiymət</th>
                                    <th>son qiymət</th>
                                    <th>Vaxt</th>
                                    <th>Rasgele sual</th>
                                    <th>giriş</th>
                                    <th>Yerləşmə Tarixi</th>
                                    <th>Güncəlləmə Tarixi</th>
                                    <th>Bitiş tarixi</th>
                                    <th><i class="fa fa-question" aria-hidden="true"></i></th>
                                    <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
                                    <th><i class="fa fa-trash-o" aria-hidden="true"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sayi=0;?> 
                                @foreach($data  as $key => $value)
                              
                                <?php $sayi++ ?> 
                                    <tr>
                                        <td> {{$sayi}} </td>
                                        <td> {{$value['title']}}</td>
                                        <td>{{$value['description']}}</td>                                      
                                        <td>@switch($value['status'])
                                            @case('publish')
                                            <span class="badge badge-success">Aktiv</span>
                                            @break
                                            @case('draft')
                                            <span class="badge badge-success">Taslak</span>
                                            @break
                                            @case('passive')
                                            <span class="badge badge-danger ">Passif</span>
                                            @break
                                            @endswitch
                                        </td>
                                        <td>{{$value['price']}} Azn</td>
                                        <td>{{$value['final_price']}} Azn</td>
                                        <td>{{$value['time']}}</td>
                                        <td>{{$value['random_number']}}</td>
                                        <td>{{$value['views']}}</td>
                                        <td>@if($value['created_at'])
                                        <span title="{{$value['created_at']}}">{{$value['created_at']->diffForHumans()}}</span>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>@if($value['updated_at'])
                                        <span title="{{$value['updated_at']}}">{{$value['updated_at']->diffForHumans()}}</span>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>@if($value['finished_at'])
                                           <span title="{{$value['finished_at']}}"> {{$value['finished_at']->diffForHumans()}}</span>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td><a href="{{route('admin.quiz.sual.index',['id'=>$value['id']])}}"><i class="fa fa-question" aria-hidden="true"></i></a></td>
                                        <td><a href="{{route('admin.quiz.edit',['id'=>$value['id']])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                        <td><a href="{{route('admin.quiz.delete',['id'=>$value['id']])}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{$data->withQueryString()->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection