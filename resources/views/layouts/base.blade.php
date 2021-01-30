<!DOCTYPE html>
<html lang="ja">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no"/>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="公園">
    <meta name="description" content="@yield('description')">
    <title>@yield('title') | 公園マップ</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/destyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <header>
        @if (
            ( !empty($park) && request()->fullUrl() == route('parks.user_edit', ['park'=>$park]) ) ||
            ( !empty($park) && !empty($photo) && request()->fullUrl() == route('parks.photos.show', ['park'=>$park, 'photo'=>$photo]) )
        )
            <nav id="breadcrumbs">
                <ol>
                    <li><a href="/">Top</a></li>
                    <li><a href="{{ route('parks.detail', ['park'=>$park]) }}">{{ $park->park_name }}</a></li>
                    <li>@yield('title')</li>
                </ol>
            </nav>
        @elseif ( !empty($article) && request()->fullUrl() == route('root.show', ['article'=>$article]))
            <nav id="breadcrumbs">
                <ol>
                    <li><a href="/">Top</a></li>
                    <li><a href="{{ route('root.list') }}">公園なるほど情報の一覧</a></li>
                    <li>@yield('title')</li>
                </ol>
            </nav>
        @elseif ( !empty($type) && strpos(request()->fullUrl(), route('parks.search_by_plant_and_animal', ['type'=>$type])) !== false )
            <nav id="breadcrumbs">
                <ol>
                    <li><a href="/">Top</a></li>
                    <li><a href="{{ route('parks.search_by_plant_and_animal') }}">公園を動植物から探す</a></li>
                    <li>{{ $type }}から探す</li>
                </ol>
            </nav>
        @elseif ( request()->path() != '/')
            <nav id="breadcrumbs">
                <ol>
                    <li><a href="/">Top</a></li>
                    <li>@yield('title')</li>
                </ol>
            </nav>
        @endif
        <nav id="nav_bar">
            <div id="logo_caption">
                <a href="{{route('root.index')}}">
                    <h1>福岡県の最大級の<span>公園ポータルサイト</span></h1>
                </a>
                <div id="space">
                    <form action="{{ route('parks.search') }}" method="GET">
                        <input name="search" type="search" placeholder="地名を入力">
                        <input type="hidden" name="area" value="全て">
                    </form>
                </div>
            </div>

            <div id="pc_nav_site">
                <ul id="pc_nav_site_ul">
                    <a href="{{route('parks.search_map')}}"><li>地図から探す</li></a>
                    <a href="{{route('parks.search_by_location')}}"><li>現在地から探す</li></a>
                    <a href="{{route('parks.search')}}"><li>特徴から探す</li></a>
                    <a href="{{route('parks.search_by_plant_and_animal')}}"><li>動植物から探す</li></a>
                </ul>
                <div id="tips_link"><a href="{{ route('root.list') }}">公園なるほど情報</a></div>
            </div><!-- pc_nav_site -->

            <!--- ハンバーガーメニューここから  --->
            <div id="nav-drawer">
                <input id="nav-input" type="checkbox" class="nav-unshown">
                <label id="nav-open" for="nav-input"><span></span></label>
                <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                <div id="nav-content">
                    <ul id="nav-content_large_ul">
                    <li><a href="/">TOP</a></li>
                    <li><a href="{{ route('parks.search_map') }}">地図から探す</a></li>
                    <li><a href="{{ route('parks.search_by_location') }}">現在地から探す</a></li>
                    <li><a href="{{ route('parks.search') }}">特徴から探す</a></li>
                    <li><a href="{{ route('parks.search_by_plant_and_animal') }}">動植物から探す</a></li>
                    <li><a href="{{ route('root.list') }}">公園なるほど情報</a></li>
                    </ul>
                    <ul id="nav-content_small_ul">
                    <li><a href="{{ route('root.terms_of_use') }}">利用規約</a></li>
                    <li><a href="{{ route('root.about_advertising') }}">広告掲載について</a></li>
                    <li><a href="{{ route('inquiries.create') }}">ご意見・ご要望</a></li>
                    <li><a href="{{ route('root.privacy_policy') }}">プライバシーポリシー</a></li>
                    </ul>
                </div>
            </div>
        </nav><!-- nav_bar -->
    </header>


    <main>
        @yield('content')
    </main>

    <footer>
        <span>運営&nbsp;株式会社Grow-up</span>
    </footer>
</div>
    <script defer src="{{ asset('js/app.js') }}"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY', 'NO') }}&callback=initMap"></script>
    <script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
    @yield('script')
    <!-- Scripts -->
</body>
</html>
