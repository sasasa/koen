@extends('layouts.base')
@section('title', $park->park_name. 'の'. $photo->comment)

@section('content')
  <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
@endsection
