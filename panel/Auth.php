<?php

namespace AdminDashboard;

use DataBase\DataBase;

require_once(BASE_PATH . 'panel/DataBase.php');

class Auth
{
    public function login()
    {
        require_once(BASE_PATH . 'template/auth/login.php');
    }

    public function checkLogin($request)
    {
        $db = new DataBase();
        $user = $db->select("SELECT * FROM `users` WHERE `username` = ?", [$request['username']])->fetch();
        if (!is_null($user)) {
            if ($request['password'] == $user['password']) {
                $_SESSION['user'] = $user['id'];
                $this->redirect('web-azmoon/admin-panel');
            } else {
                $this->redirect('web-azmoon/login', 'failed');
            }
        } else {
            $this->redirect('web-azmoon/login', 'failed');
        }
    }

    public function checkAdmin()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('web-azmoon');
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
            $this->redirect('web-azmoon');
        } else {
            $this->redirectBack();
        }
    }

    public function redirect($url, $message = null)
    {
        if ($message) {
            header('location: ' . trim(CURRENT_DOMAIN . '/ ') . '/' . trim($url, '/ ') . '?' . $message);
        } else {
            header('location: ' . trim(CURRENT_DOMAIN . '/ ') . '/' . trim($url, '/ '));
        }
        exit();
    }

    public function redirectBack($message = null)
    {
        if ($message) {
            header('location: ' . $_SERVER['HTTP_REFERER'] . '?' . $message);
        } else {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function hash($string)
    {
        return password_hash($string, PASSWORD_DEFAULT);
    }
}