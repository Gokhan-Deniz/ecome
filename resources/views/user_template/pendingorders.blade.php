@php
   $categories= App\Models\Category::latest()->get();
@endphp
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Gunship</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.min.css')}} ">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css')}} ">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('home/css/responsive.css')}} ">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('home/images/fevicon.png')}} " type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('home/css/jquery.mCustomScrollbar.min.css')}} ">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css')}} ">
      <link rel="stylesoeet" href="{{ asset('home/css/owl.theme.default.min.css')}} ">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="/">Ana Sayfa</a></li>
                           <li><a href="{{route('newrelease')}}">Yeni Çıkanlar</a></li>
                           <li><a href="{{route('paper')}}">Başvuru</a></li>
                           <li><a href="{{route('customerservice')}}">Kullanıcı Servisi</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html"><img src="{{ asset('home/images/logo.png')}} "></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.html">Ana Sayfa</a>
                     @foreach($categories as $category)
                        <a href="{{route('category', [$category->id, $category->slug])}}">{{$category->category_name}}</a>
                     @endforeach
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="{{asset('home/images/toggle-icon.png') }}"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategoriler
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach($categories as $category)
                           <a class="dropdown-item" href="#">{{$category->category_name}}</a>
                        @endforeach
                     </div>
                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="{{ asset('home/images/flag-uk.png')}} " alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                           <a href="#" class="dropdown-item">
                           <img src="{{ asset('home/images/flag-france.png')}} " class="mr-2" alt="flag">
                           French
                           </a>
                        </div>
                     </div>
                     <div class="login_menu">
                        <ul>
                           <li><a href="#">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="#">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
      </div>
         <!--commonbar-->
         <div class="container">
         <h2>{{Auth::user()->name}}</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li><a href="{{route('userprofile')}}">Ana Sayfa</a></li>
                        <li><a href="{{route('pendingorders')}}">Siparişler</a></li>
                        <li><a href="{{route('history')}}">Geçmiş</a></li>
                        <li><a href="#">Çıkış yap</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                  @if(session()->has('message'))
                     <div class="alert alert-success">
                        {{session()->get('message')}}
                     </div>
                  @endif
                  <table class="table">
                     <tr>
                        <th>Ürün Id</th>
                        <th>Fiyat</th>
                     </tr>
                     @foreach($pending_orders as $order)
                     <tr>
                        <td>{{$order->product_id}}</td>
                        <td>{{$order->total_price}}</td>
                     </tr>
                     @endforeach
                  </table>
                </div>
            </div>
            </div>
        </div>
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="{{ asset('home/images/footer-logo.png')}}"></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Abone Ol</a></span>
            </div>
            <div class="footer_menu">
               <ul>
                  <li><a href="/">Ana Sayfa</a></li>
                  <li><a href="#">Projelerimiz</a></li>
                  <li><a href="#">Bizimle çalışmak ister misiniz?</a></li>
                  <li><a href="#">Sıkça Sorulanlar</a></li>
                  <li><a href="#">Hakkında</a></li>
               </ul>
            </div>
            <div class="location_main">İletişim numaramız : <a href="#">+90 555 555 55 55</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text"><a href="https://ue7.mersin.edu.tr/login/index.php">Bitirme Projesi</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{ asset('home/js/jquery.min.js')}}"></script>
      <script src="{{ asset('home/js/popper.min.js')}} "></script>
      <script src="{{ asset('home/js/bootstrap.bundle.min.js')}} "></script>
      <script src="{{ asset('home/js/jquery-3.0.0.min.js')}} "></script>
      <script src="{{ asset('home/js/plugin.min.js')}} "></script>
      <!--sidebar-->
      <script src="{{ asset('home/js/jquery.mCustomScrollbar.concat.min.js')}} "></script>
      <script src="{{ asset('home/js/custom.js')}} "></script>

      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>
