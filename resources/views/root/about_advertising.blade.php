@extends('layouts.base')

@section('description', '公園マップの広告掲載についての情報です。公園マップでは広告の掲載をしております。お問い合わせお待ちしております。')

@section('title', '広告掲載について')

@section('content')
<section id="section_advert_area">
  <h2>広告掲載について</h2>
  <div id="advert_area">
    <article class="advert_outer">
      <h3>法人のお客様へ</h3>
      <p>
        公園マップでは「ユーザーの意見を直接聞きたい！」「ユーザーに自社サービス・商品を直接アピールしたい」といった旅行会社、政府観光局、
        航空会社向けに様々なサービスをご用意しております。
      </p>
      <article class="advert_inner">
        <h4>特定箇所でサービスをご紹介</h4>
        <p>
          公園マップではTOPページや検索結果一覧の特定箇所において御社のサービスの紹介を行なっております。
        </p>
      </article>
      <article class="advert_inner">
        <h4>広告掲載についてのお問い合わせ</h4>
        <div id="contact_form_area">
          <form method="POST" action="{{ route('advertisements.store') }}">
            @csrf
            <label for="company_name">企業名</label>
            <input id="company_name" type="text" name="company_name" value="{{ old('company_name') }}">
            @error('company_name')
              <p class="require">{{ $message }}</p>
            @enderror

            <label for="representative_name">代表者名</label>
            <input id="representative_name" type="text" name="representative_name" value="{{ old('representative_name') }}">
            @error('representative_name')
              <p class="require">{{ $message }}</p>
            @enderror

            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}">
            @error('email')
              <p class="require">{{ $message }}</p>
            @enderror

            <label for="advertisement_body">内容</label>
            <textarea id="advertisement_body" accesskey="#" name="advertisement_body" rows="4" cols="40">{{ old('advertisement_body') }}</textarea>
            @error('advertisement_body')
              <p class="require">{{ $message }}</p>
            @enderror

            <input type="submit" value="送信する">
          </form>
        </div><!-- contact_form_area -->
      </article><!-- class="advert_inner" -->
    </article><!-- class="privacy_outer" -->
  </div><!-- id="praivacy_area" -->
</section><!-- id="section_privacy_area" -->

@endsection