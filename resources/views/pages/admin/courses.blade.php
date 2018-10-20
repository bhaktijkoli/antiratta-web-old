@extends('layouts.admin.master')
@section('pre')
  @php
  if(isset($course)) {
    $title = "Edit $course->name";
  } else {
    $title = 'Courses';
  }
  $menu_item = 'courses';
  $nav_head = 'Courses';
@endphp
@endsection
@section('content')
  @if (isset($course))
    <editcourse-component/>
  @else
    <course-component/>
  @endif
@endsection
@section('post')
@endsection
