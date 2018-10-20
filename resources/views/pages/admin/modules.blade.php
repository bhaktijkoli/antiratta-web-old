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
@endsection
@section('content')
  @if (isset($module))
    <editmodule-component/>
  @endif
@endsection
@section('post')
@endsection
