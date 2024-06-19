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

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">お問い合わせ詳細</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                  <tr>
                    <th>お名前</th>
                    <td>{{ $contact->last_name }}　{{ $contact->first_name }}</td>
                  </tr>
                  <tr>
                    <th>性別</th>
                    <td>{{ $contact['gender'] == 1 ? '男性' : ($contact['gender'] == 2 ? '女性' : 'その他') }}</td>
                  </tr>
                  <tr>
                    <th>メールアドレス</th>
                    {{ $contact->email }}</th>
                  </tr>
                  <tr>
                    <th>電話番号</th>
                    <td>{{ $contact->tel }}</td>
                  </tr>
                  <tr>
                    <th>住所</th>
                    <td>{{ $contact->address }}</td>
                  </tr>
                  <tr>
                    <th>建物名</th>
                    <td>{{ $contact->building }}</td>
                  </tr>
                  <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $contact->category }}</td>
                  </tr>
                  <tr>
                    <th>お問い合わせ内容</th>
                    <td> {{ $contact->contents }}</td>
                  </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
@endsection
