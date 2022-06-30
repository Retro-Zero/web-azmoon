<?php

namespace AdminDashboard;

use DataBase\DataBase;

require_once(BASE_PATH . 'panel/DataBase.php');

class Auth
{
    public function login()
    {
        $db = new DataBase();
        $settings = $db->select("SELECt * FROM `web_settings`")->fetch();
        if (isset($_SESSION['user'])) {
            $user = $db->select("SELECT * FROM `users` WHERE `id` = ?", [$_SESSION['user']])->fetch();
        }
        require_once(BASE_PATH . 'template/auth/index.php');
    }

    public function checkLogin($request)
    {
        $db = new DataBase();
        var_dump($request);
        die();
        $user = $db->select("SELECT * FROM `users` WHERE `username` = ?", [$request['username']])->fetch();
        if (!is_null($user)) {
            if (password_verify($request['password'], $user['password'])) {
                $_SESSION['user'] = $user['id'];
                $this->redirect('web-azmoon/dashboard');
            } else {
                $this->redirect('web-azmoon/login', 'failed');
            }
        } else {
            $this->redirect('web-azmoon/login', 'failed');
        }
    }

    public function checkAdmin()
    {
        if (isset($_SESSION['user'])) {
            $db = new DataBase();
            $user = $db->select("SELECT * FROM `users` WHERE `id` = ?", [$_SESSION['user']])->fetch();
            if (!is_null($user)) {
                if ($user['group_id'] == '3') {
                    $this->redirect("Sh.motahari-school/teacher-panel/profile");
                } elseif ($user['group_id'] == '4') {
                    $this->redirect("Sh.motahari-school/student-panel/profile");
                }
            } else {
                $this->redirectBack();
            }
        } else {
            $this->redirectBack();
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
            $this->redirect('Sh.motahari-school/login');
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