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
        <button class="header-nav__button btn btn-outline-primary rounded-0">logout</button>
    </form>
@endsection

@section('content')
    <div class="admin__heading">
        <h2 class=" admin__heading-text text-center">Admin</h2>
    </div>
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <form class="row g-3 mb-4 fs-6" action="/admin/search" method="get">
            <div class="col-md-3">
                <input class="form-control form-keyword rounded-0" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
            </div>
            <div class="col-md-2">
                <select class="form-select select__gender rounded-0" name="gender">
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select rounded-0 select__category" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input class="form-control select__date rounded-0" type="date" name="date">
            </div>
            <div class="col-1 d-flex">
                <button class="search-button btn btn-primary w-100 rounded-0" type="submit">検索</button>
            </div>
            <div class="col-1 d-flex">
                <a href="/admin" class="reset-button btn btn-secondary w-100 d-flex align-items-center justify-content-center rounded-0">リセット</a>
            </div>
        </form>
        <div class="d-flex justify-content-between my-3">
            <a href="{{url('admin/csv') . '?' . http_build_query(request()->query())}}" class="btn btn-primary rounded-0 export-csv-button">エクスポート</a>
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
                        <td class="table__data">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                        <td class="table__data">
                            @switch($contact->gender)
                                @case(1) 男性 @break
                                @case(2) 女性 @break
                                @default その他
                            @endswitch
                        </td>
                        <td class="table__data">{{ $contact->email }}</td>
                        <td class="table__data">{{ $contact->category->content }}</td>
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
