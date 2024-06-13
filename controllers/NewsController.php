<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Template;
use Exception;
use models\Comments;
use models\Images;
use models\News;

class NewsController extends Controller
{
    public function actionAdd()
    {
        if ($this->isPost) {
            if ($this->post->action === 'addNews') {
                if (strlen($this->post->title) === 0)
                    $this->addErrorMessage('Тип посту не вказано!');
                if (strlen($this->post->short_text) === 0)
                    $this->addErrorMessage('Короткий опис не вказано!');
                if (strlen($this->post->text) === 0)
                    $this->addErrorMessage('Повний опис не вказано!');
                if (!is_null($this->files->image && $this->files->image['error'] === UPLOAD_ERR_OK) && !$this->isErrorMessagesExists()) {
                    try {
                        News::saveNews($this->post->title, $this->post->short_text, $this->post->text, $this->post->isApproved, $this->post->date, null);
                        $newsId = News::findByCondition(['text' => $this->post->text])[0]['id'];
                        Images::saveImage($this->files->image, $newsId);
                        return $this->redirect('/news/addsuccess');
                    } catch (Exception $e) {
                        $this->addErrorMessage("Не вдалося завантажити фото профілю: " . $e->getMessage());
                    }
                }
            }
        } else
            return $this->render();
    }

    public function actionAddsuccess()
    {
        return $this->render();
    }

    public function actionUpdate($params)
    {
        if ($this->isPost) {
            if ($this->post->action === 'save') {
                if (strlen($this->post->title) === 0)
                    $this->addErrorMessage('Тип посту не вказано!');
                if (strlen($this->post->short_text) === 0)
                    $this->addErrorMessage('Короткий опис не вказано!');
                if (strlen($this->post->text) === 0)
                    $this->addErrorMessage('Повний опис не вказано!');
                if (!$this->isErrorMessagesExists()) {
                    if ($this->post->approval != null)
                        $isApproved = 1;
                    else
                        $isApproved = 0;
                    News::saveNews($this->post->title, $this->post->short_text, $this->post->text, $isApproved, $this->post->date, $this->post->newsId);
                    if (!is_null($this->files->image) && $this->files->image['error'] === UPLOAD_ERR_OK) {
                        try {
                            Images::saveImage($this->files->image, $this->post->newsId);
                        } catch (Exception $e) {
                            $this->addErrorMessage("Не вдалося завантажити фото профілю: " . $e->getMessage());
                        }
                    }
                    return $this->redirect('/news/updatesuccess');
                }
            } elseif ($this->post->action === 'delete') {
                News::deleteById($this->post->newsId);
                Images::deleteByCondition(['news' => $this->post->newsId]);
                return $this->redirect('/news/deletesuccess');
            }
        } else {
            $news = News::findById($params[0]);
            if (empty($news)) {
                $this->addErrorMessage('Такої новини не існує. Перейдіть на вкладку "Черги", щоб обрати існуючу новину.');
                return $this->redirect('/news/queue');
            } else {
                $this->template->setParam('news', $news);
                return $this->render();
            }
        }
    }

    public function actionUpdatesuccess()
    {
        return $this->render();
    }

    public function actionDeletesuccess()
    {
        return $this->render();
    }

    public function actionQueue()
    {
        $newsarray = News::findByCondition(['isApproved' => 0]);
        $this->template->setParam('newsarray', $newsarray);
        return $this->render();
    }

    public function actionIndex()
    {
        if ($this->isPost) {
            if ($this->post->action === 'asc') {
                $news = News::findByCondition(['isApproved' => 1], 'asc');
            }
            if ($this->post->action === 'desc') {
                $news = News::findByCondition(['isApproved' => 1], 'desc');
            }
        } else
            $news = News::findByCondition(['isApproved' => 1]);
        $this->template->setParam('newsarray', $news);
        return $this->render();
    }

    public function actionView($params)
    {
        if ($this->isPost) {
            if ($this->post->action === 'addComment')
                Comments::addComment($this->post->newsID, $this->post->userID, $this->post->content);
            if($this->post->action === 'deleteComment')
                Comments::deleteById($this->post->commentId);
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

    public function actionSearch()
    {
        return $this->render();
    }
}