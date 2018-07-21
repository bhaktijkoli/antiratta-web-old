@extends('layouts.master')
@section('pre')
  @php
  $title = config('app.name');
  $menu_item = 'home';
@endphp
@endsection
@section('content')
  <div class="banner">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="heading-1">INDIA'S LEADING LEARNING PLATFORM FOR</h1>
          <h1 class="heading-2">TECHNICAL<br />STUDENTS</h1>
          <a class="btn btn-primary btn-lg">GET STARTED FOR FREE</a>
        </div>
      </div>
    </div>
  </div>
  <section id="stutor" class="hero-content-colored">
    <div class="container">
      <div class="text-center">
        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>
        <a class="btn btn-white">BECOME A STUTOR</a>
      </div>
    </div>
  </section>
  <section class="space">
  </section>
  <section id="counter" data-parallax="scroll" data-image-src="{{asset('images/banner.png')}}">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="counter-text">
            <h3 class="count">3</h3>
            <p>Universities</p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="counter-text">
            <h3 class="count">56</h3>
            <p>Online courses</p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="counter-text">
            <h3 class="count">425</h3>
            <p>Students</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="space">
  </section>
@endsection
@section('post')
  <script type="text/javascript">
  $('.count').counterUp();
  </script>
@endsection
