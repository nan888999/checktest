@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header')
  <div class="header__inner">
    <div class="header__logo">
      FashionablyLate
    </div>
    <form class="form" action="/logout" method="post">
    @csrf
      <button class="header__btn">logout</button>
    </form>
  </div>
@endsection

@section('title','Admin')

@section('content')
<div class="contents">
  <div class="search-items">
    <form action="/find" class="search-form" method="post">
      @csrf
      <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
      <select name="gender" id="" class="search-form__pulldown">
        <option value="">性別</option>
        <option value="0">全て</option>
        <option value="1">男性</option>
        <option value="2">女性</option>
        <option value="3">その他</option>
      </select>
      <select name="category" id="" class="search-form__pulldown">
        <option value="">問い合わせの種類</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ 'category' == $category->id ? 'selected' : '' }}>
              {{ $category->content }}
            </option>
          @endforeach
      </select>
      <select name="time" id="" class="search-form__pulldown">
        <option value="">年/月/日</option>
      </select>
      <button type="submit">検索</button>
      <button type="reset">リセット</button>
    </form>
  </div>
  <div class="contacts-table">
    <table>
      <tr>
        <th class="name">お名前</th>
        <th class="gender">性別</th>
        <th class="email">メールアドレス</th>
        <th class="category">お問い合わせの種類</th>
        <th class="details"></th>
      </tr>
      @foreach ($contacts as $contact)
      <tr>
        <td  class="name">{{$contact->last_name}}　{{$contact->first_name}}</td>
        <td class="gender">{{ $contact['gender'] == 1 ? '男性' : ($contact['gender'] == 2 ? '女性' : 'その他') }}</td>
        <td class="email">{{$contact->email}}</td>
        <td class="category">{{$contact->category}}</td>
        <td class="details">詳細</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection