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
  <section id="section_catalog_ex">
    <div id="catalog_ex">
      @foreach ($parks as $park)
        <div class="catalog_ex_item @if($loop->first) park @endif">
          <div class="catalog_ex_item_inner">
            <h3>
              <a href="{{route('parks.detail', ['park' => $park])}}">
                {{$park->park_name}}
              </a>
            </h3>
            <div class="catalog_ex_item_inner_address">
              {{$park->address}}
            </div><!-- catalog_ex_item_inner_address  -->
            <div class="catalog_ex_item_inner_picture">
              <a href="{{route('parks.detail', ['park' => $park])}}">
                <img src="/storage/{{$park->image_path}}" alt='クリックで公園の詳細情報'>
              </a>
            </div><!-- catalog_ex_item_inner_picture -->
            <div class="catalog_ex_item_inner_tag_area">
              @foreach ($park->getNames() as $item)
                <span class="catalog_ex_item_inner_tag">{{$item}}</span>
              @endforeach
            </div><!-- catalog_ex_item_inner_tag_area1 -->
            <div class="catalog_ex_item_inner_anker">
              <a href="{{route('parks.detail', ['park' => $park])}}">&gt;</a>
            </div><!-- catalog_ex_item_inner_anker1  -->
          </div><!-- catalog_ex_item_inner1 -->
        </div><!--  catalog_ex_item1 -->
      @endforeach
    </div><!-- catalog_ex -->
  </section><!-- section_catalog_ex -->
  {{ $parks->appends(request()->input())->links() }}
@endif


@endsection

@section('script')
<script type="module">
$(function(){
  $("html, body").animate({scrollTop: $('.park').offset().top-50}, 400, "swing")
})
</script>
@endsection