@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header')
  <div class="header__inner">
    <div class="header__logo">
      FashionablyLate
    </div>
      <a class="header__btn" href="/login">logout</a>
  </div>
@endsection

@section('title','Admin')

@section('content')
<div class="contents">
  <div class="search-items">
    <form action="/find" class="search-form" method="post">
      @csrf
      <input class="keyword-search" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
      <div class="search-form__pulldown--gender">
        <select search-form__pulldown--gender name="gender" id="">
          <option value="">性別</option>
          <option value="0">全て</option>
          <option value="1">男性</option>
          <option value="2">女性</option>
          <option value="3">その他</option>
        </select>
      </div>
      <div class="search-form__pulldown--category">
        <select name="category" id="">
          <option value="">問い合わせの種類</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                {{ $category->content }}
              </option>
            @endforeach
        </select>
      </div>
      <div class="search-form__pulldown--date">
        <select name="calendar" id="">
          <option value="">年/月/日</option>
        </select>
      </div>
      <button class="form__button-submit" type="submit">検索</button>
      <button class="form__button-reset" type="reset">リセット</button>
    </form>
  </div>
  <div class="page-menu">
    {{ $contacts->links() }}
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
        <td class="details">
          <button type="button" id="modal-open" class="button-modal" data-toggle="modal" data-target="#exampleModal{{ $contact->id }}">
            詳細
          </button>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
