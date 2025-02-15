@extends('layouts.app')

@section('title')
    <title>管理画面</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('header-on')
    <form class="form" action="/logout" method="post">
        @csrf
        <button class="header-nav__button btn btn-outline-primary">logout</button>
    </form>
@endsection

@section('content')
    <div class="admin__heading">
        <h2 class=" admin__heading-text text-center">Admin</h2>
    </div>
    {{--<dev class="search-section">
        <form class="search-form" action="/admin/search" method="get">
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力して下さい" />
                <select class="search-form__item-select" name="gender">
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
                <select class="search-form__item-select" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
                <input type="date" name="date" placeholder="年/月/日" />
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
            <div class="search-form__reset-button">
                <a href="/admin" class="search-form__reset-button-submit">リセット</a>
            </div>
        </form>
    </dev>
    {{ $contacts->links() }}
    <div class="table-section">
        <table class="table-section__inner">
            <div class="table-section__title">
                <tr class="table-section__record">
                    <th class="table-section__title-name">お名前</th>
                    <th class="table-section__title-name">性別</th>
                    <th class="table-section__title-name">メールアドレス</th>
                    <th class="table-section__title-name">お問い合わせの種類</th>
                    <th class="table-section__title-name"></th>
                </tr>
            </div>
            @foreach ($contacts as $contact)
                <div class="table-section__item">
                    <tr class="table-section__record">
                        <td class="table-section__item-name">{{ $contact->last_name }}{{ $contact->first_name }}</td>
                        <td class="table-section__item-name">
                            @switch($contact->gender)
                                @case(1)
                                    男性
                                @break
                                @case(2)
                                    女性
                                @break
                                @default
                                    その他
                            @endswitch
                        </td>
                        <td class="table-section__item-name">{{ $contact->email }}</td>
                        <td class="table-section__item-name">{{ $contact->category->content }}</td>
                        <td class="table-section__item-name">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $contact->id }}">詳細</button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $contact->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-end">
                                            <div class="btn-close-decorate">
                                                <button type="button" class="btn-close ms-auto rounded-circle"
                                                    data-bs-dismiss="modal" aria-label="Close">×</button>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <table>
                                                <tr>
                                                    <th>お名前</th>
                                                    <td>{{ $contact->last_name }}{{ $contact->first_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>性別</th>
                                                    <td>
                                                        @switch($contact->gender)
                                                            @case(1)
                                                                男性
                                                            @break
                                                            @case(2)
                                                                女性
                                                            @break
                                                            @default
                                                                その他
                                                        @endswitch
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>メールアドレス</th>
                                                    <td>{{ $contact->email }}</td>
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
                                                    <th>お問い合せ種類</th>
                                                    <td>{{ $contact->category->content }}</td>
                                                </tr>
                                                <tr>
                                                    <th>お問い合せ内容</th>
                                                    <td>{{ $contact->detail }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <form action="admin/delete" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{ $contact->id }}">
                                                <button type="submit" class="btn btn-primary">削除</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </div>
            @endforeach
        </table>
    </div>--}}
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <form class="row g-3 mb-4 fs-6" action="/admin/search" method="get">
            <div class="col-md-3">
                <input class="form-control form-keyword" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
            </div>
            <div class="col-md-2">
                <select class="form-select select__gender" name="gender">
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input class="form-control" type="date" name="date">
            </div>
            <div class="col-1 d-flex">
                <button class="search-button btn btn-primary w-100" type="submit">検索</button>
            </div>
            <div class="col-1 d-flex">
                <a href="/admin" class="reset-button btn btn-secondary w-100 d-flex align-items-center justify-content-center">リセット</a>
            </div>
        </form>
        <div class="d-flex justify-content-end">
            {{ $contacts->links() }}
        </div>
        <div class="">
            <table class="contact-table table table-hover">
                <thead>
                    <tr>
                        <th class=" table__header">お名前</th>
                        <th class=" table__header">性別</th>
                        <th class=" table__header">メールアドレス</th>
                        <th class=" table__header">お問い合わせの種類</th>
                        <th class=" table__header"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                        <td>
                            @switch($contact->gender)
                                @case(1) 男性 @break
                                @case(2) 女性 @break
                                @default その他
                            @endswitch
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->category->content }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-custom" data-bs-toggle="modal" data-bs-target="#modal-{{ $contact->id }}">
                                詳細
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $contact->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-end">
                                            <button type="button" class="btn btn-outline-secondary rounded-circle close-button fs-5" data-bs-dismiss="modal">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table modal-body__table">
                                                <tr>
                                                    <th class="modal-body__table__header">お名前</th>
                                                    <td class="modal-body__table__data">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="modal-body__table__header">性別</th>
                                                    <td class="modal-body__table__data">
                                                    @switch($contact->gender)
                                                        @case(1) 男性 @break
                                                        @case(2) 女性 @break
                                                        @default その他
                                                    @endswitch
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="modal-body__table__header">メール</th>
                                                    <td class="modal-body__table__data">{{ $contact->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="modal-body__table__header">電話番号</th>
                                                    <td class="modal-body__table__data">{{ $contact->tel }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="modal-body__table__header">住所</th>
                                                    <td class="modal-body__table__data">{{ $contact->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="modal-body__table__header">建物名</th>
                                                    <td class="modal-body__table__data">{{ $contact->building }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="modal-body__table__header">お問い合わせの種類</th>
                                                    <td class="modal-body__table__data">{{ $contact->category->content }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="modal-body__table__header">お問い合わせ内容</th>
                                                    <td class="modal-body__table__data">{{ $contact->detail }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <form action="admin/delete" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{ $contact->id }}">
                                                <button type="submit" class="btn btn-danger">削除</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
