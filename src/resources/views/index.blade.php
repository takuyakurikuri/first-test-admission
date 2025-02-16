@extends('layouts.app')

@section('title')
    <title>お問い合わせ入力</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="contact__heading">
            <h2 class=" contact__heading-text text-center">Contact</h2>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form class="form" action="/confirm" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">お名前 <span class="text-danger">※</span></label>
                        <div class="col-9 row form-input__name">
                            <div class="col-6 form-input__last-name">
                                <input type="text" class="form-control rounded-0 form-input__name-text" name="last_name" placeholder="例: 山田"
                                    value="{{ old('last_name', request('last_name')) }}">
                            </div>
                            <div class="col-6 form-input__first-name">
                                <input type="text" class="form-control rounded-0 form-input__name-text" name="first_name" placeholder="例: 太郎"
                                    value="{{ old('first_name', request('first_name')) }}">
                            </div>
                        </div>
                        @error('last_name')
                            {{ $message }}
                        @enderror
                        @error('first_name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">性別 <span class="text-danger">※</span></label>
                        <div class="col-sm-9 d-flex align-items-center">
                            <div class="form-check me-3">
                                <input class="form-check-input form-input__gender" type="radio" name="gender" value="1"
                                    {{ old('gender', request('gender')) == '1' ? 'checked' : '' }} checked="checked">
                                <label class="form-check-label">男性</label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input form-input__gender" type="radio" name="gender" value="2"
                                    {{ old('gender', request('gender')) == '2' ? 'checked' : '' }}>
                                <label class="form-check-label">女性</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input form-input__gender" type="radio" name="gender" value="3"
                                    {{ old('gender', request('gender')) == '3' ? 'checked' : '' }}>
                                <label class="form-check-label">その他</label>
                            </div>
                        </div>
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">メールアドレス <span class="text-danger">※</span></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control rounded-0 form-input__mail" name="email" placeholder="例: test@example.com"
                                value="{{ old('email', request('email')) }}">
                        </div>
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">電話番号 <span class="text-danger">※</span></label>
                        <div class="col-sm-9 d-flex">
                            <input type="text" class="form-control me-3 rounded-0 form-input__tel" name="tel[]" placeholder="080"
                                value="{{ old('tel.0', request('tel.0')) }}">
                                <span class="align-self-center">-</span>
                            <input type="text" class="form-control me-3 ms-3 rounded-0 form-input__tel" name="tel[]" placeholder="1234"
                                value="{{ old('tel.1', request('tel.1')) }}">
                                <span class="align-self-center">-</span>
                            <input type="text" class="form-control ms-3 rounded-0 form-input__tel" name="tel[]" placeholder="5678"
                                value="{{ old('tel.2', request('tel.2')) }}">
                        </div>
                        @foreach (range(0, 2) as $tel_col)
                            @error("tel.$tel_col")
                                {{ $message }}
                            @break
                        @enderror
                    @endforeach
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">住所 <span class="text-danger">※</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control rounded-0 form-input__address" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3"
                                value="{{ old('address', request('address')) }}">
                        </div>
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">建物名</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control rounded-0 form-input__building" name="building" placeholder="例: 千駄ヶ谷マンション101"
                                value="{{ old('building', request('building')) }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">お問い合わせの種類 <span class="text-danger">※</span></label>
                        <div class="col-sm-9">
                            <select class="form-select rounded-0 form-input__category" name="category_id">
                                <option value="">選択してください</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}"
                                        {{ old('category_id', request('category_id')) == $category['id'] ? 'selected' : '' }}>
                                        {{ $category['content'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">お問い合わせ内容 <span class="text-danger">※</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control rounded-0 form-input__detail" name="detail" rows="4" placeholder="お問い合わせ内容をご記載ください">{{ old('detail', request('detail')) }}</textarea>
                        </div>
                        @error('detail')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-secondary rounded-0 px-5 button-confirm-submit">確認画面</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
