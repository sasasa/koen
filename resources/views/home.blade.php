@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-info mb-2" href="{{route('parks.index')}}">公園管理</a>
                    <a class="btn btn-info mb-2" href="{{route('photos.index')}}">フォト管理</a>
                    <a class="btn btn-info mb-2" href="{{route('reviews.index')}}">口コミ管理</a>
                    <a class="btn btn-info mb-2" href="{{route('tags.index')}}">タグ管理</a>
                    <a class="btn btn-info mb-2" href="{{route('articles.index')}}">公園なるほど情報管理</a>
                    <a class="btn btn-info mb-2" href="{{route('inquiries.index')}}">お問い合わせ管理</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
