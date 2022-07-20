@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('admin.ustimtahanlar.create')}}" class="btn btn-success">Yeni Kategori Əlavə Et</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Üst İmtahan Kategoriləri</h4>
                            <p class="category">Burada əlavə olunan Kategorilərin listesini bulabilirsiniz.</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                    <th>ad</th>
                                    <th>Yerləşmə Tarixi</th>
                                    <th>Güncəlləmə Tarixi</th>
                                    <th>Düzənlə</th>
                                    <th>Sil</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data  as $key => $value)
                                    <tr>
                                        <td>{{$value['name']}}</td>
                                        <td>
                                           @if($value['created_at'])
                                        <span title="{{$value['created_at']}}">{{$value['created_at']->diffForHumans()}}</span>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                        @if($value['updated_at'])
                                        <span title="{{$value['created_at']}}">{{$value['created_at']->diffForHumans()}}</span>
                                            @else
                                            -
                                            @endif
                                        </td>      
                                        <td><a href="{{route('admin.ustimtahanlar.edit',['id'=>$value['id']])}}">Düzənlə</a></td>
                                        <td><a href="{{route('admin.ustimtahanlar.delete',['id'=>$value['id']])}}">Sil</a></td>
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