@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('header')
  <div class="header__inner">
    <div class="header__logo">
      FashionablyLate
    </div>
  </div>
@endsection

@section('title','Confirm')

@section('content')
<div class="confirm__content">
  <form class="form" action="/contacts" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly>
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly />
            {{ $contact['last_name'] . '　' . $contact['first_name'] }}
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly />
            {{ $contact['gender'] == 1 ? '男性' : ($contact['gender'] == 2 ? '女性' : 'その他') }}
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            {{ $contact['tel-1'] . $contact['tel-2'] . $contact['tel-3'] }}
            <input type="hidden" name="tel-1" value="{{ $contact['tel-1'] }}" readonly />
            <input type="hidden" name="tel-2" value="{{ $contact['tel-2'] }}" readonly />
            <input type="hidden" name="tel-3" value="{{ $contact['tel-3'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__text">
            <input type="hidden" name="category_id" value="{{ $category->id }}" readonly />
            {{ $category->content }}
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
      <a class="fix-button" href="/" onclick="event.preventDefault(); document.getElementById('back-form').submit();">修正</a>
    </div>
  </form>
  <form id="back-form" action="{{ route('contact.back') }}" method="post" style="display: none;">
    @csrf
    <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
    <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
    <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
    <input type="hidden" name="email" value="{{ $contact['email'] }}">
    <input type="hidden" name="tel-1" value="{{ $contact['tel-1'] }}">
    <input type="hidden" name="tel-2" value="{{ $contact['tel-2'] }}">
    <input type="hidden" name="tel-3" value="{{ $contact['tel-3'] }}">
    <input type="hidden" name="address" value="{{ $contact['address'] }}">
    <input type="hidden" name="building" value="{{ $contact['building'] }}">
    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
    <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
  </form>
</div>
@endsection