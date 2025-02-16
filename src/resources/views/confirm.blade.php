@extends('layouts.app')

@section('title')
    <title>お問い合わせ内容確認</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm__heading">
        <h2 class=" confirm__heading-text text-center">Confirm</h2>
    </div>
    <div class="container">
        <table class="table table-bordered table-sm confirm-table mx-auto">
            <tbody>
                <tr>
                    <th class="ps-3 w-25 align-middle table__header">お名前</th>
                    <td class="p-3">{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
                </tr>
                <tr>
                    <th class="ps-3 align-middle table__header">性別</th>
                    <td class="p-3">
                        @switch($contact['gender'])
                            @case(1) 男性 @break
                            @case(2) 女性 @break
                            @case(3) その他 @break
                        @endswitch
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                    </td class="p-3">
                </tr>
                <tr>
                    <th class="ps-3 align-middle table__header">メールアドレス</th>
                    <td class="p-3">{{ $contact['email'] }}</td>
                </tr>
                <tr>
                    <th class="ps-3 align-middle table__header">電話番号</th>
                    <td class="p-3">{{ implode('', $tel) }}</td>
                </tr>
                <tr>
                    <th class="ps-3 align-middle table__header">住所</th>
                    <td class="p-3">{{ $contact['address'] }}</td>
                </tr>
                <tr>
                    <th class="ps-3 align-middle table__header">建物名</th>
                    <td class="p-3">{{ $contact['building'] }}　</td>
                </tr>
                <tr>
                    <th class="ps-3 align-middle table__header">お問い合わせの種類</th>
                    <td class="p-3">{{ $category['content'] }}</td>
                </tr>
                <tr>
                    <th class="ps-3 align-middle table__header">お問い合わせ内容</th>
                    <td class="p-3">{{ $contact['detail'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <form class="confirm-form" id="contact" action="/contacts" method="post">
        @csrf
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly>
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly>
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly>
        <input type="hidden" name="email" value="{{ $contact['email'] }}" readonly>
        <input type="hidden" name="tel[]" value="{{ $tel[0] }}">
        <input type="hidden" name="tel[]" value="{{ $tel[1] }}">
        <input type="hidden" name="tel[]" value="{{ $tel[2] }}">
        <input type="hidden" name="address" value="{{ $contact['address'] }}" readonly>
        <input type="hidden" name="building" value="{{ $contact['building'] }}">
        <input type="hidden" name="category_id" value="{{ $category['id'] }}">
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
    </form>
    <form action="/" id="modify" method="GET">
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
        <input type="hidden" name="email" value="{{ $contact['email'] }}">
        <input type="hidden" name="tel[0]" value="{{ $tel[0] }}">
        <input type="hidden" name="tel[1]" value="{{ $tel[1] }}">
        <input type="hidden" name="tel[2]" value="{{ $tel[2] }}">
        <input type="hidden" name="address" value="{{ $contact['address'] }}">
        <input type="hidden" name="building" value="{{ $contact['building'] }}">
        <input type="hidden" name="category_id" value="{{ $category['id'] }}">
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
    </form>
    <div class="text-center buttons-submit">
        <button type="submit" form="contact" class="form__button-submit">送信</button>
        <button type="submit" form="modify" class="form__button-modify">修正</button>
    </div>
@endsection
