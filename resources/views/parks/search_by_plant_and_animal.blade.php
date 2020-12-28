@extends('layouts.base')
@section('title', '公園を動植物から探す')

@section('content')
<div class="photo">
  @foreach ($photos as $photo)
  <div class="photo__list">
    <a href="{{route('parks.search_by_plant_and_animal', ['comment'=>$photo->comment])}}">
      <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}" title="{{$photo->comment}}">
    </a>
  </div>
  @endforeach
</div>

@if (!$parks->isEmpty())
  @foreach ($parks as $park)
  <div @if($loop->first) class="park" @endif>
    <a href="{{route('parks.detail', ['park'=>$park])}}">
      {{$park->park_name}}
    </a>
  </div>
  @endforeach
  {{ $parks->appends(request()->input())->links() }}
@endif


@endsection

@section('script')
<script type="module">
$(function(){
  $("html, body").animate({scrollTop: $('.park').offset().top}, 400, "swing")
})
</script>
@endsection