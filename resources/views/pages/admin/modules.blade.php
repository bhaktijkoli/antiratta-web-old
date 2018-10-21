@extends('layouts.admin.master')
@section('pre')
  @php
  if(isset($module)) {
    $title = "Edit $module->name";
  } else {
    $title = 'Modules';
  }
  $menu_item = 'modules';
  $nav_head = 'Edit Module';
@endphp
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/richtext.min.css') }}">
@endsection
@endsection
@section('content')
  @if (isset($module))
    <editmodule-component/>
  @endif
@endsection
@section('post')
  <script type="text/javascript" src="{{ asset('js/richtext.min.js') }}"></script>
@endsection
