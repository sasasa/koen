@extends('layouts.base')

@section('description', '動植物の写真をクリックするとその写真のキーワードに紐づいた公園を検索することができます。動植物の写真から公園を検索することができます。')

@section('title', '公園を動植物から探す')

@section('content')
  @if (!$group_photos->isEmpty())
  <div class="photo">
    <form method="GET" action="{{route('parks.search_by_plant_and_animal', ['type'=>$type])}}" >
      @foreach ($group_photos as $key => $photos)
        <div class="photo__list">
          <label for="ch_{{ $photos[0]->id }}">
            <img src="/storage/{{$photos[0]->image_path}}" alt="{{$key}}" title="{{$key}}">
            <input {{ request()->photo == mb_convert_kana($key, 'Hcsa') ? 'checked' : '' }} id="ch_{{ $photos[0]->id }}" name="photo" type="radio" value="{{ mb_convert_kana($key, 'Hcsa') }}">
            {{ mb_convert_kana($key, 'Hcsa') }}
          </label>
        </div>
      @endforeach
      <input type="submit" value="検索">
    </form>
  </div>
  @else
    <section id="outer_section_livings_area">
      <h2>動植物から探す</h2>
      <div id="inner_section_livings_area">
          <div id="livings_area">
              <ul>
                  <li>
                      <a href="{{ route('parks.search_by_plant_and_animal', ['type'=>'鳥類']) }}">
                          <picture>
                              <source media="(min-width: 1000px)" srcset="/img/livings/pc/tori_pc.jpg">
                              <img alt="鳥類から探す" src="/img/livings/sp/tori_sp.jpg">
                          </picture>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('parks.search_by_plant_and_animal', ['type'=>'昆虫']) }}">
                          <picture>
                              <source media="(min-width: 1000px)" srcset="/img/livings/pc/mushi_pc.jpg">
                              <img alt="昆虫から探す" src="/img/livings/sp/mushi_sp.jpg">
                          </picture>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('parks.search_by_plant_and_animal', ['type'=>'植物']) }}">
                          <picture>
                              <source media="(min-width: 1000px)" srcset="/img/livings/pc/kusa_pc.jpg">
                              <img alt="植物から探す" src="/img/livings/sp/kusa_sp.jpg">
                          </picture>
                      </a>
                  </li>
              </ul>
          </div><!-- id="livings_area" -->
      </div><!-- id="inner_section_living_area" -->
    </section><!-- id="outer_section_livings_area" -->
  @endif

@if (!$parks->isEmpty())
<section id="section_catalog_result">
  <div id="catalog_result">
    <h2>検索結果一覧</h2>
    <dl>
      <dt>特徴</dt>
      <dd>{{ request()->tag }}</dd>
    </dl>
  </div><!-- catalog_result -->
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
</section><!-- section_catalog_result -->
@endif


@endsection

@section('script')
<script type="module">
$(function(){
  if ($('.catalog_ex_item').length) {
    $("html,body").animate({scrollTop:$('#catalog_result').offset().top - 60});
  }
})
</script>
@endsection