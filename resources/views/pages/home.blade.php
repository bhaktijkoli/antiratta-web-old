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
  <div class="container">
    <div style="min-height:2000px">

    </div>
  </div>
@endsection
@section('post')
@endsection
