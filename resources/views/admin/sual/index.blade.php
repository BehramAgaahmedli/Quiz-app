@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('admin.quiz.sual.create',$quiz[0]['id'])}}" class="btn btn-success">Sual Əlavə Et</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Suallar</h4>
                            <p class="category">{{$quiz[0]['title']}} Quizinə aid suallar</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                <th><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></th>
                                    <th>Sual</th>
                                    <th>Şəkil</th>                                
                                    <th>A variantı</th>
                                    <th>B variantı</th>
                                    <th>C variantı</th>
                                    <th>D variantı</th>
                                    <th>E variantı</th>
                                    <th>Doğru cavab</th>
                                    <th>Bölüm</th>
                                    <th>Yerləşmə Tarixi</th>
                                    <th>Güncəlləmə Tarixi</th>
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
                                        <td>{{$value['question']}}</td>
                                        <td>{{$value['file']}}</td>                                      
                                        <td>{{$value['answer1']}}</td>
                                        <td>{{$value['answer2']}} Azn</td>
                                        <td>{{$value['answer3']}} Azn</td>
                                        <td>{{$value['answer4']}}</td>
                                        <td>{{$value['answer5']}}</td>
                                        <td class="text-success">{{substr($value['correct_answer'],-1)}} . cavab</td>
                                        <td>{{$value['Subject']}}</td>
                                        <td>{{$value['created_at']}}</td>
                                        <td>{{$value['updated_at']}}</td>                             
                                        <td><a href="{{route('admin.quiz.edit',['id'=>$value['id']])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                        <td><a href="{{route('admin.quiz.delete',['id'=>$value['id']])}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{$data->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection