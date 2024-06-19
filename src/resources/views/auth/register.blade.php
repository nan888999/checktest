@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('header')
  <div class="header__inner">
    <div class="header__logo">
      FashionablyLate
    </div>
    <a class="header__btn" href="/login">login</a>
  </div>
@endsection

@section('content')
<div class="auth-form">
  <div class="auth-form__heading">
    <h2>Register</h2>
  </div>
  <div class="form__content">
    <form class="form" action="/register" method="post">
      @csrf
      <label for="name">お名前</label>
      <div class="form__input--text">
        <input type="text" name="name" id="name" placeholder="例:山田　太郎" value="{{ old('name') }}" />
      </div>
      <div class="form__error">
        @error('name')
        {{ $message }}
        @enderror
      </div>
      <label for="email">メールアドレス</label>
      <div class="form__input--text">
        <input type="email" name="email" id="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
      </div>
      <div class="form__error">
        @error('email')
        {{ $message }}
        @enderror
      </div>
      <label for="password">パスワード</label>
      <div class="form__input--text">
        <input type="password" name="password" id="password" placeholder="例:coachtech1106" value="{{ old('password') }}" />
      </div>
      <div class="form__error">
        @error('password')
        {{ $message }}
        @enderror
      </div>
      <div class="form__btn">
        <button class="form__btn-auth" type="submit">登録</button>
      </div>
    </form>
  </div>
</div>
@endsection