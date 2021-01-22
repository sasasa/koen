@extends('layouts.app')
@section('title', '広告掲載管理')



@section('content')
<form action="{{route('advertisements.index')}}" method="get" class="mb-5">
  <div class="form-group">
    <label for="company_name">{{__('validation.attributes.company_name')}}:</label>
    <input type="text" id="company_name" name="company_name" value="{{$company_name}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="representative_name">{{__('validation.attributes.representative_name')}}:</label>
    <input type="text" id="representative_name" name="representative_name" value="{{$representative_name}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">{{__('validation.attributes.email')}}:</label>
    <input type="text" id="email" name="email" value="{{$email}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="advertisement_body">{{__('validation.attributes.advertisement_body')}}:</label>
    <input type="text" id="advertisement_body" name="advertisement_body" value="{{$advertisement_body}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="is_reply" class="form-check-label">{{__('validation.attributes.is_reply')}}:</label>
    {{ Form::select('is_reply', \App\Models\Advertisement::$options, $is_reply, ['class'=>"form-control", 'id'=>'is_reply']) }}
  </div>
  <input type="submit" value="検索" class="btn btn-primary">
</form>

<table class="table">
  @foreach ($advertisements as $advertisement)
  <tr>
    <th>{{__('validation.attributes.company_name')}}</th>
    <td>{{$advertisement->company_name}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.representative_name')}}</th>
    <td>{{$advertisement->representative_name}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.email')}}</th>
    <td>{{$advertisement->email}}</td>
  </tr>
  <tr>
    <th>{{__('validation.attributes.advertisement_body')}}</th>
    <td>
      {!! nl2br(e($advertisement->advertisement_body)) !!}
    </td>
  </tr>
  
  <tr>
    <th>操作</th>
    <td>
      @if ($advertisement->is_reply)
        返信済
      @else
        <form action="{{route('advertisements.update', ['advertisement' => $advertisement])}}" method="post">
          @csrf
          @method('patch')
          <input type="submit" value="返信済にする" class="btn btn-info">
        </form>
      @endif
      <form action="{{route('advertisements.destroy', ['advertisement' => $advertisement])}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="削除する" class="btn btn-danger btn-del">
      </form>
    </td>
  </tr>
  @endforeach
</table>
{{ $advertisements->appends(request()->input())->links() }}
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