@extends('layouts.base')
@section('title', $park->park_name)

@section('content')
<section id="section_result_expression_area">
  <article id="result_expression_area">
    <h2>{{$park->park_name}}</h2>

    <div id="result_expression_area_image_area">
      <img src="/storage/{{$park->image_path}}" alt="{{$park->park_name}}">
    </div>

    <div id="result_expression">
      <div id="expression">
        <input id="TAB-01" type="radio" value="checked" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-01">特徴</label>
        <div class="appeal">
          <div id="feat-01" class="feat_box">
            @if(!empty($park->getBasicFacilityNames()))
              <h3>基本施設</h3>
              <ul>
                @foreach ($park->getBasicFacilityNames() as $name)
                  <li>{{$name}}</li>
                @endforeach
              </ul>
            @endif
          </div><!-- excep-01 -->

          <div id="feat-02" class="feat_box">
            @if(!empty($park->getChildNames()))
              <h3>こども</h3>
              <ul>
                @foreach ($park->getChildNames() as $name)
                  <li>{{$name}}</li>
                @endforeach
              </ul>
            @endif
          </div><!-- excep-02 -->

          <div id="feat-03" class="feat_box">
            @if(!empty($park->getNatureNames()))
              <h3>自然</h3>
              <ul>
                @foreach ($park->getNatureNames() as $name)
                  <li>{{$name}}</li>
                @endforeach
              </ul>
            @endif
          </div><!-- excep-03 -->

          <div id="feat-04" class="feat_box">
            @if(!empty($park->getExerciseNames()))
              <h3>運動</h3>
              <ul>
                @foreach ($park->getExerciseNames() as $name)
                  <li>{{$name}}</li>
                @endforeach
              </ul>
            @endif
          </div><!-- excep-04 -->

          <div id="feat-05" class="feat_box">
            @if(!empty($park->getOutdoorNames()))
              <h3>アウトドア</h3>
              <ul>
                @foreach ($park->getOutdoorNames() as $name)
                  <li>{{$name}}</li>
                @endforeach
              </ul>
            @endif
          </div><!-- excep-05 -->

          <div id="feat-06" class="feat_box">
            @if(!empty($park->getBarrierFreeNames()))
              <h3>バリアフリー</h3>
              <ul>
                @foreach ($park->getBarrierFreeNames() as $name)
                  <li>{{$name}}</li>
                @endforeach
              </ul>
            @endif
          </div><!-- excep-06 -->

          <div id="feat-07" class="feat_box">
            @if(!empty($park->getOthersNames()))
              <h3>その他</h3>
              <ul>
                @foreach ($park->getOthersNames() as $name)
                  <li>{{$name}}</li>
                @endforeach
              </ul>
            @endif
          </div><!-- excep-07 -->
          <div id="feat-08" class="feat_box">
              <h3>公園の特徴を教えてください！</h3>
              <p>
                <a href="{{route('parks.user_edit', ['park'=>$park])}}">公園の特徴を入力する</a>
              </p>
          </div><!-- excep-08 -->
        </div>

        <input id="TAB-02" type="radio" value="checked" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-02">写真</label>
        <div class="appeal">
          <div id="natr">
            <div id="insect">
              <h3>昆虫</h3>
              <ul>
                @foreach ($insect_photos as $photo)
                  <li class="natr_card">
                    <div class="natr_image_include">
                      <a href="{{route('parks.photos.show', ['park'=>$park,'photo'=>$photo])}}">
                        <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
                      </a>
                    </div>
                    <span>{{$photo->comment}}</span>
                  </li>
                @endforeach
              </ul>
              昆虫の画像をアップロードしよう！
              <form action="{{route('parks.photos.store', ['park' => $park])}}" method="POST" class="upload-form" enctype='multipart/form-data'>
                @csrf
                <div class="upload-form__field">
                  <input type="file" name="upfile" accept="image/*" required>
                  @error('upfile')
                  <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="upload-form__field">
                  <input type="text" name="comment" required>
                  @error('comment')
                  <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <input type="hidden" name="park_id" value="{{$park->id}}">
                <input type="hidden" name="photo_type" value="昆虫">
                <input type="submit" value="アップロード">
              </form>
            </div><!-- insect -->
            <div id="bird">
              <h3>鳥</h3>
              <ul>
                @foreach ($bird_photos as $photo)
                  <li class="natr_card">
                    <div class="natr_image_include">
                      <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
                    </div>
                    <span>{{$photo->comment}}</span>
                  </li>
                @endforeach
              </ul>
              鳥の画像をアップロードしよう！
              <form action="{{route('parks.photos.store', ['park' => $park])}}" method="POST" class="upload-form" enctype='multipart/form-data'>
                @csrf
                <div class="upload-form__field">
                  <input type="file" name="upfile" accept="image/*" required>
                  @error('upfile')
                  <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="upload-form__field">
                  <input type="text" name="comment" required>
                  @error('comment')
                  <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <input type="hidden" name="park_id" value="{{$park->id}}">
                <input type="hidden" name="photo_type" value="鳥">
                <input type="submit" value="アップロード">
              </form>
            </div><!-- bird -->
            <div id="plant">
              <h3>植物</h3>
              <ul>
                @foreach ($plant_photos as $photo)
                  <li class="natr_card">
                    <div class="natr_image_include">
                      <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
                    </div>
                    <span>{{$photo->comment}}</span>
                  </li>
                @endforeach
              </ul>
              植物の画像をアップロードしよう！
              <form action="{{route('parks.photos.store', ['park' => $park])}}" method="POST" class="upload-form" enctype='multipart/form-data'>
                @csrf
                <div class="upload-form__field">
                  <input type="file" name="upfile" accept="image/*" required>
                  @error('upfile')
                  <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="upload-form__field">
                  <input type="text" name="comment" required>
                  @error('comment')
                  <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <input type="hidden" name="park_id" value="{{$park->id}}">
                <input type="hidden" name="photo_type" value="植物">
                <input type="submit" value="アップロード">
              </form>
            </div><!-- 植木 -->
          </div><!-- natr -->
        </div>

        <input id="TAB-03" type="radio" value="checked" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-03">概要情報</label>
        <div class="appeal">
          <div id="overview"><!-- overviewは「マップ」と「基本情報」を内包する -->
            <div id="overview_map">
              <h3>マップ</h3>
              <div id="overview_map_exp">
              </div><!-- overview_map_exp -->
            </div><!-- overview_map -->
            <div id="overview_infomation">
              <h3>基本情報</h3>
                <table id="overview_infomation_details">
                  <tr>
                    <th>所在地</th>
                    <td>{{$park->address}}</td>
                  </tr>
                  <tr>
                    <th>公園種別</th>
                    <td>{{$park->park_type}}</td>
                  </tr>
                  <tr>
                    <th>面積</th>
                    <td>{{$park->surface_area}}m2</td>
                  </tr>
                  <tr>
                    <th>管理</th>
                    <td>{{$park->management}}</td>
                  </tr>
                  <tr>
                    <th>HP</th>
                    <td>{{$park->url}}</td>
                  </tr>
                </table><!-- overview_infomation_details -->
            </div><!-- overview_infomation -->
          </div><!-- overview -->
        </div><!-- appeal -->

        <input id="TAB-04" type="radio" value="checked" name="TAB" class="tab-switch"><label class="tab-label" for="TAB-04">口コミ</label>
        <div class="appeal">
          <div>
            @if ($reviews->isEmpty())
              <h3>投稿がありません。</h3>
            @else
              @foreach ($reviews as $review)
                <article>
                  <h3>{{$review->title}}</h3>
                  <div>{{$review->ageJp}} {{$review->genderJp}}　{{$review->created_at->format('Y年m月')}}</div>
                  <div>
                    {!! nl2br(e($review->body)) !!}
                  </div>
                </article>
              @endforeach
            @endif
          </div>
          <form method="POST" action="{{route('parks.reviews.store', ['park'=>$park])}}" class="review">
            @csrf
            <div class="form-group">
              <label for="title">{{__('validation.attributes.title')}}:</label>
              <input value="{{old('title')}}" type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title">
              @error('title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="body">{{__('validation.attributes.body')}}:</label>
              <textarea rows="4" id="body" class="form-control @error('body') is-invalid @enderror" name="body">{{old('body')}}</textarea>
              @error('body')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <p class="control-label"><b>{{__('validation.attributes.gender')}}</b></p>
              
              @foreach (\App\Models\Review::$genders as $key => $label)
                <div class="radio-inline">
                  <input {{old('gender') == $key ? 'checked' : ''}} type="radio" value="{{$key}}" name="gender" id="gender_{{$key}}">
                    <label for="gender_{{$key}}">{{$label}}</label>
                </div>
              @endforeach

              @error('gender')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="age">{{__('validation.attributes.age')}}:</label>
              {{ Form::select('age', \App\Models\Review::$ages, old('age'), empty($errors->first('age')) ? ['class'=>"form-control", 'id'=>'age'] : ['class'=>"form-control is-invalid", 'id'=>'age']) }}

              @error('age')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>
            <div>
              <input type="hidden" name="park_id" value="{{$park->id}}">
              <button type="submit" class="btn btn-primary">登録</button>
            </div>
          </form>
        </div><!-- appeal -->
      </div>
    </div><!-- result_expression -->

  </article><!-- result_expression_area -->
</section>

@endsection

@section('script')
<script type="module">
$(function(){
  const urlHash = location.hash;
  // URLにアンカーが存在する場合
  if(urlHash){
    $(urlHash).trigger('click')
  } else {
    const hash = sessionStorage.getItem('hash');
    $(hash).trigger('click')
  }
  
  $('.tab-switch').click(function() {
    const id = $(this).attr('id')
    location.hash = '#' + id;
    sessionStorage.setItem('hash', location.hash);
  })
})
</script>
<script>
// マップを形成する変数群
let map;
let markerList = [];
let infoWindowList = [];
let currentInfoWindow = null;

// 地図の初期値
const mapOptions = { 
    //博多駅
    center: {lat: {{$park->latitude}}, lng: {{$park->longitude}}}, // 地図の中心を指定
    zoom: 15 // 地図のズームを指定
};

// マーカーの定義
const markerData = [ 
    {
        //明治公園
        name: '{{$park->park_name}}',
        lat: {{$park->latitude}},
        lng: {{$park->longitude}},
        info: '<strong style="color:green;">{{$park->park_name}}</strong>',
        // icon: park,
    },
];

// APIに引き渡す関数
function initMap() {
    // 地図の作成
    map = new google.maps.Map(document.getElementById('overview_map_exp'), mapOptions);

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