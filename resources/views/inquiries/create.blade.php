@extends('layouts.base')
@section('title', 'お問い合わせ')

@section('content')
<section id="section_contact_area">

  <div id="contact_head_sub_section">
    <div id="contact_head_area">
      <span>お問い合わせ</span>
    </div><!-- contact_head_area -->
  </div>
  <!--contact_head_sub_section -->

  <!-- フォーム -->
  <div id="contact_form_area">
    <form class="contact_form" action="{{ route('inquiries.store') }}" method="POST">
      @csrf
      <!-- 漢字を含む名前 -->
      <label for="inquiry_name">お名前</label>
      <input id="inquiry_name" type="text" name="inquiry_name" value="{{old('inquiry_name')}}">
      @error('inquiry_name')
        <p class="require">{{ $message }}</p>
      @enderror

      <!-- ひらがなのなまえ -->
      <label for="inquiry_name_kana">名前（ひらがな）</label>
      <input id="inquiry_name_kana" type="text" name="inquiry_name_kana" value="{{old('inquiry_name_kana')}}">
      @error('inquiry_name_kana')
        <p class="require">{{ $message }}</p>
      @enderror

      <!-- メールアドレス -->
      <label for="email">メールアドレス</label>
      <input id="email" type="email" name="email" value="{{old('email')}}">
      @error('email')
        <p class="require">{{ $message }}</p>
      @enderror

      <!-- タイトル -->
      <label for="inquiry_title">タイトル</label>
      <input id="inquiry_title" type="text" name="inquiry_title" value="{{old('inquiry_title')}}">
      @error('inquiry_title')
        <p class="require">{{ $message }}</p>
      @enderror

      <!-- 内容 -->
      <label for="inquiry_body">内容</label>
      <textarea id="inquiry_body" accesskey="#" placeholder="お問い合わせ内容をご記入ください" name="inquiry_body" rows="4"
        cols="40">{{old('inquiry_body')}}</textarea>
      @error('inquiry_body')
        <p class="require">{{ $message }}</p>
      @enderror

      <div class="submit">
        <input type="submit" value="投稿する" />
      </div>
    </form>
  </div><!-- contact_form_area -->
</section><!-- section_contact_form_area -->

@endsection
