@extends('layouts.app')
@section('title', '口コミ管理')

@section('content')
<form action="{{route('reviews.index')}}" method="get" class="mb-5">

  
  <div class="form-group">
    <label for="park_id">{{__('validation.attributes.park_name')}}:</label>
    {{ Form::select('park_id', $parks, $park_id, ['class'=>"form-control", 'id'=>'park_id']) }}  
  </div>
  <div class="form-group">
    <label for="title">{{__('validation.attributes.title')}}:</label>
    <input type="text" id="title" name="title" value="{{$title}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="body">{{__('validation.attributes.body')}}:</label>
    <input type="text" id="body" name="body" value="{{$body}}" class="form-control">
  </div>
  <input type="submit" value="検索" class="btn btn-primary">
</form>

<table class="table">
  @foreach ($reviews as $review)
  <tr>
    <th>{{__('validation.attributes.park_name')}}</th>
    <td>{{$review->park->park_name}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.title')}}</th>
    <td>{{$review->title}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.body')}}</th>
    <td>{{$review->body}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.gender')}}</th>
    <td>{{$review->genderJp}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.age')}}</th>
    <td>{{$review->ageJp}}</td>
  </tr>
  
  <tr>
    <th>操作</th>
    <td>
      <a class="btn btn-info" href="{{route('reviews.edit', ['review' => $review])}}">更新</a>
      <form action="{{route('reviews.destroy', ['review' => $review])}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="削除する" class="btn btn-danger btn-del">
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{ $reviews->appends(request()->input())->links() }}
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