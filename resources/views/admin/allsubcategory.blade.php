@extends('admin.layouts.template')
@section('page_title')
Tüm Alt Kategoriler - Gunship
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">/</span>Tüm Alt Kategoriler</h4>
              @if(session()->has('message'))
                <div class="alert alert-succes">
                  {{ session()->get('message') }}
                </div>
              @endif
  <div class="card">
                  <h5 class="card-header">Alt Kategori Bilgileri</h5>
                  <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead class="table-light">
                        <tr>
                          <th>Id</th>
                          <th>Alt Kategori Adı</th>
                          <th>Kategori</th>
                          <th>Ürün</th>
                          <th>Aksiyomlar</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        @foreach($allsubcategories as $subcategory)
                        <tr>
                          <td>{{$subcategory->id}}</td>
                          <td>{{$subcategory->subcategory_name}}</td>
                          <td>{{$subcategory->category_name}}</td>
                          <td>{{$subcategory->product_count}}</td>
                          <td>
                            <a href="{{route('editsubcat',$subcategory->id )}}" class="btn btn-primary">Düzenle</a>
                            <a href="{{route('deletesubcat',$subcategory->id)}}" class="btn btn-warning">Sil</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
</div>
@endsection
