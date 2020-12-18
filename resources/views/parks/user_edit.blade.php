@extends('layouts.base')
@section('title', '公園の特徴を教えてください！')

@section('content')
<form action="{{route('parks.user_update', ['park'=>$park])}}" method="post" class="user_edit">
  <h1>公園の特徴を教えてください！</h1>

  @csrf
  @method('PATCH')

  <div class="form-check">
    <input value="0" type="hidden" name="is_toilet">
    <input {{old('is_toilet', $park->is_toilet) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_toilet" name="is_toilet">
    <label class="form-check-label" for="is_toilet">{{__('validation.attributes.is_toilet')}}
    </label>
  </div>

  <div class="form-check">
    <input value="0" type="hidden" name="is_management_room">
    <input {{old('is_management_room', $park->is_management_room) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_management_room" name="is_management_room">
    <label class="form-check-label" for="is_management_room">{{__('validation.attributes.is_management_room')}}</label>
  </div>

  <div class="form-check">
    <input value="0" type="hidden" name="is_store">
    <input {{old('is_store', $park->is_store) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_store" name="is_store">
    <label class="form-check-label" for="is_store">{{__('validation.attributes.is_store')}}</label>
  </div>

  <div class="form-check">
    <input value="0" type="hidden" name="is_parking">
    <input {{old('is_parking', $park->is_parking) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_parking" name="is_parking">
    <label class="form-check-label" for="is_parking">{{__('validation.attributes.is_parking')}}</label>
  </div>

  <div class="form-check">
    <input value="0" type="hidden" name="is_diaper">
    <input {{old('is_diaper', $park->is_diaper) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_diaper" name="is_diaper">
    <label class="form-check-label" for="is_diaper">{{__('validation.attributes.is_diaper')}}</label>
  </div>

  <div class="form-check">
    <input value="0" type="hidden" name="is_playing_equipment">
    <input {{old('is_playing_equipment', $park->is_playing_equipment) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_playing_equipment" name="is_playing_equipment">
    <label class="form-check-label" for="is_playing_equipment">{{__('validation.attributes.is_playing_equipment')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_playing_with_sand">
    <input {{old('is_playing_with_sand', $park->is_playing_with_sand) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_playing_with_sand" name="is_playing_with_sand">
    <label class="form-check-label" for="is_playing_with_sand">{{__('validation.attributes.is_playing_with_sand')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_playing_in_water">
    <input {{old('is_playing_in_water', $park->is_playing_in_water) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_playing_in_water" name="is_playing_in_water">
    <label class="form-check-label" for="is_playing_in_water">{{__('validation.attributes.is_playing_in_water')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_river">
    <input {{old('is_river', $park->is_river) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_river" name="is_river">
    <label class="form-check-label" for="is_river">{{__('validation.attributes.is_river')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_flower_bed">
    <input {{old('is_flower_bed', $park->is_flower_bed) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_flower_bed" name="is_flower_bed">
    <label class="form-check-label" for="is_flower_bed">{{__('validation.attributes.is_flower_bed')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_cherry_blossom">
    <input {{old('is_cherry_blossom', $park->is_cherry_blossom) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_cherry_blossom" name="is_cherry_blossom">
    <label class="form-check-label" for="is_cherry_blossom">{{__('validation.attributes.is_cherry_blossom')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_promenade">
    <input {{old('is_promenade', $park->is_promenade) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_promenade" name="is_promenade">
    <label class="form-check-label" for="is_promenade">{{__('validation.attributes.is_promenade')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_running">
    <input {{old('is_running', $park->is_running) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_running" name="is_running">
    <label class="form-check-label" for="is_running">{{__('validation.attributes.is_running')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_baseball">
    <input {{old('is_baseball', $park->is_baseball) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_baseball" name="is_baseball">
    <label class="form-check-label" for="is_baseball">{{__('validation.attributes.is_baseball')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_tennis">
    <input {{old('is_tennis', $park->is_tennis) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_tennis" name="is_tennis">
    <label class="form-check-label" for="is_tennis">{{__('validation.attributes.is_tennis')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_gym">
    <input {{old('is_gym', $park->is_gym) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_gym" name="is_gym">
    <label class="form-check-label" for="is_gym">{{__('validation.attributes.is_gym')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_multipurpose_ground">
    <input {{old('is_multipurpose_ground', $park->is_multipurpose_ground) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_multipurpose_ground" name="is_multipurpose_ground">
    <label class="form-check-label" for="is_multipurpose_ground">{{__('validation.attributes.is_multipurpose_ground')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_accommodation">
    <input {{old('is_accommodation', $park->is_accommodation) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_accommodation" name="is_accommodation">
    <label class="form-check-label" for="is_accommodation">{{__('validation.attributes.is_accommodation')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_campground">
    <input {{old('is_campground', $park->is_campground) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_campground" name="is_campground">
    <label class="form-check-label" for="is_campground">{{__('validation.attributes.is_campground')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_kitchen">
    <input {{old('is_kitchen', $park->is_kitchen) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_kitchen" name="is_kitchen">
    <label class="form-check-label" for="is_kitchen">{{__('validation.attributes.is_kitchen')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_fishing">
    <input {{old('is_fishing', $park->is_fishing) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_fishing" name="is_fishing">
    <label class="form-check-label" for="is_fishing">{{__('validation.attributes.is_fishing')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_multipurpose_toilet">
    <input {{old('is_multipurpose_toilet', $park->is_multipurpose_toilet) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_multipurpose_toilet" name="is_multipurpose_toilet">
    <label class="form-check-label" for="is_multipurpose_toilet">{{__('validation.attributes.is_multipurpose_toilet')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_wheelchair_accessible">
    <input {{old('is_wheelchair_accessible', $park->is_wheelchair_accessible) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_wheelchair_accessible" name="is_wheelchair_accessible">
    <label class="form-check-label" for="is_wheelchair_accessible">{{__('validation.attributes.is_wheelchair_accessible')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_dog_run">
    <input {{old('is_dog_run', $park->is_dog_run) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_dog_run" name="is_dog_run">
    <label class="form-check-label" for="is_dog_run">{{__('validation.attributes.is_dog_run')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_boat">
    <input {{old('is_boat', $park->is_boat) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_boat" name="is_boat">
    <label class="form-check-label" for="is_boat">{{__('validation.attributes.is_boat')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_art_museum">
    <input {{old('is_art_museum', $park->is_art_museum) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_art_museum" name="is_art_museum">
    <label class="form-check-label" for="is_art_museum">{{__('validation.attributes.is_art_museum')}}</label>
  </div>
  <div class="form-check">
    <input value="0" type="hidden" name="is_reference_library">
    <input {{old('is_reference_library', $park->is_reference_library) == '1' ? 'checked' : ''}} class="form-check-input" value="1" type="checkbox" id="is_reference_library" name="is_reference_library">
    <label class="form-check-label" for="is_reference_library">{{__('validation.attributes.is_reference_library')}}</label>
  </div>

  <button type="submit" class="btn btn-primary">編集する</button>
</form>
@endsection

