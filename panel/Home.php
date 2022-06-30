<?php

namespace AdminDashboard;

require_once(BASE_PATH . '/panel/DataBase.php');
use DataBase\DataBase;

class Home
{
    public function index()
    {
        $db = new DataBase();
        $products = $db->select("SELECT * FROM `products`")->fetchAll();
        if (isset($_SESSION['user'])) {
            $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();
        }
        require_once(BASE_PATH . '/template/app/index.php');
    }
}