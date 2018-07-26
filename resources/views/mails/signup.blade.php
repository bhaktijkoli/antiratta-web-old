@extends('mails.master')
@section('content')
@php
  $link = route('email_verify') ."?token=$ev->token";
@endphp
Hi {{$user->firstname}},<br />
To complete your sign up, please verify your email:<br />
<br />
<a href="{{$link}}">Verify</a>
<br />
<br />
Or copy this link and paste in your web browser
<br />
<a href="{{$link}}">{{$link}}</a>
<br />
<br />
Cheers,<br />
The AntiRatta Team
@endsection
