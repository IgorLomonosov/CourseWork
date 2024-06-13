<?php

namespace controllers;

use core\Controller;
use core\Template;
use models\News;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $news = News::findByCondition(['isApproved' => 1],'desc');
        $this->template->setParam('newsArr',$news);
        return $this->render();
    }
}