@extends('layouts.app')

@section('title')
    <title>お問い合わせ入力</title>
@endsection

@section('css')
@endsection

@section('content')
    <h2>Contact</h2>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="group">
            <div class="group__title">
                <span class="">お名前</span>
                @error('last_name')
                    {{ $message }}
                @enderror
                @error('first_name')
                    {{ $message }}
                @enderror
            </div>
            <div class="group__content">
                <input type="text" name="last_name" placeholder="例: 山田"
                    value="{{ old('last_name', request('last_name')) }}">
                <input type="text" name="first_name" placeholder="例: 太郎"
                    value="{{ old('first_name', request('first_name')) }}">
            </div>
        </div>
        <div class="group">
            <div class="group__title">
                <span class="">性別</span>
                @error('gender')
                    {{ $message }}
                @enderror
            </div>
            <div class="group__content">
                <input type="radio" name="gender" value="1"
                    {{ old('gender', request('gender')) == '1' ? 'checked' : '' }}>男性
                <input type="radio" name="gender" value="2"
                    {{ old('gender', request('gender')) == '2' ? 'checked' : '' }}>女性
                <input type="radio" name="gender" value="3"
                    {{ old('gender', request('gender')) == '3' ? 'checked' : '' }}>その他
            </div>
        </div>
        <div class="group">
            <div class="group__title">
                <span class="">メールアドレス</span>
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="group__content">
                <input type="text" name="email" placeholder="例: test@example.com"
                    value="{{ old('email', request('email')) }}">
            </div>
        </div>
        <div class="group">
            <div class="group__title">
                <span class="">電話番号</span>
                @foreach (range(0,2) as $tel_col)
                    @error("tel.$tel_col")
                        {{$message}}
                        @break
                    @enderror
                @endforeach
            </div>
            <div class="group__content"> <!-- pattern="\d{2,4}" size="4" maxlength="4"-->
                <input type="text" name="tel[]" value="{{ old('tel.0', request('tel.0') ?? '') }}"> -
                <input type="text" name="tel[]" value="{{ old('tel.1', request('tel.1') ?? '') }}"> -
                <input type="text" name="tel[]" value="{{ old('tel.2', request('tel.2') ?? '') }}">
            </div>
        </div>
        <div class="group">
            <div class="group__title">
                <span class="">住所</span>
                @error('address')
                    {{ $message }}
                @enderror
            </div>
            <div class="group__content">
                <input type="text" name="address" placeholder="例: ○○県××市△△-□丁目"
                    value="{{ old('address', request('address')) }}">
            </div>
        </div>
        <div class="group">
            <div class="group__title">
                <span class="">建物名</span>
            </div>
            <div class="group__content">
                <input type="text" name="building" placeholder="例:〇〇マンション"
                    value="{{ old('building', request('building')) }}">
            </div>
        </div>
        <div class="group">
            <div class="group__title">
                <span class="">お問い合わせの種類</span>
                @error('category_id')
                    {{ $message }}
                @enderror
            </div>
            <div class="group__content">
                <select name="category_id">
                    <option value="">選択して下さい</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}"
                            {{ old('category_id', request('category_id')) == $category['id'] ? 'selected' : '' }}>
                            {{ $category['content'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="group">
            <div class="group__title">
                <span class="">お問い合わせ内容</span>
                @error('detail')
                    {{ $message }}
                @enderror
            </div>
            <div class="group__content">
                <textarea name="detail">{{ old('detail', request('detail')) }}</textarea>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
@endsection
