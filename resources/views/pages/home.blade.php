@extends('layouts.master')
@section('pre')
  @php
  $transparent_nav = true;
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
  <section id="welcome">
    <div class="container">
      <div class="row">
        <div class="text-center">
          <h1>WELCOME TO ANTIRATTA</h1>
          <h3>AWESOME SUCCESS WITH STUDENTS</h3>
          <p>
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="welcome-icon">
            <h3><i class="fa fa-graduation-cap" aria-hidden="true"></i>LEARN COUSES FIRST</h3>
            <p>
              Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia con- sequuntur magni dolores eos qui ratione
            </p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="welcome-icon">

            <h3><i class="fa fa-tags" aria-hidden="true"></i>440 COURSES AVAILABLE</h3>
            <p>
              Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia con- sequuntur magni dolores eos qui ratione
            </p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="welcome-icon">
            <h3><i class="fa fa-diamond" aria-hidden="true"></i>EVERYTHING YOU NEED</h3>
            <p>
              Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia con- sequuntur magni dolores eos qui ratione
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="counter" data-parallax="scroll" data-image-src="{{asset('images/banner.png')}}">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="counter-title">
            <h2>GET STARTED FOR FREE</h2>
            <p>Teach you how to build a complete learning management system upcoming education for students</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="counter-up">
          <i class="fa fa-university" aria-hidden="true"></i>
          <p class="title">Universities</p>
          <p class="count">3</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="counter-up">
          <i class="fa fa-list-alt" aria-hidden="true"></i>
          <p class="title">Courses completed</p>
          <p class="count">56</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="counter-up">
          <i class="fa fa-users" aria-hidden="true"></i>
          <p class="title">Students Enrolled</p>
          <p class="count">560</p>
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
