@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('header')
  <div class="header__inner">
    <div class="header__logo">
      FashionablyLate
    </div>
  </div>
@endsection

@section('title','Contact')

@section('content')
<div class="contact-form__content">
  <table>
    <form class="form" action="/contacts/confirm" method="post">
      @csrf
      <tr class="form__group">
        <th class="form__group-title">
          <span class="form__label--item">お名前</span>
          <span class="form__label--required">※</span>
        </th>
        <td class="form__group-content">
          <div class="form__input--name">
            <input type="text" name="last_name" placeholder="例:山田"
            value="{{ old('last_name') }}" />
            <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}" />
          </div>
          <div class="form__error">
            @error('last_name')
              {{ $message }}
            @enderror
            @error('first_name')
              {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr class="form__group">
        <th class="form__group-title">
          <span class="form__label--item">性別</span>
          <span class="form__label--required">※</span>
        </th>
        <td class="form__group-content">
          <div class="form__input--radio">
            <input type="radio" name="gender" value="1" {{ old('gender') === null || old('gender') == 1 ? 'checked' : '' }} />
            <label>男性</label>
            <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }} />
            <label>女性</label>
            <input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }} />
            <label>その他</label>
          </div>
          <div class="form__error">
            @error('gender')
            {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr class="form__group">
        <th class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
          <span class="form__label--required">※</span>
        </th>
        <td class="form__group-content">
          <div class="form__input--text">
            <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
          </div>
          <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr class="form__group">
        <th class="form__group-title">
          <span class="form__label--item">電話番号</span>
          <span class="form__label--required">※</span>
        </th>
        <td class="form__group-content">
          <div class="form__input--tel">
            <input type="text" name="tel-1" inputmode="numeric" placeholder="080" value="{{ old('tel-1') }}" />-
            <input type="text" name="tel-2" inputmode="numeric" placeholder="1234" value="{{ old('tel-2') }}" />-
            <input type="text" name="tel-3" inputmode="numeric" placeholder="5678" value="{{ old('tel-3') }}" />
          </div>
          <div class="form__error">
            @if ($errors->has('tel-1'))
              @error('tel-1')
              {{ $message }}
              @enderror
              @elseif($errors->has('tel-2'))
              @error('tel-2')
              {{ $message }}
              @enderror
              @else
              @error('tel-3')
              {{ $message }}
              @enderror
            @endif
          </div>
        </td>
      </tr>
      <tr class="form__group">
        <th class="form__group-title">
          <span class="form__label--item">住所</span>
          <span class="form__label--required">※</span>
        </th>
        <td class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
          </div>
          <div class="form__error">
            @error('address')
            {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr class="form__group">
        <th class="form__group-title">
          <span class="form__label--item">建物名</span>
        </th>
        <td class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('address') }}" />
          </div>
          <div class="form__error"></div>
        </td>
      </tr>
      <tr class="form__group">
        <th class="form__group-title">
          <span class="form__label--item">お問い合わせの種類</span>
          <span class="form__label--required">※</span>
        </th>
        <td class="form__group-content">
          <div class="form__input--pulldown">
            <select name="category_id" value="{{ old('category_id') }}" required>
              <option value="">選択してください</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                  {{ $category->content }}
                </option>
              @endforeach
          </div>
          <div class="form__error">
            @error('category_id')
            {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr class="form__group">
        <th class="form__group-title">
          <span class="form__label--item">お問い合わせ内容</span>
          <span class="form__label--required">※</span>
        </th>
        <td class="form__group-content">
          <div class="form__input--textarea">
            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
          </div>
          <div class="form__error">
            @error('detail')
            {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr>
        <th class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </th>
      </tr>
    </form>
  </table>
</div>
@endsection