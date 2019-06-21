@include('partials.header')

<div class="slide-one-item home-slider owl-carousel">

  <div class="site-blocks-cover" style="background-image: url(/images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5"></div>

  <div class="site-blocks-cover" style="background-image: url(/images/hero_bg_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5"></div>

</div>

@yield('content')

@include('partials.footer')
