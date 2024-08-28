@extends('admin.layouts.template')
@section('page_title')
Tüm Kategoriler - Gunship
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">/</span>Tüm Kategoriler</h4>
  <div class="card">
                  <h5 class="card-header">Kategori Bilgileri</h5>
                  @if(session()->has('message'))
                    <div class="alert alert-succes">
                      {{ session()->get('message') }}
                    </div>
                  @endif
                  <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead class="table-light">
                        <tr>
                          <th>Id</th>
                          <th>Kategori Adı</th>
                          <th>Alt Kategori</th>
                          <th>Açıklama</th>
                          <th>Aksiyomalar</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        @foreach($categories as $category)

                        <tr>
                          <td>{{ $category->id }}</td>
                          <td>{{ $category->category_name }}</td>
                          <td>{{ $category->subcategory_count }}</td>
                          <td>{{ $category->slug }}</td>
                          <td>
                            <a href="{{ route('editcategory', $category->id) }}" class="btn btn-primary">Düzenle</a>
                            <a href="{{ route('deletecategory', $category->id) }}" class="btn btn-warning">Sil</a>
                          </td>
                        </tr>

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
</div>
@endsection
