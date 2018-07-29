@extends('layouts.master')
@section('pre')
  @php
  $title = "Just For Knowledge";
  $menu_item = 'home';
@endphp
@endsection
@section('content')
  <section id="splitview" style="margin-top:70px">
    <div class="splitview skewed">
      <div class="panel bottom">
        <div class="content">
          <div class="description">
            <h1>Does</h1>
            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
          </div>
          <img src="{{asset('images/john_f_kennedy_original.png')}}" alt="Original">
        </div>
      </div>

      <div class="panel top">
        <div class="content">
          <div class="description">
            <h1>Overdoes</h1>
            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
          </div>
          <img src="{{asset('images/john_f_kennedy_alternate.png')}}" alt="Duotone">
        </div>
      </div>

      <div class="handle"></div>
    </div>
  </section>
  <div class="space"></div>
  <div class="space"></div>
  <div class="space"></div>
@endsection
@section('post')
@endsection
