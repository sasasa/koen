@extends('layouts.base')

@section('description', '公園なるほど情報で公園に詳しくなれる。公園の豆知識を不定期で連載していきます。また公園で見られる植物や動物のなるほど情報も連載していきます。')

@section('title', '公園なるほど情報の一覧')

@section('content')
<section id="section_list_inform">
    <div id="list_inform_area">
        <h2>公園なるほど情報の一覧</h2>
        <article class="list_inform">
            <h3>公園のなるほど</h3>
            <ul>
                @foreach ($park_articles as $article)
                    <li>
                        <div class="inform_item" style="background-image: url('/storage/{{$article->image_path}}')">
                            <a href="{{ route('root.show', ['article'=>$article]) }}">
                                <span>{{ $article->title }}</span>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </article>
        <article class="list_inform">
            <h3>植物のなるほど</h3>
            <ul>
                @foreach ($plant_articles as $article)
                    <li>
                        <div class="inform_item" style="background-image: url('/storage/{{$article->image_path}}')">
                            <a href="{{ route('root.show', ['article'=>$article]) }}">
                                @if(mb_strlen($article->title) > 13)
                                    <span>{{mb_substr($article->title, 0, 13). '…'}}</span>
                                @else
                                    <span>{{ $article->title }}</span>
                                @endif
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </article>
        <article class="list_inform">
            <h3>動物のなるほど</h3>
            <ul>
                @foreach ($animal_articles as $article)
                    <li>
                        <div class="inform_item" style="background-image: url('/storage/{{$article->image_path}}')">
                            <a href="{{ route('root.show', ['article'=>$article]) }}">
                                @if(mb_strlen($article->title) > 13)
                                    <span>{{mb_substr($article->title, 0, 13). '…'}}</span>
                                @else
                                    <span>{{ $article->title }}</span>
                                @endif
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </article>
    </div>
</section>
@endsection