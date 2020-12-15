
@extends('layouts.base')
@section('title', '公園検索')

@section('content')
<form action="{{route('parks.search')}}" method="get" class="mb-5">
  <section id="section_narrow_search_area">  
    <div id="narrow_search_area">
      <!-- re_search_featureは「特徴から探す」search_feature.htmlの中にあるものと同じ -->
      <div id="re_search_feature">
        <!-- 「地域」を選ぶドロップダウン -->
        <div id="local_select">
          <span>地域</span>
          <div class="cp_ipselect cp_sl01">
          <select name="area" required>
            <option value="" hidden>地域を選択してください</option>
            <option value="1">福岡</option>
            <option value="2">北九州</option>
            <option value="3">久留米</option>
            <option value="4">筑紫</option>
            <option value="5">京築</option>
            <option value="6">有明</option>
          </select>
          </div><!-- cp_ipselect cp_sl01 -->
        </div><!-- local_select -->
      
        <!-- #largeulは大きなチェックボックス群を持つ -->
        <ul id="largeul">
          <div><!-- 行のdiv -->
            <li id="largeul_li_a">
              <!-- 「基本施設」チェック群 -->
              <div id="input-01" class="check_card">
                <div class="all-ck">
                  <input type="checkbox" name="基本施設" value="1" id="ck-01-all">
                  <label for="ck-01-all">基本施設</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input {{$is_toilet == '1' ? 'checked' : ''}} type="checkbox" name="is_toilet" value="1" id="ck-01-01">
                    <label for="ck-01-01">トイレ</label>
                  </li>
                  <li>
                    <input {{$is_management_room == '1' ? 'checked' : ''}} type="checkbox" name="is_management_room" value="1" id="ck-01-02">
                    <label for="ck-01-02">管理室</label>
                  </li>
                  <li>
                    <input {{$is_store == '1' ? 'checked' : ''}} type="checkbox" name="is_store" value="1" id="ck-01-03">
                    <label for="ck-01-03">売店</label>
                  </li>
                  <li>
                    <input {{$is_parking == '1' ? 'checked' : ''}} type="checkbox" name="is_parking" value="1" id="ck-01-04">
                    <label for="ck-01-04">駐車場</label>
                  </li>
                </ul>
              </div><!-- input-01 -->
          
              <!-- 「こども」チェック群 -->
              <div id="input-02" class="check_card">
                <div class="all-ck">
                  <input type="checkbox" name="こども" value="1" id="ck-02-all">
                  <label for="ck-02-all">こども</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input {{$is_diaper == '1' ? 'checked' : ''}} type="checkbox" name="is_diaper" value="1" id="ck-02-01">
                    <label for="ck-02-01">おむつ</label>
                  </li>
                  <li>
                    <input {{$is_playing_equipment == '1' ? 'checked' : ''}} type="checkbox" name="is_playing_equipment" value="1" id="ck-02-02">
                    <label for="ck-02-02">遊具</label>
                  </li>
                  <li>
                    <input {{$is_playing_with_sand == '1' ? 'checked' : ''}} type="checkbox" name="is_playing_with_sand" value="1" id="ck-02-03">
                    <label for="ck-02-03">砂遊び</label>
                  </li>
                  <li>
                    <input {{$is_playing_in_water == '1' ? 'checked' : ''}} type="checkbox" name="is_playing_in_water" value="1" id="ck-02-04">
                    <label for="ck-02-04">水遊び</label>
                  </li>
                </ul><!-- class="ck-list" -->
              </div><!-- input-02 -->
          
              <!-- 「自然」チェック群 -->
              <div id="input-03" class="check_card">
                <div class="all-ck">
                  <input type="checkbox" name="自然" value="1" id="ck-03-all">
                  <label for="ck-03-all">自然</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input {{$is_river == '1' ? 'checked' : ''}} type="checkbox" name="is_river" value="1" id="ck-03-01">
                    <label for="ck-03-01">川・池</label>
                  </li>
                  <li>
                    <input {{$is_flower_bed == '1' ? 'checked' : ''}} type="checkbox" name="is_flower_bed" value="1" id="ck-03-02">
                    <label for="ck-03-02">花壇</label>
                  </li>
                  <li>
                    <input {{$is_cherry_blossom == '1' ? 'checked' : ''}} type="checkbox" name="is_cherry_blossom" value="1" id="ck-03-03">
                    <label for="ck-03-03">桜</label>
                  </li>
                  <li>
                    <input {{$is_promenade == '1' ? 'checked' : ''}} type="checkbox" name="is_promenade" value="1" id="ck-03-04">
                    <label for="ck-03-04">遊歩道</label>
                  </li>
                </ul><!-- class="ck-list" -->
              </div><!-- input-03 -->
            </li><!-- largeul_li_a -->
          </div><!-- 行のdiv -->
      
      
          <div><!-- 行のdiv -->
            <li id="largeul_li_b">
              <!-- 「運動」チェック群 -->
              <div id="input-04" class="check_card">
                <div class="all-ck">
                  <input type="checkbox" name="運動" value="1" id="ck-04-all">
                  <label for="ck-04-all">運動</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input {{$is_running == '1' ? 'checked' : ''}} type="checkbox" name="is_running" value="1" id="ck-04-01">
                    <label for="ck-04-01">ランニング</label>
                  </li>
                  <li>
                    <input {{$is_baseball == '1' ? 'checked' : ''}} type="checkbox" name="is_baseball" value="1" id="ck-04-02">
                    <label for="ck-04-02">野球場</label>
                  </li>
                  <li>
                    <input {{$is_tennis == '1' ? 'checked' : ''}} type="checkbox" name="is_tennis" value="1" id="ck-04-03">
                    <label for="ck-04-03">テニス</label>
                  </li>
                  <li>
                    <input {{$is_gym == '1' ? 'checked' : ''}} type="checkbox" name="is_gym" value="1" id="ck-04-04">
                    <label for="ck-04-04">体育館</label>
                  </li>
                  <li>
                    <input {{$is_multipurpose_ground == '1' ? 'checked' : ''}} type="checkbox" name="is_multipurpose_ground" value="1" id="ck-04-05">
                    <label for="ck-04-05">多目的グラウンド</label>
                  </li>
                </ul><!-- class="ck-list" -->
              </div><!-- input-04 -->
          
              <!-- 「アウトドア」チェック群 -->
              <div id="input-05" class="check_card">
                <div class="all-ck">
                  <input type="checkbox" name="ç" value="1" id="ck-05-all">
                  <label for="ck-05-all">アウトドア</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input {{$is_accommodation == '1' ? 'checked' : ''}} type="checkbox" name="is_accommodation" value="1" id="ck-05-01">
                    <label for="ck-05-01">宿泊施設</label>
                  </li>
                  <li>
                    <input {{$is_campground == '1' ? 'checked' : ''}} type="checkbox" name="is_campground" value="1" id="ck-05-02">
                    <label for="ck-05-02">キャンプ場</label>
                  </li>
                  <li>
                    <input {{$is_kitchen == '1' ? 'checked' : ''}} type="checkbox" name="is_kitchen" value="1" id="ck-05-03">
                    <label for="ck-05-03">炊事場</label>
                  </li>
                  <li>
                    <input {{$is_fishing == '1' ? 'checked' : ''}} type="checkbox" name="is_fishing" value="1" id="ck-05-04">
                    <label for="ck-05-04">フィッシング</label>
                  </li>
                </ul>
              </div><!-- input-05 -->
          
              <div id="input-06" class="check_card">
                <div class="all-ck">
                  <input type="checkbox" name="バリアフリー" value="1" id="ck-06-all">
                  <label for="ck-06-all">バリアフリー</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input {{$is_multipurpose_toilet == '1' ? 'checked' : ''}} type="checkbox" name="is_multipurpose_toilet" value="1" id="ck-06-01">
                    <label for="ck-06-01">多目的トイレ</label>
                  </li>
                  <li>
                    <input {{$is_wheelchair_accessible == '1' ? 'checked' : ''}} type="checkbox" name="is_wheelchair_accessible" value="1" id="ck-06-02">
                    <label for="ck-06-02">車椅子対応</label>
                  </li>
                </ul><!-- class="ck-list" -->
              </div><!-- input-06 -->
            </li><!-- largeul_li_b -->
          </div><!-- 行のdiv -->
      
      
      
          <div><!-- 行のdiv -->
            <li id="largeul_li_c">
              <!-- 「その他」チェック群 -->
              <div id="input-07" class="check_card">
                <div class="all-ck">
                  <input type="checkbox" name="その他" value="1" id="ck-07-all">
                  <label for="ck-07-all">その他</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input {{$is_dog_run == '1' ? 'checked' : ''}} type="checkbox" name="is_dog_run" value="1" id="ck-07-01">
                    <label for="ck-07-01">ドッグラン</label>
                  </li>
                  <li>
                    <input {{$is_boat == '1' ? 'checked' : ''}} type="checkbox" name="is_boat" value="1" id="ck-07-02">
                    <label for="ck-07-02">ボート</label>
                  </li>
                  <li>
                    <input {{$is_art_museum == '1' ? 'checked' : ''}} type="checkbox" name="is_art_museum" value="1" id="ck-07-03">
                    <label for="ck-07-03">美術館</label>
                  </li>
                  <li>
                    <input {{$is_reference_library == '1' ? 'checked' : ''}} type="checkbox" name="is_reference_library" value="1" id="ck-07-04">
                    <label for="ck-07-04">資料館</label>
                  </li>
                </ul><!-- class="ck-list" -->
              </div><!-- input-07 -->
            </li><!-- largeul_li_c -->
          </div><!-- 行のdiv -->
        </ul><!-- largeul -->
      
      
        <div id="re_choice_button">
          <button type="submit">選んだ条件で検索</button>
        </div>
      </div><!--  re_search_feature -->
    </div><!-- narrow_search_area -->
  </section>
  
  @if (!$parks->isEmpty())
    <section id="section_catalog_result">
      <div id="catalog_result">
      <h2>検索結果一覧</h2>
      <dl><dt>地域</dt><dd>福岡市東区</dd></dl>
      <dl><dt>特徴</dt><dd>トイレ</dd><dd>野球場</dd><dd>野球場</dd></dl>
      </div><!-- catalog_result -->
      <section id="section_catalog_ex">
        <div id="catalog_ex">
          @foreach ($parks as $park)
            <div class="catalog_ex_item">
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
                  <a href="result_deateails_feature.html">
                  <img src="../img/gannosu/drawable-mdpi/gannosu.png" alt='クリックで公園の詳細情報'>
                  </a>
                </div><!-- catalog_ex_item_inner_picture -->
                <div class="catalog_ex_item_inner_tag_area">
                  <span class="catalog_ex_item_inner_tag">タグ</span>
                  <span class="catalog_ex_item_inner_tag">トイレ</span>
                  <span class="catalog_ex_item_inner_tag">ああああああ</span>
                  <div class="catalog_ex_item_inner_baloon">
                    <span>100</span>
                  </div>
                </div><!-- catalog_ex_item_inner_tag_area1 -->
                <div class="catalog_ex_item_inner_anker">
                  <a href="result_deateails_feature.html">&gt;</a>
                </div><!-- catalog_ex_item_inner_anker1  -->
              </div><!-- catalog_ex_item_inner1 -->
            </div><!--  catalog_ex_item1 -->
          @endforeach
        </div><!-- catalog_ex -->
        
      </section><!-- section_catalog_ex -->
    </section><!-- section_catalog_result -->
    {{ $parks->appends(request()->input())->links() }}
  @else
    <section id="section_catalog_result">
      <div id="catalog_result">
        <h2>検索結果一覧</h2>
        <dl><dt>地域</dt><dd>福岡市東区</dd></dl>
        <dl><dt>特徴</dt><dd>トイレ</dd><dd>野球場</dd><dd>野球場</dd></dl>
      </div><!-- catalog_result -->
      <div>
        検索結果は有りません。
      </div>
    </section>
  @endif
</form>


@endsection