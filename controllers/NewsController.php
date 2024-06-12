<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Template;
use models\Comments;
use models\News;

class NewsController extends Controller
{
    public function actionAdd()
    {
        return $this->render();
    }

    public function actionIndex()
    {
        $news = News::findByCondition(null);
        $this->template->setParam('newsarray', $news);
        return $this->render();
    }

    public function actionView($params)
    {
        if($this->isPost){
            Comments::addComment($this->post->newsID,$this->post->userID,$this->post->content);
        }
        $news = News::findById($params[0]);
        if (empty($news)) {
            $this->addErrorMessage('Такої новини не існує. Перейдіть на вкладку "Новини", щоб обрати існуючу новину.');
            return $this->redirect('/news/index');
        } else {
            $this->template->setParam('news', $news);
            return $this->render();
        }
    }
}