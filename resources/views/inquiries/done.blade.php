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
    <h2>
      お問い合わせありがとうございます。改めてご連絡いたします。
      以下の内容でお問い合わせを受け付けいたしました。
    </h2>
    <hr>
      <p>{{$inquiry->inquiry_name}}</p>
    <hr>
  </div><!-- contact_form_area -->
</section><!-- section_contact_form_area -->

@endsection
