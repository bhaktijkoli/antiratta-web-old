@extends('layouts.master')
@section('pre')
  @php
  $title = config('app.name');
@endphp
@endsection
@section('content')
  <router-view></router-view>
@endsection
@section('post')
@endsection
