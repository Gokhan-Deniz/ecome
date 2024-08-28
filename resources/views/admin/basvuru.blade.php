@extends('admin.layouts.template')
@section('page_title')
Siparişler - Gunship
@endsection
@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-title"><h2 class="text-center">BAŞVURULAR</h2></div><br>
            <div class="card-body">
                <table class="table">
                        <tr>
                            <th>Kullanıcı ID</th>
                            <th>Bilgi</th>
                            <th>Doğum</th>
                            <th>Sicil</th>
                            <th>Eylemler</th>
                        </tr>
                        @foreach($papers as $paper)
                            <tr>
                            <td>{{$paper->user_id}}</td>
                                <td>
                                    <ul>
                                        <li>T.C.- {{$paper->TC_No}}</li>
                                        <li>İsim- {{$paper->Ad}}  {{$paper->Soyad}}</li>
                                        <li>Adres- {{$paper->Ev}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>Doğum Yeri- {{$paper->Dogum_yeri}}</li>
                                        <li>Doğum Tarih- {{$paper->Dogum_tarih}}</li>
                                    </ul>
                                </td>
                                <td>{{$paper->Sicil}}</td>
                                <td>
                                    <a href="" class="btn btn-success">Onayla</a>
                                    <a href="" class="btn btn-warning">Reddet</a>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
