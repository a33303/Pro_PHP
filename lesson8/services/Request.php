<?php

namespace App\services;

use App\models\User;

class Request
{
    protected $params = [
        'post' => [],
        'get' => [],
    ];

    public function __construct()
    {
        session_start();
        $this->setParams();
    }

    protected function setParams()
    {
        $this->params = [
            'post' => $_POST,
            'get' => $_GET,
        ];
    }

    public function get($key = '')
    {
        if (empty($key)) {
            return $this->params['get'];
        }

        if (key_exists($key, $this->params['get'])) {
            return $this->params['get'][$key];
        }

        return '';
    }

    public function post($key = '')
    {
        if (empty($key)) {
            return $this->params['post'];
        }

        if (key_exists($key, $this->params['post'])) {
            return $this->params['post'][$key];
        }

        return '';
    }

    public function methodIsGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    public function redirectOnUrl($path = '')
    {
        $reffer = '/';

        if (!empty($_SERVER['HTTP_REFERER'])) {
            $reffer = $_SERVER['HTTP_REFERER'];
        }

        if (empty($path) && !empty($reffer)) {
            $path = $reffer;
        }

        header('Location: ' . $path);
    }

    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function getSession($key = '')
    {
        if (empty($key)) {
            return $_SESSION;
        }

        if (key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }

        return '';
    }


    public function addUser()
    {
        $user = new User();
        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        $user->save();
    }



}

