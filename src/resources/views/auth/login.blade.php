@extends('layouts.app')

@section('title')
    <title>会員ログイン</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-on')
        <a class="register__button-submit btn btn-outline-primary" href="/register">register</a>
@endsection

@section('content')
    <div class="login__content">
        <div class="login-form__heading">
            <h2 class=" login-form__heading-text text-center">Login</h2>
        </div>

        <div class="container d-flex justify-content-center align-items-center">
            <div class="card">
                <form class="form" action="/login" method="post">
                    @csrf
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">メールアドレス</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input class=" form-control form-control-lg rounded-0" type="email" name="email" value="{{ old('email') }}" placeholder="例:test@example.com"/>
                            </div>
                            <div class="form__error">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">パスワード</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input class=" form-control form-control-lg rounded-0" type="password" name="password" placeholder="例:coachtech1106" />
                            </div>
                            <div class="form__error">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__button text-center">
                        <button class="form__button-submit" type="submit">ログイン</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
