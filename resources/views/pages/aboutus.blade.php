@extends('layouts.master')
@section('pre')
  @php
  $title = "About Us";
  $menu_item = 'aboutus';
  $profiles = array(
    array(
      'name'=>'Manali kale',
      'post'=>'Writer',
      'description'=>'Works as a content , screenplay and dialogue writer at antiratta.
      Has been working as a screen writer for films , television and theatre since 3 years.
      She is a computer engineering graduate from D.J sanghvi college of engineering  , vile parle.
      Her passion for art took her towards writing but her 6 years as an engineering student ( 3 yrs diploma and 3 yrs engineering ) is the key reason for her to be a part of antiratta.'
    ),
    array(
      'name'=>'Sahil Gaikwad',
      'post'=>'Writer',
      'description'=>'A bmm student who is passionate about photography , cinematography , painting and craft as well as music and many other creative activities. I have worked as an assistant DOP for  several  television serials and web series . Now i also work independently for short films and advertisements.'
    ),
    array(
      'name'=>'Kshipra Naikare',
      'post'=>'Writer',
      'description'=>'An M. Tech Electronics engineer who is a product catalyst by profession and a teacher at heart. A strong belief in making the education system more sensible and enjoyable is wat motivates me to work with antiratta.'
    ),
    array(
      'name'=>'Ananya Mitra',
      'post'=>'Writer',
      'description'=>'An IT engineering student who is way too interested in novel writings and meme making. Have worked in many anthologies and looking forward to publish my novel. Ty.'
    ),
  )
@endphp
@endsection
@section('content')
  <div class="nav-space"></div>
  <section id="team">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="text-center">
            <h2>Meet the team</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($profiles as $profile)
          <div class="col-sm-3">
            <div class="team-profile">
              <img src="http://via.placeholder.com/132x132&text=Avatar" alt="{{$profile['name']}}" class="img-raised rounded-circle img-fluid">
              <h4 class="name">{{$profile['name']}}</h4>
              {{-- <h6 class="sub">{{$profile['post']}}</h6> --}}
              <p class="description">
                {{$profile['description']}}
              </p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
@section('post')
@endsection
