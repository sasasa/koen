@extends('layouts.base')

@section('description', '現在地から公園を検索することができます。現在地情報を利用することを許可していただくと近くにある公園がマップ上に表示されます。')

@section('title', '公園を現在地から探す')

@section('content')
<section id="section_map">
    <div id="map_canvas">
    </div>
</section>
@endsection

@section('script')
<script>
// マップを形成する変数群
let map;
let markerList = [];
let infoWindowList = [];
let currentInfoWindow = null;

// マーカーの定義
let markerData = [
    {
        park_name: '',
        address: '',
        latitude: 0,
        longitude: 0,
        map: '<strong class="map-pin"></strong>',
        // icon: park,
    },
];


// 現在地取得処理
function getPosition() {
  // 現在地を取得
  navigator.geolocation.getCurrentPosition(
    // 取得成功した場合
    function(position) {

        axios
          .post("{{route('api.parks.search_by_location')}}", {
            latitude: position.coords.latitude,
            longitude: position.coords.longitude,
          })
          .then((response) => {
            markerData = response.data.parks
            createMap();
          })
          .catch((error) => {
              console.log(error);
          })

        function createMap() {
          // 地図の初期値
          const mapOptions = {
              //博多駅
              center: {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              }, // 地図の中心を指定
              zoom: 15 // 地図のズームを指定
          };

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
    },
    // 取得失敗した場合
    function(error) {
      switch(error.code) {
        case 1: //PERMISSION_DENIED
          alert("位置情報の利用が許可されていません");
          break;
        case 2: //POSITION_UNAVAILABLE
          alert("現在位置が取得できませんでした");
          break;
        case 3: //TIMEOUT
          alert("タイムアウトになりました");
          break;
        default:
          alert("その他のエラー(エラーコード:"+error.code+")");
          break;
      }
    }
  );
}

// APIに引き渡す関数
function initMap() {
  getPosition()
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
@endsection