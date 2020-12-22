@extends('layouts.app')
@section('title', 'フォト管理')

@section('content')
<form action="{{route('photos.index')}}" method="get" class="mb-5">

  
  <div class="form-group">
    <label for="park_id">{{__('validation.attributes.park_name')}}:</label>
    {{ Form::select('park_id', $parks, $park_id, ['class'=>"form-control", 'id'=>'park_id']) }}
  </div>
  <div class="form-group">
    <label for="photo_type">{{__('validation.attributes.photo_type')}}:</label>
    {{ Form::select('photo_type', [''=>'選択してください','昆虫'=>'昆虫','鳥'=>'鳥','植物'=>'植物',], $photo_type, ['class'=>"form-control", 'id'=>'photo_type']) }}
  </div>
  <div class="form-group">
    <label for="comment">{{__('validation.attributes.comment')}}:</label>
    <input type="text" id="comment" name="comment" value="{{$comment}}" class="form-control">
  </div>
  <input type="submit" value="検索" class="btn btn-primary">
</form>

<table class="table">
  @foreach ($photos as $photo)
  <tr>
    <th>{{__('validation.attributes.park_name')}}</th>
    <td>{{$photo->photo_type != 'ダミー' ? $photo->park->park_name : 'なし'}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.comment')}}</th>
    <td>{{$photo->comment}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.photo_type')}}</th>
    <td>{{$photo->photo_type}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.image_path')}}</th>
    <td><img src="/storage/{{$photo->image_path}}"></td>
  </tr>
  <tr>
    <th>操作</th>
    <td>
      @if ($photo->photo_type != 'ダミー')
        <a class="btn btn-info" href="{{route('photos.edit', ['photo' => $photo])}}">更新</a>
        <form action="{{route('photos.destroy', ['photo' => $photo])}}" method="post">
          @csrf
          @method('delete')
          <input type="submit" value="削除する" class="btn btn-danger btn-del">
        </form>
      @endif
    </td>
  </tr>
  @endforeach
</table>
{{ $photos->appends(request()->input())->links() }}
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