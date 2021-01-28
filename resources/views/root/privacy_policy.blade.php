@extends('layouts.base')

@section('description', '公園マップのプライバシーポリシーです。ご利用する際のプライバシーポリシーを記してあります。')

@section('title', 'プライバシーポリシー')

@section('content')
<section id="section_privacy_area">
  <h2>プライバシーポリシー</h2>
    <div id="praivacy_area">
        <article class="privacy_outer">
            <h3>はじめに</h3>
            <p>
              語句の定義は<a href="{{ route('root.terms_of_use') }}">利用規約</a>に準じるものとします。
            </p>
            <p>
              当グループは、本サービスのユーザの個人情報をお預かりしております。
            </p>
            <p>
              当グループは、ユーザにより良いサービスを提供するために、個人情報の適切な収集を行い、利用の為の具体的なルールを定め、ユーザの個人情報の適切な取扱いに努めてまいります。
              当グループは個人情報に関してのルールが適切に守られているかを常にチェックし、ユーザの個人情報の適切な取扱いに努めてまいります。
              当グループは、個人情報に関する法令を遵守致します。
            </p>
            <article class="privacy_inner">
                <h4>１．適用範囲</h4>
                <p>
                  本方針はユーザが本サービスを利用される場合に適応されます。本サービス内より遷移する広告先、 並びに本サービスを通じて情報発信を行っているユーザのサイトを利用した結果残された個人情報に関しましては、本方針の適用範囲外とさせて頂きます。
                </p>
            </article>
            <article class="privacy_inner">
                <h4>２．個人情報の取得について</h4>
                <p>
                  当グループは、偽りその他不正の手段によらず適正に個人情報を取得致します。
一部ページでIPアドレスなどの利用者情報を取得していますが、裁判所等からの正式な要請なき場合、その情報を第三者に公開することは一切ありません。
                </p>
                <p>
                  当グループは本サービスにおいてクッキーをユーザのコンピュータに保存し、参照することがあります。
また、本サービス内で広告を表示している会社及び当グループへアクセス解析サービスを提供している会社がユーザのコンピュータ内にクッキーを保存し参照することがあります。
この場合、広告主及びアクセス解析サービスの提供者によるクッキーの利用は、広告主等のプライバシーの考え方に従って行われます。
                </p>
                <p>
                  当グループでは、サービス向上のためにグーグル株式会社が提供する「Googleアナリティクス」を利用しています。
「Googleアナリティクス」はサイト訪問者のクッキー情報を収集することでアクセス解析を行うツールであり、これにより弊社はユーザのサイト利用状況の分析を行っております。
詳細は、<a href="https://policies.google.com/technologies/partner-sites?hl=ja">こちら</a>をご覧ください。
                </p>
                <p>
                  グーグル株式会社によるクッキー情報の収集にご同意頂けません場合には、以下のページよりオプトアウトを行うか、クッキーを無効としてください。
（※クッキーを無効とした場合には、本サービスの一部機能をご利用頂けない可能性がございます。）
Google アナリティクス オプトアウト アドオン<a href="https://tools.google.com/dlpage/gaoptout">https://tools.google.com/dlpage/gaoptout</a>
                </p>
                <p>
                  上記以外の広告主やその他の会社が、当グループのクッキーを参照することはできません。
                </p>
            </article>

            <article class="privacy_inner">
              <h4>３．個人情報の利用について</h4>
              <p>
                当グループは、個人情報を以下の利用目的の達成に必要な範囲内で、利用致します。
              </p>
              <p>
                以下に定めのない目的で個人情報を利用する場合、あらかじめご本人の同意を得た上で行います。
                <ul>
                  <li>(1)
                    本サービスの提供・運営のため</li>
                  <li>(2)
                    ご質問の受付・回答のため</li>
                  <li>(3)
                    有料サービスを利用したユーザへの料金請求のため</li>
                  <li>(4)
                    メンテナンス、重要なお知らせなど必要に応じた案内のため</li>
                  <li>(5)
                    本サービスの利用規約に違反する利用形態を防止するため</li>
                  <li>(6)
                    当グループの提供するサービスに関連するキャンペーン、新機能などを紹介するため</li>
                  <li>(7)
                    個人情報の属性の集計、分析、統計資料作成のため
                    (統計資料とは、個人が識別・特定できないように加工したものをいい、新規サービスの開発等の業務の遂行のために利用、処理することがあります。また、統計資料を業務提携先に提供することがあります。)</li>
                  <li>(8)
                    当グループの提供するサービスにユーザがアップロードしたコンテンツを利用することについて、アップロードしたユーザに連絡するため</li>
                  <li>(9)
                    業務提携企業がある場合で、かつ共同で提供するサービス(以下、共同サービスという)をユーザが利用される場合に、業務提携企業に対して、共同サービスの提供に必要な最小限の項目の個人情報を提供するため</li>
                </ul>
              </p>
          </article>

          <article class="privacy_inner">
            <h4>４．個人情報の安全管理について</h4>
            <p>
              当グループは、取り扱う個人情報の漏洩、滅失またはき損の防止その他の個人情報の安全管理のために必要かつ適切な措置を講じます。
            </p>
          </article>

          <article class="privacy_inner">
            <h4>５．個人情報の委託について</h4>
            <p>
              当グループは、個人情報の取り扱いの全部または一部を第三者に委託する場合は、当該第三者について厳正な調査を行い、取り扱いを委託された個人情報の安全管理が図られるよう当該第三者に対する必要かつ適切な監督を行います。
            </p>
          </article>

          <article class="privacy_inner">
            <h4>６．個人情報の第三者提供について</h4>
            <p>
              当グループは、原則として個人情報をあらかじめご本人の同意を得ることなく、第三者に提供致しませんが 以下の場合には開示・提供することがあるものとします。
              <ul>
                <li>(1)
                  法令に基づく場合</li>
                <li>(2)
                  人の生命、身体又は財産の保護のために必要がある場合であって、本人の同意を得ることが困難であるとき</li>
                <li>(3)
                  公衆衛生の向上または児童の健全な育成の推進のために特に必要がある場合であって、本人の同意を得ることが困難であるとき</li>
                <li>(4)
                  国の機関若しくは地方公共団体又はその委託を受けた者が法令の定める事務を遂行することに対して協力する必要があって、本人の同意を得ることにより当該事務の遂行に支障を及ぼすおそれがあるとき</li>
                <li>(5)
                  当グループの提供するサービスの利用規約でユーザが同意している場合に該当するとき</li>
              </ul>
            </p>
          </article>

          <article class="privacy_inner">
            <h4>７．個人情報の開示・訂正等について</h4>
            <p>
              当グループは、ご本人から自己の個人情報についての開示の請求がある場合、速やかに開示を致します。
その際、ご本人であることが確認できない場合には、開示に応じません。
            </p>
            <p>
              個人情報の内容に誤りがあり、ご本人から訂正・追加・削除の請求がある場合、調査の上、速やかにこれらの請求に対応致します。
その際、ご本人であることが確認できない場合には、これらの請求に応じません。
            </p>
            <p>
              当グループの個人情報の取り扱いにつきまして、上記の請求・お問い合わせ等ございましたら、お問い合わせフォームより、お問い合わせくださいますようお願い申し上げます。
            </p>
          </article>

          <article class="privacy_inner">
            <h4>８．免責</h4>
            <p>
              個人情報の漏洩等がないよう当グループは法律その他の規程に基づき適切にサービス運営を行いますが、以下の場合に、第三者が個人情報を取得したことにより発生したトラブルについては免責されるものとします。
              <ul>
                <li>(1)
                  ユーザ自らがサービス上の機能又は別の手段を用いて他のユーザに個人情報を明らかにする場合</li>
                <li>(2)
                  他のユーザがサービス上に入力した情報により、期せずして本人が特定できてしまった場合</li>
                <li>(3)
                  その他当グループに過失がないにも拘わらず発生した漏洩等の事故</li>
              </ul>
            </p>
          </article>

          <article class="privacy_inner">
            <h4>９．本方針の変更</h4>
            <p>
              本方針の内容は変更されることがあります。
            </p>
            <p>
              変更後の本方針については、当グループが別途定める場合を除いて、本サイトに掲載した時から効力を生じるものとします。
            </p>
          </article>
        </article><!-- class="privacy_outer" -->

        <div id="preparer">
          <p>令和3年1月1日&nbsp;策定
            <span>株式会社Grow-up&nbsp;わくわくLab</span>
          </p><!-- id="preparer" -->
        </div>
    </div><!-- id="praivacy_area" -->
</section><!-- id="section_privacy_area" -->
@endsection