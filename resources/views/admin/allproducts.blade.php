@extends('admin.layouts.template')
@section('page_title')
Tüm Ürünler - Gunship
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">/</span>Tüm Ürünler</h4>
              @if(session()->has('message'))
                <div class="alert alert-succes">
                  {{ session()->get('message') }}
                </div>
              @endif
  <div class="card">
                  <h5 class="card-header">Ürün Bilgileri</h5>
                  <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead class="table-light">
                        <tr>
                          <th>Id</th>
                          <th>Ürün Adı</th>
                          <!--<th>Fotoğraf</th>-->
                          <th>Fiyat</th>
                          <th>Aksiyomlar</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        @foreach($products as $product)
                        <tr>
                          <td>{{$product->id}}</td>
                          <td>{{$product->product_name}}</td>
                          <!--<td>
                            <img style="height:1000px;" src="{{asset($product->product_img)}}" alt=""><br>
                          </td>-->
                          <td>{{$product->price}}</td>
                          <td>
                            <a href="{{route('editproduct', $product->id)}}" class="btn btn-primary">Düzenle</a>
                            <a href="{{route('deleteproduct', $product->id)}}" class="btn btn-warning">Sil</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
</div>
@endsection
