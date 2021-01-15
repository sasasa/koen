@extends('layouts.base')

@section('description', $park->address.'に在る'.$park->park_name. 'の'. $photo->comment. 'の写真です。')

@section('title', $park->park_name. 'の'. $photo->comment)

@section('content')
  <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
  <div class="back-link">
    <a href="{{ route('parks.detail', ['park' => $park]) }}">戻る</a>
  </div>
@endsection
