<?php

namespace AdminDashboard;

require_once BASE_PATH . '/panel/DataBase.php';
require_once BASE_PATH . '/panel/Admin.php';
use DataBase\DataBase;

class Panel extends Admin
{
    public function index()
    {
        $db = new DataBase();
        $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();
        $products = $db->select("SELECT * FROM `products`")->fetchAll();
        require_once (BASE_PATH . '/template/dashboard/dashboard.php');
    }

    public function create()
    {
        $db = new DataBase();
        $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();
        require_once(BASE_PATH . '/template/dashboard/create-product.php');
    }

    public function store($request)
    {
        $db = new DataBase();
        $db->insert('products', array_keys($request), $request);
        $this->redirect('web-azmoon/admin-panel');
    }

    public function edit($id)
    {
        $db = new DataBase();
        $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();
        $product = $db->select("SELECT * FROM products WHERE id = ?", [$id])->fetch();
        require_once(BASE_PATH . 'template/dashboard/edit-product.php');
    }

    public function update($request, $id)
    {
        $db = new DataBase();
        $db->update('products', $id, array_keys($request), $request);
        $this->redirect('web-azmoon/admin-panel');
    }

    public function delete($id)
    {
        $db = new DataBase();
        $db->delete('products', $id);
        $this->redirect('web-azmoon/admin-panel');
    }
}