@extends('layouts.master')
@section('pre')
  @php
  $title = config('app.name');
  $menu_item = 'home';
@endphp
@endsection
@section('content')
  <div class="container" style="margin-top:150px;">
    <div class="row">
      <div class="col-sm-6 ml-auto mr-auto">
        <div class="card card-nav-tabs">
          <div class="card-body">
            <div class="text-center">
              <div id="circle-animation-container">
                <svg id="circle-animation" viewBox="-10 -10 500 500">
                  <path class="circle" d="M877.28,335.72a203.17,203.17,0,0,1,37.86,118.1C915.14,565.26,823.44,657,712,657s-203.14-91.7-203.14-203.14S600.56,250.68,712,250.68a203.21,203.21,0,0,1,144.67,60.53" transform="translate(-508.86 -250.68)"/><polyline class="check" points="78.54 229.94 179.32 300.74 347.98 60.67"/>
                </svg>
              </div>
              <h3 class="text-success">Email Verified</h3>
              <p>
                Your email has been verified.
              </p>
              @if (Auth::check())
                <a class="btn btn-success btn-block" href="{{route('home')}}">CONTINUE LEARNING</a>
              @else
                <a class="btn btn-success btn-block" href="{{route('login')}}">PROCEED TO LOGIN</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('post')
@endsection
