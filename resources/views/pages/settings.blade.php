@extends('layouts.master')
@section('pre')
  @php
  $menu_item = 'settings';
  $user = Auth::user();
@endphp
@endsection
@section('content')
  <div class="nav-space"></div>
  <section id="settings" style="margin-top:100px">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h4>Account Settings</h4>
              <hr />
              <ul class="nav nav-pills nav-pills-primary flex-column">
                @php
                $no = 0;
                @endphp
                @foreach ($settings_names as $n)
                  <li class="nav-item"><a class="nav-link {{$setting==$settings_links[$no]?'active':''}}" href="{{route('setting', $settings_links[$no++])}}">{{$n}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          @include("forms.settings.$setting")
        </div>
      </div>
    </div>
  </section>
@endsection
@section('post')
@endsection
