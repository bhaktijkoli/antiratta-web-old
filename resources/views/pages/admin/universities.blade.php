@extends('layouts.admin.master')
@section('pre')
  @php
  $title = 'Universities';
  $menu_item = 'universities';
  $nav_head = 'Universities';
@endphp
@endsection
@section('content')
  <university-component/>
@endsection
@section('post')
@endsection
