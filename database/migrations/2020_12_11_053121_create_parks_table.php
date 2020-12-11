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
            // 経度
            $table->double('longitude');
            // 緯度
            $table->double('latitude');
            /*基本施設*/
            // トイレ
            $table->boolean('is_toilet');
            // 管理室
            $table->boolean('is_management_room');
            // 売店
            $table->boolean('is_store');
            // 駐車場
            $table->boolean('is_parking');

            /* こども*/
            //  おむつ
            $table->boolean('is_diaper');
            //  遊具
            $table->boolean('is_playing_equipment');
            //  砂遊び
            $table->boolean('is_playing_with_sand');
            //  水遊び
            $table->boolean('is_playing_in_water');

            /*自然 */
            // 川・池
            $table->boolean('is_river');
            // 花壇
            $table->boolean('is_ flower_bed');
            // 桜
            $table->boolean('is_cherry_blossom');
            // 遊歩道
            $table->boolean('is_promenade');

            /* 運動 */
            // ランニング
            $table->boolean('is_running');
            // 野球場
            $table->boolean('is_baseball');
            // テニス
            $table->boolean('is_tennis');
            // 体育館
            $table->boolean('is_gym');
            // 多目的グラウンド
            $table->boolean('is_multipurpose_ground');

            /**アウトドア */
            // 宿泊施設
            $table->boolean('is_accommodation');
            // キャンプ場
            $table->boolean('is_campground');
            // 炊事場
            $table->boolean('is_kitchen');
            // フィッシング
            $table->boolean('is_fishing');

            /**バリアフリー */
            // 多目的トイレ
            $table->boolean('is_multipurpose_toilet');
            // 車椅子対応
            $table->boolean('is_wheelchair_accessible');

            /**その他*/
            // ドッグラン
            $table->boolean('is_dog_run');
            // ボート
            $table->boolean('is_boat');
            // 美術館
            $table->boolean('is_art_museum');
            // 資料館
            $table->boolean('is_reference_library');

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
