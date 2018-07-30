@extends('layouts.master')
@section('pre')
@php
$title = 'Candid Charcha';
$menu_item = 'candid';
@endphp
@endsection
@section('content')
<div class="nav-space"></div>
<section id="comming" style="margin-top:150px">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="text-center">
          <img src="{{asset('images/candidcharcha.png')}}" />
          <h2>Comming soon...</h2>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('post')
@endsection
