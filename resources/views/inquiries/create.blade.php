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
    <form action="{{ route('inquiries.store') }}">
      @csrf
      <!-- 漢字を含む名前 -->
      <label for="name">お名前</label>
      <input id="name" type="text" name="name">
      <!-- ひらがなのなまえ -->
      <label for="hiragana">名前（ひらがな）</label>
      <input id="hiragana" type="text" name="hira_name">
      <!-- メールアドレス -->
      <label for="email">メールアドレス</label>
      <input id="email" type="email" name="email">
      <!-- カテゴリ -->
      <label for="category">カテゴリ</label>
      <input id="category" type="text" name="category">
      <!-- 内容 -->
      <label for="comment">内容</label>
      <textarea id="comment" accesskey="#" placeholder="お問い合わせ内容をご記入ください" name="comment" rows="4"
        cols="40"></textarea>
    </form>
  </div><!-- contact_form_area -->
</section><!-- section_contact_form_area -->

@endsection
