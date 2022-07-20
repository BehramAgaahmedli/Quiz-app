@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('admin.quiz.create')}}" class="btn btn-success">Quiz Əlavə Et</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Quizlər</h4>
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
                                        <td>{{$value['status']}}</td>
                                        <td>{{$value['price']}} Azn</td>
                                        <td>{{$value['final_price']}} Azn</td>
                                        <td>{{$value['time']}}</td>
                                        <td>{{$value['views']}}</td>
                                        <td>{{$value['created_at']}}</td>
                                        <td>{{$value['updated_at']}}</td>
                                        <td>{{$value['finished_at']}}</td>
                                        <td><a href="{{route('admin.quiz.sual.index',['id'=>$value['id']])}}"><i class="fa fa-question" aria-hidden="true"></i></a></td>
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