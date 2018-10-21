@extends('layouts.admin.master')
@section('pre')
  @php
  if(isset($topic)) {
    $title = "Edit $topic->name";
  } else {
    $title = 'Topics';
  }
  $menu_item = 'topics';
  $nav_head = 'Edit Topic';
@endphp
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/richtext.min.css') }}">
@endsection
@endsection
@section('content')
  @if (isset($topic))
    <edittopic-component/>
  @endif
@endsection
@section('post')
  <script type="text/javascript" src="{{ asset('js/richtext.min.js') }}"></script>
@endsection
