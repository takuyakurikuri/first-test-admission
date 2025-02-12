@extends('layouts.app')

@section('title')
    <title>お問い合わせ内容確認</title>
@endsection

@section('css')
@endsection

@section('content')
    <h2>Confirm</h2>
    <form class="confirm-form" action="/contacts" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">名前</th>
                    <td class="confirm-table__text">
                        <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly>
                        <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        @switch($contact['gender'])
                            @case(1)
                                <input type="text" name="" value="男性" readonly>
                                @break
                            @case(2)
                                <input type="text" name="" value="女性" readonly>
                                @break
                            @case(3)
                                <input type="text" name="" value="その他" readonly>
                        @endswitch
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="text" name="email" value="{{ $contact['email'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="text" name="" value="{{ implode('', $tel) }}" readonly>
                        <input type="hidden" name="tel[]" value="{{$tel[0]}}">
                        <input type="hidden" name="tel[]" value="{{$tel[1]}}">
                        <input type="hidden" name="tel[]" value="{{$tel[2]}}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ種類</th>
                    <td class="confirm-table__text">
                        <input type="text" value="{{ $category['content'] }}" readonly>
                        <input type="hidden" name="category_id" value="{{ $category['id'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">内容</th>
                    <td class="confirm-table__text">
                        <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly>
                    </td>
                </tr>
            </table>
            <button type="submit" class="form__button-submit">送信</button>
        </div>
    </form>
    <form action="/" method="GET">
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
        <button type="submit">修正</button>
    </form>
@endsection
