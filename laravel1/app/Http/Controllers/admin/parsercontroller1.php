<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\services\XMLParserService;
use App\Jobs\newsparsing;
use App\news;
use App\category;

class parsercontroller1 extends Controller
{ 
    public function index(){
        $rssLinks = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
           
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss',
        ];
        foreach ($rssLinks as $link) {
            NewsParsing::dispatch($link);
            
        

        $xml = XmlParser::load($link);
    $data=$xml->parse(['news'=>['uses'=>'channel.item[title,description,category,link, pubDate,encloudure::url]'],
    
    ]);
    foreach($data['news'] as $key =>$value){
        $news1 = new news();
    
if(!news::query()->where(['link'=>$value['link']])->first()){
    $news1->title= $value['title'];
    $news1->text =$value['description'];
    $news1->category_id=1;
   $news1->link=$value['link'];
 // $news1->image =$value['description'];
 $news1->save();
//}
}}}
return redirect()->route('home')->with('success', 'новости успешно добавлены');
}
}
