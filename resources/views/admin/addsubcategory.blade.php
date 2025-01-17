@extends('admin.layouts.template')
@section('page_title')
Alt Kategori Ekle - Gunship
@endsection
@section('content')
<!--Layout-->
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">/</span>Alt Kategori Ekleme</h4>
  <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Yeni Alt Kategori Ekle</h5>
                    <small class="text-muted float-end">Bilgi veriniz</small>
                  </div>
                  <div class="card-body">
                    <form action="{{route('storesubcategory')}}" method="POST">
                      @csrf
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Alt Kategori Adı</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Silahlar...." />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Kategori Seç</label>
                        <div class="col-sm-10">
                          <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                          <option selected>Kategorileri açabilirsiniz</option>
                          @foreach($categories as $category)
                          <option value="{{ $category->id}}">{{$category->category_name}}</option>
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="row justify-content-end">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Alt Kategori Ekle</button>
                        </div>
                      </div>
                    </form>
              </div>
          </div>
      </div>
</div>
@endsection
