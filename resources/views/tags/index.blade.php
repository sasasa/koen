@extends('layouts.app')
@section('title', 'タグ管理')

@section('content')
@if (session('message'))
<div class="alert alert-danger mt-5">
  <h3>削除に失敗しました</h3>
  <ul>
    <li>{{ session('message') }}</li>
  </ul>
</div>
@endif

<form action="{{route('tags.index')}}" method="get" class="mb-5">

  <div class="form-group">
    <label for="tag">{{__('validation.attributes.tag')}}:</label>
    <input type="text" id="tag" name="tag" value="{{$tag}}" class="form-control">
  </div>
  <input type="submit" value="検索" class="btn btn-primary">
</form>

<table class="table">
  @foreach ($tags as $tag)
  <tr>
    <th>{{__('validation.attributes.tag')}}</th>
    <td>{{$tag->tag}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.park_name')}}</th>
    <td>
      <ul>
        @foreach ($tag->parks as $park)
          <li>{{ preg_replace('/[0-9]+.*$/', '', $park->address) }}:{{$park->park_name}}</li>
        @endforeach
      </ul>
    </td>
  </tr>
  <tr>
    <th>操作</th>
    <td>
      <a class="btn btn-info" href="{{route('tags.edit', ['tag' => $tag])}}">更新</a>
      <form action="{{route('tags.destroy', ['tag' => $tag])}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="削除する" class="btn btn-danger btn-del">
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{ $tags->appends(request()->input())->links() }}
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