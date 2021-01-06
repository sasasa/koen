@extends('layouts.base')
@section('title', $article->title)

@section('content')
<section id="section_inform_head_area">
    <div id="inform_head_area">
        <span>公園なるほど情報</span>
    </div>
</section><!-- section_inform_head_area -->

<section id="section_inform_descr_area">
    <div id="inform_descr_area">
        <h3>{{ $article->title }}</h3>
        <article class="inform_descr">
            {!! strip_tags($article->body, $allowedTags) !!}
        </article><!-- inform_descr -->
    </div>
</section><!-- section_inform_descr_area -->

<style>
#inform_head_area {
    background: url("/storage/{{$article->image_path}}") no-repeat center center;;
}
</style>
@endsection
