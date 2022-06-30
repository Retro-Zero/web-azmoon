<?php

namespace AdminDashboard;

require_once(BASE_PATH . "panel/DataBase.php");
require_once(BASE_PATH . 'panel/Auth.php');

class Admin
{
    public function __construct()
    {
        $auth = new Auth();
        $auth->checkAdmin();
    }

    public function saveFile($image, $imagePath, $imageName = null)
    {
        $ext = explode('.', $image['name']);
        $ext = end($ext);
        if ($imageName) {
            $imageName = $imageName . "." . $ext;
        } else {
            $imageName = date("Y-m-d-H-i-s") . '.' . $ext;
        }
        $imagePath = "public/" . $imagePath . "/";

        move_uploaded_file($image['tmp_name'], $imagePath . $imageName);
        return $imagePath . $imageName;
    }

    public function removeFile($path)
    {
        unlink(BASE_PATH . trim($path, '/ '));
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