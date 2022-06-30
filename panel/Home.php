<?php

namespace AdminDashboard;

require_once BASE_PATH . '/panel/DataBase.php';
use DataBase\DataBase;

class Home
{
    public function index()
    {
        $db = new DataBase();
        $products = $db->select("SELECT * FROM `products`")->fetchAll();
        require_once(BASE_PATH . '/template/app/index.php');
    }
}