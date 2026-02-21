<?php

namespace App\Lib;

use Illuminate\Http\Request;

class YoutubeClient
{
    /**
     * YouTube URLから動画タイトルを取得
     */
    public function getYouTubeVideoTitle($url)
    {
        if(preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            $youtubeId = $matches[1];
            // Googleへの接続情報のインスタンスを作成と設定
            $client =  new \Google_Client();
            $client->setDeveloperKey(env('GOOGLE_API_KEY'));

            // 接続情報のインスタンスを用いてYoutubeのデータへアクセス可能なインスタンスを生成
            $youtube = new \Google_Service_YouTube($client);

            // 動画IDを使用して動画情報を取得
            $items = $youtube->videos->listVideos('snippet', [
                'id'  => $youtubeId,
            ]);

            if (!empty($items)) {
                $title = $items[0]['snippet']['title'];
                return $title;
            }
        }
    }
}
