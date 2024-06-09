<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Template;
use models\News;

class NewsController extends Controller
{
    public function actionAdd()
    {
        return $this->render();
    }

    public function actionIndex()
    {
        $db = Core::get()->db;

        /*$news = new News();
        $news->id = null;
        $news->title = '!!news9!!';
        $news->text = '!!text!!';
        $news->short_text = '!!short text!!';
        $news->date = '2024-09-24 11:07:25';
        $news->save();*/
        /*$rows = $db->select("news",'title',['id' => 1]);*/
        /*$db->insert("news",[
            'title'=>'Заголовок',
            'text'=>'Якийсь текст',
            'short_text'=>'st',
            'date'=>'2024-04-22 19:00:00'
        ]);*/
        /*$db->delete('news',[
            'id' => 4
        ]);*/
        /*$db->update('news',[
            'title'=>'!!!!!!'
        ],
        [
           'id' => '1'
        ]);*/
        return $this->render();
    }

    public function actionView($params)
    {
        return $this->render();
    }
}