<!DOCTYPE html>
<html lang="ja">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no"/>
    <meta charset="UTF-8">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>@yield('title') | 公園ポータルサイト</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/destyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <header>
        <nav id="breadcrumbs">
            <ol>
                <li><a href="">Top</a></li>
                <li><a href="">地図から探す</a></li>
            </ol>
        </nav>

        <nav id="nav_bar">
            <div id="logo_caption">
                <h1>福岡県の最大級の<span>公園ポータルサイト</span></h1>
                <div id="space"></div>
            </div>

            <div id="pc_nav_site">
                <ul id="pc_nav_site_ul">
                    <a href="search_map.html"><li>地図から探す</li></a>
                    <a href="#"><li>現在地から探す</li></a>
                    <a href="search_feature.html"><li>特徴から探す</li></a>
                    <a href="#"><li>動植物から探す</li></a>
                </ul>
                <div id="tips_link"><a href="">公園なるほど情報</a></div>
            </div><!-- pc_nav_site -->

            <!--- ハンバーガーメニューここから  --->
            <div id="nav-drawer">
                <input id="nav-input" type="checkbox" class="nav-unshown">
                <label id="nav-open" for="nav-input"><span></span></label>
                <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                <div id="nav-content">
                    <ul id="nav-content_large_ul">
                    <li><a href="#">TOP</a></li>
                    <li><a href="#">地図から探す</a></li>
                    <li><a href="#">現在地から探す</a></li>
                    <li><a href="#">特徴から探す</a></li>
                    <li><a href="#">動植物から探す</a></li>
                    <li><a href="#">公園なるほど情報</a></li>
                    </ul>
                    <ul id="nav-content_small_ul">
                    <li><a href="#">ご利用の案内</a></li>
                    <li><a href="#">広告掲載について</a></li>
                    <li><a href="#">ご意見・ご要望</a></li>
                    <li><a href="#">プライバシーポリシー</a></li>
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
@yield('script')
</body>
</html>
