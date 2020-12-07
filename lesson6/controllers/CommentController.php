<?php
namespace App\controllers;

use App\models\Comment;

class CommentController extends Controller
{
    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return $this->render('comment_add');
        }
        $comment= new Comment();
        $comment->name = $_POST['name'];
        $comment->user_id = $_POST['user_id'];
        $comment->date = $_POST['date'];
        $comment->save();
        $this->setMSG('Комментарий добавлен');
        header('Location: ?c=comment&a=add');
        return '';
    }



}