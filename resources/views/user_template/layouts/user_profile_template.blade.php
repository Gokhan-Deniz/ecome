@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
        <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li><a href="">Ana Sayfa</a></li>
                        <li><a href="">Siparişler</a></li>
                        <li><a href="">Geçmiş</a></li>
                        <li><a href="">Çıkış yap</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    @yield('profilecontent')
                </div>
            </div>
        </div>
</div>
@endsection