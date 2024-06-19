@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
  <div class="thanks__back">Thank you</div>
  <div class="thanks__content--item">
    <h2>お問い合わせありがとうございました</h2>
  </div>
  <div class="thanks__content-btn">
    <a href="/" class="btn-home">HOME</a>
  </div>
</div>
@endsection