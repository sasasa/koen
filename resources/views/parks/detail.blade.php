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
                <input type="file" name="upfile" accept="image/*" required>
                @error('upfile')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="text" name="comment" required>
                @error('comment')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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
                <input type="file" name="upfile" accept="image/*" required>
                @error('upfile')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="text" name="comment" required>
                @error('comment')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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
                <input type="file" name="upfile" accept="image/*" required>
                @error('upfile')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="text" name="comment" required>
                @error('comment')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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
                {!! $park->map !!}
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

        <input id="TAB-04" type="radio" value="checked" name="TAB" class="tab-switch"><label class="tab-label" for="TAB-04">タグ</label>
        <div class="appeal">
          <div>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
            あいうえお<br>
          </div>

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
@endsection