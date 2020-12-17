@extends('layouts.app')
@section('title', '公園管理')

@section('content')
<form action="{{route('parks.index')}}" method="get" class="mb-5">
  <div class="form-group">
    <label for="park_name">{{__('validation.attributes.park_name')}}:</label>
    <input type="text" id="park_name" name="park_name" value="{{$park_name}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="address">{{__('validation.attributes.address')}}:</label>
    <input type="text" id="address" name="address" value="{{$address}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="longitude">{{__('validation.attributes.longitude')}}:</label>
    <input type="text" id="longitude" name="longitude" value="{{$longitude}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="latitude">{{__('validation.attributes.latitude')}}:</label>
    <input type="text" id="latitude" name="latitude" value="{{$latitude}}" class="form-control">
  </div>
  <div class="form-group form-inline">
    <label class="checkbox-inline mr-3" for="is_toilet">
      <input {{$is_toilet == '1' ? 'checked' : ''}} type="checkbox" id="is_toilet" name="is_toilet" value="1">
      {{__('validation.attributes.is_toilet')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_management_room">
      <input {{$is_management_room == '1' ? 'checked' : ''}} type="checkbox" id="is_management_room" name="is_management_room" value="1">
      {{__('validation.attributes.is_management_room')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_store">
      <input {{$is_store == '1' ? 'checked' : ''}} type="checkbox" id="is_store" name="is_store" value="1">
      {{__('validation.attributes.is_store')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_parking">
      <input {{$is_parking == '1' ? 'checked' : ''}} type="checkbox" id="is_parking" name="is_parking" value="1">
      {{__('validation.attributes.is_parking')}}
    </label>
  </div>
  <div class="form-group form-inline">
    <label class="checkbox-inline mr-3" for="is_diaper">
      <input {{$is_diaper == '1' ? 'checked' : ''}} type="checkbox" id="is_diaper" name="is_diaper" value="1">
      {{__('validation.attributes.is_diaper')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_playing_equipment">
      <input {{$is_playing_equipment == '1' ? 'checked' : ''}} type="checkbox" id="is_playing_equipment" name="is_playing_equipment" value="1">
      {{__('validation.attributes.is_playing_equipment')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_playing_with_sand">
      <input {{$is_playing_with_sand == '1' ? 'checked' : ''}} type="checkbox" id="is_playing_with_sand" name="is_playing_with_sand" value="1">
      {{__('validation.attributes.is_playing_with_sand')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_playing_in_water">
      <input {{$is_playing_in_water == '1' ? 'checked' : ''}} type="checkbox" id="is_playing_in_water" name="is_playing_in_water" value="1">
      {{__('validation.attributes.is_playing_in_water')}}
    </label>
  </div>
  <div class="form-group form-inline">
    <label class="checkbox-inline mr-3" for="is_river">
      <input {{$is_river == '1' ? 'checked' : ''}} type="checkbox" id="is_river" name="is_river" value="1">
      {{__('validation.attributes.is_river')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_flower_bed">
      <input {{$is_flower_bed == '1' ? 'checked' : ''}} type="checkbox" id="is_flower_bed" name="is_flower_bed" value="1">
      {{__('validation.attributes.is_flower_bed')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_cherry_blossom">
      <input {{$is_cherry_blossom == '1' ? 'checked' : ''}} type="checkbox" id="is_cherry_blossom" name="is_cherry_blossom" value="1">
      {{__('validation.attributes.is_cherry_blossom')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_promenade">
      <input {{$is_promenade == '1' ? 'checked' : ''}} type="checkbox" id="is_promenade" name="is_promenade" value="1">
      {{__('validation.attributes.is_promenade')}}
    </label>
  </div>
  <div class="form-group form-inline">
    <label class="checkbox-inline mr-3" for="is_running">
      <input {{$is_running == '1' ? 'checked' : ''}} type="checkbox" id="is_running" name="is_running" value="1">
      {{__('validation.attributes.is_running')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_baseball">
      <input {{$is_baseball == '1' ? 'checked' : ''}} type="checkbox" id="is_baseball" name="is_baseball" value="1">
      {{__('validation.attributes.is_baseball')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_tennis">
      <input {{$is_tennis == '1' ? 'checked' : ''}} type="checkbox" id="is_tennis" name="is_tennis" value="1">
      {{__('validation.attributes.is_tennis')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_gym">
      <input {{$is_gym == '1' ? 'checked' : ''}} type="checkbox" id="is_gym" name="is_gym" value="1">
      {{__('validation.attributes.is_gym')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_multipurpose_ground">
      <input {{$is_multipurpose_ground == '1' ? 'checked' : ''}} type="checkbox" id="is_multipurpose_ground" name="is_multipurpose_ground" value="1">
      {{__('validation.attributes.is_multipurpose_ground')}}
    </label>
  </div>
  <div class="form-group form-inline">
    <label class="checkbox-inline mr-3" for="is_accommodation">
      <input {{$is_accommodation == '1' ? 'checked' : ''}} type="checkbox" id="is_accommodation" name="is_accommodation" value="1">
      {{__('validation.attributes.is_accommodation')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_campground">
      <input {{$is_campground == '1' ? 'checked' : ''}} type="checkbox" id="is_campground" name="is_campground" value="1">
      {{__('validation.attributes.is_campground')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_kitchen">
      <input {{$is_kitchen == '1' ? 'checked' : ''}} type="checkbox" id="is_kitchen" name="is_kitchen" value="1">
      {{__('validation.attributes.is_kitchen')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_fishing">
      <input {{$is_fishing == '1' ? 'checked' : ''}} type="checkbox" id="is_fishing" name="is_fishing" value="1">
      {{__('validation.attributes.is_fishing')}}
    </label>
  </div>
  <div class="form-group form-inline">
    <label class="checkbox-inline mr-3" for="is_multipurpose_toilet">
      <input {{$is_multipurpose_toilet == '1' ? 'checked' : ''}} type="checkbox" id="is_multipurpose_toilet" name="is_multipurpose_toilet" value="1">
      {{__('validation.attributes.is_multipurpose_toilet')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_wheelchair_accessible">
      <input {{$is_wheelchair_accessible == '1' ? 'checked' : ''}} type="checkbox" id="is_wheelchair_accessible" name="is_wheelchair_accessible" value="1">
      {{__('validation.attributes.is_wheelchair_accessible')}}
    </label>
  </div>
  <div class="form-group form-inline">
    <label class="checkbox-inline mr-3" for="is_dog_run">
      <input {{$is_dog_run == '1' ? 'checked' : ''}} type="checkbox" id="is_dog_run" name="is_dog_run" value="1">
      {{__('validation.attributes.is_dog_run')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_boat">
      <input {{$is_boat == '1' ? 'checked' : ''}} type="checkbox" id="is_boat" name="is_boat" value="1">
      {{__('validation.attributes.is_boat')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_art_museum">
      <input {{$is_art_museum == '1' ? 'checked' : ''}} type="checkbox" id="is_art_museum" name="is_art_museum" value="1">
      {{__('validation.attributes.is_art_museum')}}
    </label>
    <label class="checkbox-inline mr-3" for="is_reference_library">
      <input {{$is_reference_library == '1' ? 'checked' : ''}} type="checkbox" id="is_reference_library" name="is_reference_library" value="1">
      {{__('validation.attributes.is_reference_library')}}
    </label>
  </div>

  <input type="submit" value="検索" class="btn btn-primary">
</form>


<a href="{{route('parks.create')}}" class="btn btn-primary mb-3">公園新規作成</a>
<table class="table">
  @foreach ($parks as $park)
  <tr>
    <th>{{__('validation.attributes.park_name')}}</th>
    <td>{{$park->park_name}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.address')}}</th>
    <td>{{$park->address}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.image_path')}}</th>
    <td><img src="/storage/{{$park->image_path}}"></td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.park_type')}}</th>
    <td>{{$park->park_type}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.surface_area')}}</th>
    <td>{{$park->surface_area}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.management')}}</th>
    <td>{{$park->management}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.url')}}</th>
    <td>{{$park->url}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.map')}}</th>
    <td>{{$park->map}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.longitude')}}</th>
    <td>{{$park->longitude}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.latitude')}}</th>
    <td>{{$park->latitude}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_toilet')}}</th>
    <td>{{$park->is_toilet}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_management_room')}}</th>
    <td>{{$park->is_management_room}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_store')}}</th>
    <td>{{$park->is_store}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_parking')}}</th>
    <td>{{$park->is_parking}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_diaper')}}</th>
    <td>{{$park->is_diaper}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_playing_equipment')}}</th>
    <td>{{$park->is_playing_equipment}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_playing_with_sand')}}</th>
    <td>{{$park->is_playing_with_sand}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_playing_in_water')}}</th>
    <td>{{$park->is_playing_in_water}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_river')}}</th>
    <td>{{$park->is_river}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_flower_bed')}}</th>
    <td>{{$park->is_flower_bed}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_cherry_blossom')}}</th>
    <td>{{$park->is_cherry_blossom}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_promenade')}}</th>
    <td>{{$park->is_promenade}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_running')}}</th>
    <td>{{$park->is_running}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_baseball')}}</th>
    <td>{{$park->is_baseball}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_tennis')}}</th>
    <td>{{$park->is_tennis}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_gym')}}</th>
    <td>{{$park->is_gym}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_multipurpose_ground')}}</th>
    <td>{{$park->is_multipurpose_ground}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_accommodation')}}</th>
    <td>{{$park->is_accommodation}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_campground')}}</th>
    <td>{{$park->is_campground}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_kitchen')}}</th>
    <td>{{$park->is_kitchen}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_fishing')}}</th>
    <td>{{$park->is_fishing}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_multipurpose_toilet')}}</th>
    <td>{{$park->is_multipurpose_toilet}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_wheelchair_accessible')}}</th>
    <td>{{$park->is_wheelchair_accessible}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_dog_run')}}</th>
    <td>{{$park->is_dog_run}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_boat')}}</th>
    <td>{{$park->is_boat}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_art_museum')}}</th>
    <td>{{$park->is_art_museum}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.is_reference_library')}}</th>
    <td>{{$park->is_reference_library}}</td>
  </tr>
  <tr>
    <th>操作</th>
    <td>
      <a class="btn btn-info" href="{{route('parks.edit', ['park' => $park])}}">更新</a>
      <form action="{{route('parks.destroy', ['park' => $park])}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="削除する" class="btn btn-danger btn-del">
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{ $parks->appends(request()->input())->links() }}
@endsection

@section('script')
<script type="module">
$(function(){
    $(".btn-del").click(function() {
        if(confirm("本当に削除してもよろしいですか？")) {
        } else {
            //cancel
            event.preventDefault();
            return false;
        }
    });
});
</script>
@endsection