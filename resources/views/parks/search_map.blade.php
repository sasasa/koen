
@extends('layouts.base')
@section('title', '公園を地図から探す')

@section('content')
<form action="" method="get" class="form mb-5">
  <section id="section_narrow_search_area">  
    <div id="narrow_search_area">
      <!-- re_search_featureは「特徴から探す」search_feature.htmlの中にあるものと同じ -->
      <div id="re_search_feature">
        <!-- 「地域」を選ぶドロップダウン -->
        <div id="local_select">
          <span>地域</span>
          <div class="cp_ipselect cp_sl01">
          <select name="area" required>
            <option value="">地域を選択してください</option>
            <option value="福岡市">福岡市</option>
            <option value="北九州">北九州</option>
            <option value="久留米">久留米</option>
            <option value="筑紫">筑紫</option>
            <option value="京築">京築</option>
            <option value="有明">有明</option>
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
                  <input type="checkbox" name="is_basic_facility" value="1" id="ck-01-all">
                  <label for="ck-01-all">基本施設</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input type="checkbox" name="is_toilet" value="1" id="ck-01-01">
                    <label for="ck-01-01">トイレ</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_management_room" value="1" id="ck-01-02">
                    <label for="ck-01-02">管理室</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_store" value="1" id="ck-01-03">
                    <label for="ck-01-03">売店</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_parking" value="1" id="ck-01-04">
                    <label for="ck-01-04">駐車場</label>
                  </li>
                </ul>
              </div><!-- input-01 -->
          
              <!-- 「こども」チェック群 -->
              <div id="input-02" class="check_card">
                <div class="all-ck">
                  <input type="checkbox" name="is_child" value="1" id="ck-02-all">
                  <label for="ck-02-all">こども</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input type="checkbox" name="is_diaper" value="1" id="ck-02-01">
                    <label for="ck-02-01">おむつ</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_playing_equipment" value="1" id="ck-02-02">
                    <label for="ck-02-02">遊具</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_playing_with_sand" value="1" id="ck-02-03">
                    <label for="ck-02-03">砂遊び</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_playing_in_water" value="1" id="ck-02-04">
                    <label for="ck-02-04">水遊び</label>
                  </li>
                </ul><!-- class="ck-list" -->
              </div><!-- input-02 -->
          
              <!-- 「自然」チェック群 -->
              <div id="input-03" class="check_card">
                <div class="all-ck">
                  <input type="checkbox" name="is_nature" value="1" id="ck-03-all">
                  <label for="ck-03-all">自然</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input type="checkbox" name="is_river" value="1" id="ck-03-01">
                    <label for="ck-03-01">川・池</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_flower_bed" value="1" id="ck-03-02">
                    <label for="ck-03-02">花壇</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_cherry_blossom" value="1" id="ck-03-03">
                    <label for="ck-03-03">桜</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_promenade" value="1" id="ck-03-04">
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
                  <input type="checkbox" name="is_exercise" value="1" id="ck-04-all">
                  <label for="ck-04-all">運動</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input type="checkbox" name="is_running" value="1" id="ck-04-01">
                    <label for="ck-04-01">ランニング</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_baseball" value="1" id="ck-04-02">
                    <label for="ck-04-02">野球場</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_tennis" value="1" id="ck-04-03">
                    <label for="ck-04-03">テニス</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_gym" value="1" id="ck-04-04">
                    <label for="ck-04-04">体育館</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_multipurpose_ground" value="1" id="ck-04-05">
                    <label for="ck-04-05">多目的グラウンド</label>
                  </li>
                </ul><!-- class="ck-list" -->
              </div><!-- input-04 -->
          
              <!-- 「アウトドア」チェック群 -->
              <div id="input-05" class="check_card">
                <div class="all-ck">
                  <input type="checkbox" name="is_outdoor" value="1" id="ck-05-all">
                  <label for="ck-05-all">アウトドア</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input type="checkbox" name="is_accommodation" value="1" id="ck-05-01">
                    <label for="ck-05-01">宿泊施設</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_campground" value="1" id="ck-05-02">
                    <label for="ck-05-02">キャンプ場</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_kitchen" value="1" id="ck-05-03">
                    <label for="ck-05-03">炊事場</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_fishing" value="1" id="ck-05-04">
                    <label for="ck-05-04">フィッシング</label>
                  </li>
                </ul>
              </div><!-- input-05 -->
          
              <div id="input-06" class="check_card">
                <div class="all-ck">
                  <input type="checkbox" name="is_barrier_free" value="1" id="ck-06-all">
                  <label for="ck-06-all">バリアフリー</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input type="checkbox" name="is_multipurpose_toilet" value="1" id="ck-06-01">
                    <label for="ck-06-01">多目的トイレ</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_wheelchair_accessible" value="1" id="ck-06-02">
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
                  <input type="checkbox" name="is_others" value="1" id="ck-07-all">
                  <label for="ck-07-all">その他</label>
                </div><!-- class="all-ck" -->
                <ul class="ck-list">
                  <li>
                    <input type="checkbox" name="is_dog_run" value="1" id="ck-07-01">
                    <label for="ck-07-01">ドッグラン</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_boat" value="1" id="ck-07-02">
                    <label for="ck-07-02">ボート</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_art_museum" value="1" id="ck-07-03">
                    <label for="ck-07-03">美術館</label>
                  </li>
                  <li>
                    <input type="checkbox" name="is_reference_library" value="1" id="ck-07-04">
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

  <section id="section_map">
    <div id="map_canvas">
    </div><!-- js-map -->
  </section><!-- section_map -->
</form>

@endsection


@section('script')
<script>
let map = null;
let markerList = [];
let infoWindowList = [];
let currentInfoWindow = null;

let mapOptions = {
  center: {
    lat: 33.590146,
    lng: 130.423539,
  },
  zoom: 15
};
// マーカーの定義
let markerData = [
  /*
    {
        park_name: '',
        address: '',
        latitude: 0,
        longitude: 0,
        map: '<strong class="map-pin"></strong>',
        // icon: park,
    },
  */
];

function initMap() { 
  createMap()
}
function createMap() {
  // 地図の作成
  map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
  
  // マーカー毎の処理
  for (var i = 0; i < markerData.length; i++) {
      // マーカーオブジェクトを作る
      // 先に座標オブジェクトを作って当てはめる
      let markerLatLng = new google.maps.LatLng({
        lat: markerData[i]['latitude'],
        lng: markerData[i]['longitude']
      });
      markerList[i] = new google.maps.Marker({ // マーカーの追加
          position: markerLatLng, // 地図内のマーカーを立てる位置を指定
          map: map // マーカーを立てる地図を指定
      });

      // 吹き出しオブジェクトを作る
      infoWindowList[i] = new google.maps.InfoWindow({
        content: markerData[i]['map'] // 吹き出しに表示する内容
      });
      // マーカーにクリックイベントを追加
      markerEvent(i);
  }
  // Google Maps Platformの「チュートリアル：マーカーのクラスタリング」からそのまま貼る`
  new MarkerClusterer(map, markerList, {
    imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
  });
}
// マーカーにクリックイベントを追加する関数
function markerEvent(i) {
  markerList[i].addListener('click', function() { // マーカーをクリックしたとき
    if (currentInfoWindow) {
      currentInfoWindow.close();
    }
    infoWindowList[i].open(map, markerList[i]); // 吹き出しの表示
    currentInfoWindow = infoWindowList[i];
  });
}
</script>
<script type="module">
$(function() {
    $('.form').submit(function() {
      axios
          .post("{{route('api.parks.search_from_map')}}", {
            'area': $('select[name="area"]').val(),
            'is_toilet': $('input[name="is_toilet"]').prop('checked') ? '1' : null,
            'is_management_room': $('input[name="is_management_room"]').prop('checked') ? '1': null,
            'is_store': $('input[name="is_store"]').prop('checked') ? '1': null,
            'is_parking': $('input[name="is_parking"]').prop('checked') ? '1': null,
            'is_diaper': $('input[name="is_diaper"]').prop('checked') ? '1': null,
            'is_playing_equipment': $('input[name="is_playing_equipment"]').prop('checked') ? '1': null,
            'is_playing_with_sand': $('input[name="is_playing_with_sand"]').prop('checked') ? '1': null,
            'is_playing_in_water': $('input[name="is_playing_in_water"]').prop('checked') ? '1': null,
            'is_river': $('input[name="is_river"]').prop('checked') ? '1': null,
            'is_flower_bed': $('input[name="is_flower_bed"]').prop('checked') ? '1': null,
            'is_cherry_blossom': $('input[name="is_cherry_blossom"]').prop('checked') ? '1': null,
            'is_promenade': $('input[name="is_promenade"]').prop('checked') ? '1': null,
            'is_running': $('input[name="is_running"]').prop('checked') ? '1': null,
            'is_baseball': $('input[name="is_baseball"]').prop('checked') ? '1': null,
            'is_tennis': $('input[name="is_tennis"]').prop('checked') ? '1': null,
            'is_gym': $('input[name="is_gym"]').prop('checked') ? '1': null,
            'is_multipurpose_ground': $('input[name="is_multipurpose_ground"]').prop('checked') ? '1': null,
            'is_accommodation': $('input[name="is_accommodation"]').prop('checked') ? '1': null,
            'is_campground': $('input[name="is_campground"]').prop('checked') ? '1': null,
            'is_kitchen': $('input[name="is_kitchen"]').prop('checked') ? '1': null,
            'is_fishing': $('input[name="is_fishing"]').prop('checked') ? '1': null,
            'is_multipurpose_toilet': $('input[name="is_multipurpose_toilet"]').prop('checked') ? '1': null,
            'is_wheelchair_accessible': $('input[name="is_wheelchair_accessible"]').prop('checked') ? '1': null,
            'is_dog_run': $('input[name="is_dog_run"]').prop('checked') ? '1': null,
            'is_boat': $('input[name="is_boat"]').prop('checked') ? '1': null,
            'is_art_museum': $('input[name="is_art_museum"]').prop('checked') ? '1': null,
            'is_reference_library': $('input[name="is_reference_library"]').prop('checked') ? '1': null,
          })
          .then((response) => {
            markerData = response.data.parks
            mapOptions = response.data.mapOptions
            markerList = [];
            infoWindowList = [];
            currentInfoWindow = null;
            // alert(JSON.stringify(response.data.req))
            createMap();
            $("html, body").animate({scrollTop: $('#re_choice_button').offset().top-50}, 400, "swing")
          })
          .catch((error) => {
              console.log(error);
          })
      return false;
    });
});



</script>
@endsection