@extends('layouts.app')
@section('title', 'フォト編集')

@section('content')
<h1>フォト編集</h1>

@include('components.errorAll')

<form action="{{route('photos.update', ['photo'=>$photo])}}" method="post" class="mt-5" enctype='multipart/form-data'>
  @csrf
  @method('PATCH')

  <div class="form-group">
    <label for="photo_type">{{__('validation.attributes.photo_type')}}:</label>
    {{ Form::select('photo_type', [''=>'選択してください','昆虫'=>'昆虫','鳥類'=>'鳥類','植物'=>'植物','施設'=>'施設',], old('photo_type', $photo->photo_type), empty($errors->first('photo_type')) ? ['class'=>"form-control", 'id'=>'photo_type'] : ['class'=>"form-control is-invalid", 'id'=>'photo_type']) }}
    @error('photo_type')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <img src="/storage/{{$photo->image_path}}?{{ \Str::random(8) }}">
    <label>
      <input type="checkbox" id="delete_image" name="delete_image" value="1" {{old('delete_image') ? 'checked' : ''}}>
      削除する
    </label>
  </div>

  <div class="form-group" id="uploader">
    <label for="upfile">{{__('validation.attributes.image_path')}}:</label>
    <input type="file" id="upfile" class="form-control-file @error('upfile') is-invalid @enderror" name="upfile">
    @error('upfile')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>


  <div class="form-group">
    <label for="comment">{{__('validation.attributes.comment')}}:</label>
    <input value="{{old('comment', $photo->comment)}}" type="text" id="comment" class="form-control @error('comment') is-invalid @enderror" name="comment">
    @error('comment')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">登録</button>
</form>
@endsection

@section('script')
<script type="module">
function uploaderShowHide()
{
    if( $("#delete_image").prop('checked') ) {
        $("#uploader").fadeIn()
    } else {
        $("#uploader").fadeOut()
    }
}
$(function(){
    uploaderShowHide()
    $("#delete_image").click(function() {
      uploaderShowHide()
    });
});
</script>
@endsection