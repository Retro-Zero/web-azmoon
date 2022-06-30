<?php

namespace AdminDashboard;

require_once BASE_PATH . '/panel/DataBase.php';
use DataBase\DataBase;

class Dashboard
{
    public function index()
    {
        $db = new DataBase();
        $user = $db->select("SELECT * FROM users WERE id = ?", [$_SESSION['user']])->fetch();
        require_once BASE_PATH . '/template/dashboard/dashboard.php';
    }
}