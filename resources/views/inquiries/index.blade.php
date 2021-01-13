@extends('layouts.app')
@section('title', 'お問い合わせ管理')

@section('content')
<form action="{{route('inquiries.index')}}" method="get" class="mb-5">
  <div class="form-group">
    <label for="inquiry_name">{{__('validation.attributes.inquiry_name')}}:</label>
    <input type="text" id="inquiry_name" name="inquiry_name" value="{{$inquiry_name}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="inquiry_name_kana">{{__('validation.attributes.inquiry_name_kana')}}:</label>
    <input type="text" id="inquiry_name_kana" name="inquiry_name_kana" value="{{$inquiry_name_kana}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">{{__('validation.attributes.email')}}:</label>
    <input type="text" id="email" name="email" value="{{$email}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="inquiry_title">{{__('validation.attributes.inquiry_title')}}:</label>
    <input type="text" id="inquiry_title" name="inquiry_title" value="{{$inquiry_title}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="inquiry_body">{{__('validation.attributes.inquiry_body')}}:</label>
    <input type="text" id="inquiry_body" name="inquiry_body" value="{{$inquiry_body}}" class="form-control">
  </div>
  <input type="submit" value="検索" class="btn btn-primary">
</form>

<table class="table">
  @foreach ($inquiries as $inquiry)
  <tr>
    <th>{{__('validation.attributes.inquiry_name')}}</th>
    <td>{{$inquiry->inquiry_name}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.inquiry_name_kana')}}</th>
    <td>{{$inquiry->inquiry_name_kana}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.email')}}</th>
    <td>{{$inquiry->email}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.inquiry_title')}}</th>
    <td>{{$inquiry->inquiry_title}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.inquiry_body')}}</th>
    <td>
      {!! nl2br(e($inquiry->inquiry_body)) !!}
    </td>
  </tr>
  
  <tr>
    <th>操作</th>
    <td>
      @if ($inquiry->is_reply)
        返信済
      @else
        <form action="{{route('inquiries.update', ['inquiry' => $inquiry])}}" method="post">
          @csrf
          @method('patch')
          <input type="submit" value="返信済にする" class="btn btn-info">
        </form>
      @endif
      <form action="{{route('inquiries.destroy', ['inquiry' => $inquiry])}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="削除する" class="btn btn-danger btn-del">
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{ $inquiries->appends(request()->input())->links() }}
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