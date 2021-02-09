@extends('layouts.app')
@section('title', '公園新規作成')

@section('content')
<h1>公園新規作成</h1>

@include('components.errorAll')

<form action="{{route('parks.store')}}" method="post" class="mt-5" enctype='multipart/form-data'>
  @csrf

  <div class="form-group">
    <label for="">{{__('validation.attributes.park_name')}}:</label>
    <input value="{{old('park_name')}}" type="text" id="park_name" class="form-control @error('park_name') is-invalid @enderror" name="park_name">
    @error('park_name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="">{{__('validation.attributes.address')}}:</label>
    <input value="{{old('address')}}" type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address">
    @error('address')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="upfile">{{__('validation.attributes.upfile')}}:</label>
    <input type="file" id="upfile" class="form-control-file @error('upfile') is-invalid @enderror" name="upfile">
    @error('upfile')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-check mb-4">
    <input {{old('is_default_img') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_default_img" name="is_default_img">
    <label class="form-check-label" for="is_default_img">デフォルト画像を利用する</label>
  </div>

  <div class="form-group">
    <label for="park_type">{{__('validation.attributes.park_type')}}:</label>
    <input value="{{old('park_type')}}" type="text" id="park_type" class="form-control @error('park_type') is-invalid @enderror" name="park_type">
    @error('park_type')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="surface_area">{{__('validation.attributes.surface_area')}}:</label>
    <input value="{{old('surface_area')}}" type="text" id="surface_area" class="form-control @error('surface_area') is-invalid @enderror" name="surface_area">
    @error('surface_area')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="management">{{__('validation.attributes.management')}}:</label>
    <input value="{{old('management')}}" type="text" id="management" class="form-control @error('management') is-invalid @enderror" name="management">
    @error('management')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="url">{{__('validation.attributes.url')}}:</label>
    <input value="{{old('url')}}" type="text" id="url" class="form-control @error('url') is-invalid @enderror" name="url">
    @error('url')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="latitude">{{__('validation.attributes.latitude')}}:</label>
    <input value="{{old('latitude')}}" type="text" id="latitude" class="form-control @error('latitude') is-invalid @enderror" name="latitude">
    @error('latitude')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="longitude">{{__('validation.attributes.longitude')}}:</label>
    <input value="{{old('longitude')}}" type="text" id="longitude" class="form-control @error('longitude') is-invalid @enderror" name="longitude">
    @error('longitude')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>


  <div class="form-check">
    <input {{old('is_toilet') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_toilet" name="is_toilet">
    <label class="form-check-label" for="is_toilet">{{__('validation.attributes.is_toilet')}}</label>
  </div>

  <div class="form-check">
    <input {{old('is_management_room') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_management_room" name="is_management_room">
    <label class="form-check-label" for="is_management_room">{{__('validation.attributes.is_management_room')}}</label>
  </div>

  <div class="form-check">
    <input {{old('is_store') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_store" name="is_store">
    <label class="form-check-label" for="is_store">{{__('validation.attributes.is_store')}}</label>
  </div>

  <div class="form-check">
    <input {{old('is_parking') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_parking" name="is_parking">
    <label class="form-check-label" for="is_parking">{{__('validation.attributes.is_parking')}}</label>
  </div>

  <div class="form-check">
    <input {{old('is_diaper') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_diaper" name="is_diaper">
    <label class="form-check-label" for="is_diaper">{{__('validation.attributes.is_diaper')}}</label>
  </div>

  <div class="form-check">
    <input {{old('is_playing_equipment') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_playing_equipment" name="is_playing_equipment">
    <label class="form-check-label" for="is_playing_equipment">{{__('validation.attributes.is_playing_equipment')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_playing_with_sand') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_playing_with_sand" name="is_playing_with_sand">
    <label class="form-check-label" for="is_playing_with_sand">{{__('validation.attributes.is_playing_with_sand')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_playing_in_water') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_playing_in_water" name="is_playing_in_water">
    <label class="form-check-label" for="is_playing_in_water">{{__('validation.attributes.is_playing_in_water')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_river') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_river" name="is_river">
    <label class="form-check-label" for="is_river">{{__('validation.attributes.is_river')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_flower_bed') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_flower_bed" name="is_flower_bed">
    <label class="form-check-label" for="is_flower_bed">{{__('validation.attributes.is_flower_bed')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_cherry_blossom') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_cherry_blossom" name="is_cherry_blossom">
    <label class="form-check-label" for="is_cherry_blossom">{{__('validation.attributes.is_cherry_blossom')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_promenade') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_promenade" name="is_promenade">
    <label class="form-check-label" for="is_promenade">{{__('validation.attributes.is_promenade')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_running') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_running" name="is_running">
    <label class="form-check-label" for="is_running">{{__('validation.attributes.is_running')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_baseball') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_baseball" name="is_baseball">
    <label class="form-check-label" for="is_baseball">{{__('validation.attributes.is_baseball')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_tennis') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_tennis" name="is_tennis">
    <label class="form-check-label" for="is_tennis">{{__('validation.attributes.is_tennis')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_gym') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_gym" name="is_gym">
    <label class="form-check-label" for="is_gym">{{__('validation.attributes.is_gym')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_multipurpose_ground') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_multipurpose_ground" name="is_multipurpose_ground">
    <label class="form-check-label" for="is_multipurpose_ground">{{__('validation.attributes.is_multipurpose_ground')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_accommodation') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_accommodation" name="is_accommodation">
    <label class="form-check-label" for="is_accommodation">{{__('validation.attributes.is_accommodation')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_campground') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_campground" name="is_campground">
    <label class="form-check-label" for="is_campground">{{__('validation.attributes.is_campground')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_kitchen') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_kitchen" name="is_kitchen">
    <label class="form-check-label" for="is_kitchen">{{__('validation.attributes.is_kitchen')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_fishing') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_fishing" name="is_fishing">
    <label class="form-check-label" for="is_fishing">{{__('validation.attributes.is_fishing')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_multipurpose_toilet') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_multipurpose_toilet" name="is_multipurpose_toilet">
    <label class="form-check-label" for="is_multipurpose_toilet">{{__('validation.attributes.is_multipurpose_toilet')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_wheelchair_accessible') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_wheelchair_accessible" name="is_wheelchair_accessible">
    <label class="form-check-label" for="is_wheelchair_accessible">{{__('validation.attributes.is_wheelchair_accessible')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_dog_run') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_dog_run" name="is_dog_run">
    <label class="form-check-label" for="is_dog_run">{{__('validation.attributes.is_dog_run')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_boat') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_boat" name="is_boat">
    <label class="form-check-label" for="is_boat">{{__('validation.attributes.is_boat')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_art_museum') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_art_museum" name="is_art_museum">
    <label class="form-check-label" for="is_art_museum">{{__('validation.attributes.is_art_museum')}}</label>
  </div>
  <div class="form-check">
    <input {{old('is_reference_library') == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_reference_library" name="is_reference_library">
    <label class="form-check-label" for="is_reference_library">{{__('validation.attributes.is_reference_library')}}</label>
  </div>

  <button type="submit" class="btn btn-primary">登録</button>
</form>
@endsection