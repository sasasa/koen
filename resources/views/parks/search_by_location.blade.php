@extends('layouts.base')
@section('title', '公園を現在地から探す')

@section('content')
<section id="section_map">
    <div id="map_canvas">
    </div><!-- js-map -->
</section><!-- section_map -->

@endsection

@section('script')
<script>
if (navigator.geolocation) {
  alert("この端末では位置情報が取得できます");
} else {
  alert("この端末では位置情報が取得できません");
}
let latitude = null;
let longitude = null;
// 現在地取得処理
function getPosition() {
  // 現在地を取得
  navigator.geolocation.getCurrentPosition(
    // 取得成功した場合
    function(position) {
        alert("緯度:"+position.coords.latitude+",経度"+position.coords.longitude);
        latitude = position.coords.latitude;
        longitude = position.coords.longitude;
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
getPosition()

// マップを形成する変数群
let map;
let markerList = [];
let infoWindowList = [];
let currentInfoWindow = null;

// 地図の初期値
const mapOptions = { 
    //博多駅
    center: {lat: latitude, lng: longitude}, // 地図の中心を指定
    zoom: 15 // 地図のズームを指定
};

// マーカーの定義
const markerData = [ 
    {
        //明治公園
        name: '',
        lat: 1,
        lng: 1,
        info: '<strong style="color:green;"></strong>',
        // icon: park,
    },
];

// APIに引き渡す関数
function initMap() {
    // 地図の作成
    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

    // マーカー毎の処理
    for (var i = 0; i < markerData.length; i++) {
        // マーカーオブジェクトを作る
        // 先に座標オブジェクトを作って当てはめる
        let markerLatLng = new google.maps.LatLng({
          lat: markerData[i]['lat'],
          lng: markerData[i]['lng']
        });
        markerList[i] = new google.maps.Marker({ // マーカーの追加
            position: markerLatLng, // 地図内のマーカーを立てる位置を指定
            map: map // マーカーを立てる地図を指定
        });
        
        // マーカーの画像を変更（あれば）
        if (markerData[i]['icon']){
            markerList[i].setOptions({
                icon: {
                    url: markerData[i]['icon']
                }
            });
        }
        // 吹き出しオブジェクトを作る
        infoWindowList[i] = new google.maps.InfoWindow({ 
            content: markerData[i]['info'] // 吹き出しに表示する内容
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
@endsection