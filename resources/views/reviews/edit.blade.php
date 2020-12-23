@extends('layouts.app')
@section('title', '口コミ編集')

@section('content')
<h1>口コミ編集</h1>

@include('components.errorAll')
<form method="POST" action="{{route('reviews.update', ['review'=>$review])}}">
  @csrf
  @method('PATCH')

  <div class="form-group">
    <label for="title">{{__('validation.attributes.title')}}:</label>
    <input value="{{old('title', $review->title)}}" type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title">
    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="body">{{__('validation.attributes.body')}}:</label>
    <textarea rows="4" id="body" class="form-control @error('body') is-invalid @enderror" name="body">{{old('body', $review->body)}}</textarea>
    @error('body')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <p class="control-label"><b>{{__('validation.attributes.gender')}}</b></p>
    
    @foreach (\App\Models\Review::$genders as $key => $label)
      <div class="form-check">
        <input {{old('gender', $review->gender) == $key ? 'checked' : ''}} type="radio" value="{{$key}}" name="gender" id="gender_{{$key}}" class="form-check-input">
          <label for="gender_{{$key}}" class="form-check-label">{{$label}}</label>
      </div>
    @endforeach

    @error('gender')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="age">{{__('validation.attributes.age')}}:</label>
    {{ Form::select('age', \App\Models\Review::$ages, old('age', $review->age), empty($errors->first('age')) ? ['class'=>"form-control", 'id'=>'age'] : ['class'=>"form-control is-invalid", 'id'=>'age']) }}

    @error('age')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

  </div>
  <div>
    <button type="submit" class="btn btn-primary">登録</button>
  </div>
</form>
@endsection
