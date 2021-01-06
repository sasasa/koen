@extends('layouts.app')
@section('title', '公園なるほど情報管理')

@section('content')
<h1>公園なるほど情報管理</h1>

<a class="btn btn-primary mb-3" href="{{ route('articles.create') }}">新規作成</a>
<table class="table">
  @foreach ($articles as $article)
  <tr>
    <th>{{__('validation.attributes.title')}}</th>
    <td>{{$article->title}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.body')}}</th>
    <td>{!! strip_tags($article->body, $allowedTags) !!}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.image_path')}}</th>
    <td><img src="/storage/{{$article->image_path}}"></td>
  </tr>
  
  <tr>
    <th>操作</th>
    <td>
      <a class="btn btn-info" href="{{route('articles.edit', ['article' => $article])}}">更新</a>
      <form action="{{route('articles.destroy', ['article' => $article])}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="削除する" class="btn btn-danger btn-del">
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{ $articles->appends(request()->input())->links() }}
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