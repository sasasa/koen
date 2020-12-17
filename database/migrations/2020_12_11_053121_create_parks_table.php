<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parks', function (Blueprint $table) {
            $table->id();
            // 公園名
            $table->string('park_name');
            // 住所
            $table->string('address');
            // 画像パス
            $table->string('image_path');

            // 公園種別
            $table->string('park_type');
            // 面積
            $table->integer('surface_area');
            // 管理
            $table->string('management');
            // ホームページurl
            $table->string('url');
            // マップ
            $table->text('map');

            // 経度
            $table->double('longitude');
            // 緯度
            $table->double('latitude');

            /*基本施設*/
            // トイレ
            $table->boolean('is_toilet')->default(false);
            // 管理室
            $table->boolean('is_management_room')->default(false);
            // 売店
            $table->boolean('is_store')->default(false);
            // 駐車場
            $table->boolean('is_parking')->default(false);

            /* こども*/
            //  おむつ
            $table->boolean('is_diaper')->default(false);
            //  遊具
            $table->boolean('is_playing_equipment')->default(false);
            //  砂遊び
            $table->boolean('is_playing_with_sand')->default(false);
            //  水遊び
            $table->boolean('is_playing_in_water')->default(false);

            /*自然 */
            // 川・池
            $table->boolean('is_river')->default(false);
            // 花壇
            $table->boolean('is_flower_bed')->default(false);
            // 桜
            $table->boolean('is_cherry_blossom')->default(false);
            // 遊歩道
            $table->boolean('is_promenade')->default(false);

            /* 運動 */
            // ランニング
            $table->boolean('is_running')->default(false);
            // 野球場
            $table->boolean('is_baseball')->default(false);
            // テニス
            $table->boolean('is_tennis')->default(false);
            // 体育館
            $table->boolean('is_gym')->default(false);
            // 多目的グラウンド
            $table->boolean('is_multipurpose_ground')->default(false);

            /**アウトドア */
            // 宿泊施設
            $table->boolean('is_accommodation')->default(false);
            // キャンプ場
            $table->boolean('is_campground')->default(false);
            // 炊事場
            $table->boolean('is_kitchen')->default(false);
            // フィッシング
            $table->boolean('is_fishing')->default(false);

            /**バリアフリー */
            // 多目的トイレ
            $table->boolean('is_multipurpose_toilet')->default(false);
            // 車椅子対応
            $table->boolean('is_wheelchair_accessible')->default(false);

            /**その他*/
            // ドッグラン
            $table->boolean('is_dog_run')->default(false);
            // ボート
            $table->boolean('is_boat')->default(false);
            // 美術館
            $table->boolean('is_art_museum')->default(false);
            // 資料館
            $table->boolean('is_reference_library')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parks');
    }
}
