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
  <section id="stutor">
    <div class="container-fluid hero-content-colored">
      <div class="text-center">
        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>
        <a class="btn btn-white">BECOME STUTOR</a>
      </div>
    </div>
  </section>
  <div class="container">
    <div style="min-height:2000px">

    </div>
  </div>
@endsection
@section('post')
@endsection
