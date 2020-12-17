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
                    <a class="btn btn-info" href="{{route('parks.index')}}">公園一覧</a>
                    <a class="btn btn-info" href="{{route('photos.index')}}">フォト一覧</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
