@extends('layouts.base')

@section('description', $park->address.'に在る'.$park->park_name.'の詳細な情報です。公園の特徴や動植物の写真や口コミ情報を見ることができます。')

@section('title', $park->park_name)

@section('content')
@if(Session::has('message'))
    <!-- モーダルウィンドウの中身 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    {{ session('message') }}
                </div>
                <div class="modal-footer text-center">
                </div>
            </div>
        </div>
    </div>
@endif

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
                      @if ($photo->comment != '')
                        <a href="{{route('parks.photos.show', ['park'=>$park,'photo'=>$photo])}}">
                          <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
                        </a>
                      @else
                        <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
                      @endif
                    </div>
                    <span>{{$photo->comment}}</span>
                  </li>
                @endforeach
              </ul>
              <div class="form-title">
                昆虫の画像をアップロードしよう！
              </div>
              <form action="{{route('parks.photos.store', ['park' => $park])}}" method="POST" class="upload-form" enctype='multipart/form-data'>
                @csrf
                <div class="upload-form__field">
                  画像：<input type="file" name="insect_upfile" accept="image/*" required>
                  @error('insect_upfile')
                  <span class="invalid insect-invalid">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="upload-form__field">
                  タグ：<input type="text" name="insect_comment" value="{{ old('insect_comment') }}" required>
                  @error('insect_comment')
                  <span class="invalid insect-invalid">
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
              <h3>鳥類</h3>
              <ul>
                @foreach ($bird_photos as $photo)
                  <li class="natr_card">
                    <div class="natr_image_include">
                      @if ($photo->comment != '')
                        <a href="{{route('parks.photos.show', ['park'=>$park,'photo'=>$photo])}}">
                          <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
                        </a>
                      @else
                        <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
                      @endif
                    </div>
                    <span>{{$photo->comment}}</span>
                  </li>
                @endforeach
              </ul>
              <div class="form-title">
              鳥類の画像をアップロードしよう！
              </div>
              <form action="{{route('parks.photos.store', ['park' => $park])}}" method="POST" class="upload-form" enctype='multipart/form-data'>
                @csrf
                <div class="upload-form__field">
                  画像：<input type="file" name="bird_upfile" accept="image/*" required>
                  @error('bird_upfile')
                  <span class="invalid bird-invalid">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="upload-form__field">
                  タグ：<input type="text" name="bird_comment" value="{{ old('bird_comment') }}" required>
                  @error('bird_comment')
                  <span class="invalid bird-invalid">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <input type="hidden" name="park_id" value="{{$park->id}}">
                <input type="hidden" name="photo_type" value="鳥類">
                <input type="submit" value="アップロード">
              </form>
            </div><!-- bird -->
            <div id="plant">
              <h3>植物</h3>
              <ul>
                @foreach ($plant_photos as $photo)
                  <li class="natr_card">
                    <div class="natr_image_include">
                      @if ($photo->comment != '')
                        <a href="{{route('parks.photos.show', ['park'=>$park,'photo'=>$photo])}}">
                          <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
                        </a>
                      @else
                        <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
                      @endif
                    </div>
                    <span>{{$photo->comment}}</span>
                  </li>
                @endforeach
              </ul>
              <div class="form-title">
              植物の画像をアップロードしよう！
              </div>
              <form action="{{route('parks.photos.store', ['park' => $park])}}" method="POST" class="upload-form" enctype='multipart/form-data'>
                @csrf
                <div class="upload-form__field">
                  画像：<input type="file" name="plant_upfile" accept="image/*" required>
                  @error('plant_upfile')
                  <span class="invalid plant-invalid">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="upload-form__field">
                  タグ：<input type="text" name="plant_comment" value="{{ old('plant_comment') }}" required>
                  @error('plant_comment')
                  <span class="invalid plant-invalid">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <input type="hidden" name="park_id" value="{{$park->id}}">
                <input type="hidden" name="photo_type" value="植物">
                <input type="submit" value="アップロード">
              </form>
            </div><!-- 植木 -->
            <div id="facility">
              <h3>施設</h3>
              <ul>
                @foreach ($facility_photos as $photo)
                  <li class="natr_card">
                    <div class="natr_image_include">
                      @if ($photo->comment != '')
                        <a href="{{route('parks.photos.show', ['park'=>$park,'photo'=>$photo])}}">
                          <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
                        </a>
                      @else
                        <img src="/storage/{{$photo->image_path}}" alt="{{$photo->comment}}">
                      @endif
                    </div>
                    <span>{{$photo->comment}}</span>
                  </li>
                @endforeach
              </ul>
              <div class="form-title">
              施設の画像をアップロードしよう！
              </div>
              <form action="{{route('parks.photos.store', ['park' => $park])}}" method="POST" class="upload-form" enctype='multipart/form-data'>
                @csrf
                <div class="upload-form__field">
                  画像：<input type="file" name="facility_upfile" accept="image/*" required>
                  @error('facility_upfile')
                  <span class="invalid facility-invalid">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="upload-form__field">
                  タグ：<input type="text" name="facility_comment" value="{{ old('facility_comment') }}" required>
                  @error('facility_comment')
                  <span class="invalid facility-invalid">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <input type="hidden" name="park_id" value="{{$park->id}}">
                <input type="hidden" name="photo_type" value="施設">
                <input type="submit" value="アップロード">
              </form>
            </div><!-- facility -->
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


        <input id="TAB-04" type="radio" value="checked" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-04">口コミ</label>
        <div class="appeal">
          <div id="wordmouth_area_inc"><!-- wordmouth_area_incは「マップ」と「基本情報」を内包し幅と高さを決める -->
            <section id="wordmouth_area">
              <a href="#message">投稿はこちら</a>

              @if ($reviews->isEmpty())
                <p class="emptybox">口コミ募集中です！</p>
              @else
                <div class="cp_box">
                  <input id="cp00" type="checkbox">
                  <div class="cp_container">
                    @foreach ($reviews as $review)
                      <article class="wordmouth">
                        <h3>{{$review->title}}</h3>
                        <ul>
                          <li>'年齢'{{$review->ageJp}}</li>
                          <li>'性別'{{$review->genderJp}}</li>
                          <li>'投稿日時'{{$review->created_at->format('Y年m月')}}</li>
                        </ul>
                        <p>
                          {!! nl2br(e($review->body)) !!}
                        </p>
                      </article>
                    @endforeach
                  </div><!-- class="cp_container" -->
                  <label for="cp00">もっと表示する</label>
                </div><!-- class="cp_box" -->
              @endif
            </section><!-- wordmouth_area -->

            <section id="form_area">
              <h3 id="message">口コミを書く</h3>
              <form method="post" action="{{route('parks.reviews.store', ['park'=>$park])}}">
                @csrf
                <p>
                  <label for="id_title">タイトル</label>
                  <span class="require">*必須</span>
                  <input value="{{old('title')}}" type="text" id="id_title" class="@error('title') is-invalid @enderror" name="title" required>
                </p>
                @error('title')
                  <p class="require">{{ $message }}</p>
                @enderror
                <p>
                  <label for="id_message">本文</label>
                  <span class="require">*必須</span>
                  <textarea rows="4" cols="40" id="id_message" class="@error('body') is-invalid @enderror" name="body" required>{{old('body')}}</textarea>
                </p>
                @error('body')
                  <p class="require">{{ $message }}</p>
                @enderror
                <p>
                  <label>性別</label>
                  <span class="form_block">
                    @foreach (\App\Models\Review::$genders as $key => $label)
                      <input {{old('gender') == $key ? 'checked' : ''}} type="radio" name="gender" value="{{$key}}" id="gender_{{$key}}" required>
                      <label for="gender_{{$key}}" class="pd_right">{{$label}}</label>
                    @endforeach
                  </span>
                </p>
                @error('gender')
                  <p class="require">{{ $message }}</p>
                @enderror
                <p>
                  <label>年齢</label>
                  <span class="form_block">
                    {{ Form::select('age', \App\Models\Review::$ages, old('age'),
                      empty($errors->first('age')) ? ['id'=>'age', 'required'=>true] : ['class'=>"is-invalid", 'id'=>'age', 'required'=>true]) }}
                  </span>
                </p>
                @error('age')
                  <p class="require">{{ $message }}</p>
                @enderror
                <span id="submit">
                  <input type="hidden" name="park_id" value="{{$park->id}}">
                  <input type="submit" value="投稿する" />
                </span>
              </form>
            </section>

          </div><!-- wordmouth -->
        </div><!-- class="appeal" -->

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

  $('#myModal').modal('show');

  if ($('p.require').length) {
    $("html,body").animate({scrollTop:$('#message').offset().top});
  }

  if ($('.invalid').length) {
    $("html,body").animate({scrollTop:$('.invalid').offset().top});
  }
  if ($('.facility-invalid').length) {
    $("html,body").animate({scrollTop:$('.facility-invalid').offset().top - 130});
  }
  if ($('.plant-invalid').length) {
    $("html,body").animate({scrollTop:$('.plant-invalid').offset().top - 130});
  }
  if ($('.bird-invalid').length) {
    $("html,body").animate({scrollTop:$('.bird-invalid').offset().top - 130});
  }
  if ($('.insect-invalid').length) {
    $("html,body").animate({scrollTop:$('.insect-invalid').offset().top - 130});
  }
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