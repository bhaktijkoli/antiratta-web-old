@extends('layouts.admin.master')
@section('pre')
  @php
  $title = 'Courses';
  $menu_item = 'courses';
  $nav_head = 'Courses';
@endphp
@endsection
@section('content')
  <course-component/>
@endsection
@section('post')
@endsection
