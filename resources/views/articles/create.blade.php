@extends('layouts.app')
@section('title', '公園なるほど情報新規作成')

@section('content')
<h1>公園なるほど情報新規作成</h1>

@include('components.errorAll')

<form action="{{ route('articles.store') }}" method="post" class="mt-5" enctype='multipart/form-data'>
  @csrf
  <div class="form-group">
    <label for="title">{{__('validation.attributes.title')}}:</label>
    <input value="{{old('title')}}" type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title">
    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="article_type">{{__('validation.attributes.article_type')}}:</label>
    {{ Form::select('article_type', \App\Models\Article::$types, old('article_type'), empty($errors->first('article_type')) ? ['class'=>"form-control", 'id'=>'article_type'] : ['class'=>"form-control is-invalid", 'id'=>'article_type']) }}
    @error('article_type')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="body">{{__('validation.attributes.body')}}:</label>
    <textarea rows="10" id="body" class="form-control @error('body') is-invalid @enderror" name="body">{{old('body')}}</textarea>
    @error('body')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    {{ "<h4><br><p>" }}タグを利用できます
  </div>

  <div class="form-group">
    <label for="upfile">{{__('validation.attributes.image_path')}}:</label>
    <input type="file" id="upfile" class="form-control-file @error('upfile') is-invalid @enderror" name="upfile">
    @error('upfile')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    明度が低めの画像を設定してください。
  </div>

  <button type="submit" class="btn btn-primary">登録</button>
</form>
@endsection