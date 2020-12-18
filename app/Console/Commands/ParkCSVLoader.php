<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;

use Illuminate\Console\Command;

class ParkCSVLoader extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'park:csv:loader';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '福岡市の公園CSVをロードする';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        setlocale(LC_CTYPE, "ja.UTF8");
        $fp = new \SplFileObject('csv/福岡市公園データ.csv', 'rb');
        $fp->setFlags(
            \SplFileObject::READ_CSV | //CSV列として行読み込み
            \SplFileObject::READ_AHEAD | //先読み/巻き戻し
            \SplFileObject::SKIP_EMPTY | //空行読み飛ばし
            \SplFileObject::DROP_NEW_LINE //行末の改行読み飛ばし
        );

        foreach ($fp as $line) {
            if ($fp->key() > 0 && !$fp->eof()) {

                DB::table('parks')->insert([
                    'park_name' => $line[5],
                    'address' => $line[1].$line[2].$line[3].$line[6],
                    'park_type' => $line[4],
                    // 経度
                    'longitude' => $line[8],
                    // 緯度
                    'latitude' => $line[7],
                    'image_path' => 'koen.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        return 0;
    }
}
