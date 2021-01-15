@extends('layouts.base')

@section('description', '公園を地図から探したり、現在地から探したり、特徴から探したり、動植物から探したり、地名から探したりできるポータルサイトです。好きな公園を見つけてください。公園に詳しくなれる公園なるほど情報も用意しています。')

@section('title', '公園ポータル')

@section('content')

<section id="section_main_image_area">
  <div id="main_image_area">
  </div><!--  main_image_area -->
</section><!--  section_main_image_area -->


<section id="section_search_area" class="scrol_shift">
  <div id="search_area">
    <h2>好きな公園見つかる</h2>

    <ul id="simple_search">
      <div class="search_card">
        <a href="{{route('parks.search_map')}}">
          <li>
            <img alt="地図から探します" src="../img/map_book_chizuchou/drawable-mdpi/map_book_chizuchou.png">
            <div class="search_card_title">地図から<span>探す</span></div>
          </li>
        </a>
      </div>

      <div class="search_card">
        <a href="{{route('parks.search_by_location')}}">
          <li>
            <img alt="現在地情報から探します" src="../img/walking2_man/drawable-mdpi/walking2_man.png">
            <div class="search_card_title">現在地から<span>探す</span></div>
          </li>
        </a>
      </div>

      <div class="search_card">
        <a href="{{route('parks.search')}}">
          <li>
            <img alt="公園の特徴から探します" src="../img/jungle_jim_kids/drawable-mdpi/jungle_jim_kids.png">
            <div class="search_card_title">特徴から<span>探す</span></div>
          </li>
        </a>
      </div>

      <div class="search_card">
        <a href="{{route('parks.search_by_plant_and_animal')}}">
          <li>
            <img alt="生息する動植物から探します" src="../img/bird_kojukei/drawable-mdpi/bird_kojukei.png">
            <div class="search_card_title">動植物から<span>探す</span></div>
          </li>
        </a>
      </div>
    </ul><!-- simple_search -->

    <!-- 検索バー -->
    <div id="form1_area">
      <form id="form1" action="{{ route('parks.search') }}" method="GET">
        <input id="sbox1" name="search" type="search" maxlength="255" placeholder="地名などを入力" />
        <input type="hidden" name="area" value="全て">
        <!--<input id="sbtn1" type="submit" value="検索" /> -->
      </form>
    </div><!-- form1_area -->
  </div><!-- search_area -->
</section><!-- section_search_area -->

<section id="section_infomation_area" class="scrol_shift">
  <div id="infomation">
    <h2><a href="{{ route('root.list') }}">公園なるほど情報</a></h2>
    <ul>
      @foreach ($articles as $article)
        <a href="{{ route('root.show', ['article'=>$article]) }}">
          <li id="infomation_{{ $loop->iteration }}">
            @if(mb_strlen($article->title) > 13)
              <span>{{mb_substr($article->title, 0, 13). '…'}}</span>
            @else
              <span>{{ $article->title }}</span>
            @endif
          </li>
        </a>
        <style>
          #infomation_{{ $loop->iteration }} {
            background-image: url("/storage/{{$article->image_path}}");
            background-repeat: no-repeat;
            background-size: 7rem;
          }
        </style>
      @endforeach
    </ul>
  </div><!-- infomation -->
</section>

<section id="section_side_note_area" class="scrol_shift">
  <ul id="side_note">
    <a href="#"><li><span>利用規約</span></li></a>
    <a href="#"><li><span>広告掲載について</span></li></a>
    <a href="{{ route('inquiries.create') }}"><li><span>お問い合わせ</span></li></a>
    <a href="#"><li><span>プライバシーポリシー</span></li></a>
  </ul>
</section><!-- section_side_note_area -->
@endsection
