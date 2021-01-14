@extends('layouts.base')
@section('title', '公園なるほど情報一覧')

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
                                <span>{{ $article->title }}</span>
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
                                <span>{{ $article->title }}</span>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </article>
    </div>
</section>
@endsection