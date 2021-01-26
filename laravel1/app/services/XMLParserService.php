<?php

namespace App\services;

use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function savenews($link){
$xml = XmlParser::load($link);

    $data = $xml->parse([
        'title' =>['uses'=> 'channel.title'],
       'link'=>['uses'=> 'channel.link'],
        'text'=>['uses'=> 'channel.description'],
        'image'=>['uses'=> 'channel.image.url'],

    ]);  $news=new news;
      
       $result = $news -> fill($data -> all())->save();
         


    //Storage::disk('local')->append('log.txt', date('c') . ' ' . $link);
// info(date('c') . ' ' . $link);
    //TODO Сохранить данные в БД
}
}