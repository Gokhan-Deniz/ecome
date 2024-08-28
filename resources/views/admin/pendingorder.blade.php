@extends('admin.layouts.template')
@section('page_title')
Siparişler - Gunship
@endsection
@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-title"><h2 class="text-center">SİPARİŞLER</h2></div><br>
            <div class="card-body">
                <table class="table">
                        <tr>
                            <th>Kullanıcı ID</th>
                            <th>Bilgi</th>
                            <th>Ürün ID</th>
                            <th>Sayısı</th>
                            <th>Toplam Ödeme</th>
                            <th>Durum</th>
                            <th>Eylemler</th>
                        </tr>        
                        @foreach($pending_orders as $order)
                            <tr>
                                <td>{{$order->userid}}</td>
                                <td>
                                    <ul>
                                        <li>İletişim- {{$order->Shipping_phoneNumber}}</li>
                                        <li>Şehir- {{$order->shipping_city}}</li>
                                        <li>Adres- {{$order->street_info}}</li>
                                        <li>Posta kodu- {{$order->shipping_postalcode}}</li>
                                    </ul>
                                </td>
                                <td>{{$order->product_id}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>{{$order->status}}</td>
                                <td><a href="" class="btn btn-success">Onayla</a></td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
@endsection
