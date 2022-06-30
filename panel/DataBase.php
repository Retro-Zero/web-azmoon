<?php

namespace DataBase;

use PDO;
use PDOException;

class DataBase
{
    private $connection;
    private $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass, $this->option);
        } catch (PDOException $error) {
            echo "<p style='color: red'>There is a problem in connection : </p>" . $error->getMessage();
            exit();
        }
    }

    public function select($sql, $values = null)
    {
        try {
            if ($values == null) {
                return $this->connection->query($sql);
            } else {
                $statement = $this->connection->prepare($sql);
                $statement->execute($values);
                return $statement;
            }
        } catch (PDOException $error) {
            echo "<p style='color: red'>There is a problem in connection : </p>" . $error->getMessage();
            exit();
        }
    }

    public function insert($tableName, $fields, $values)
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO " . $tableName . "(" . implode(', ', $fields) . ") VALUES(:" . implode(', :', $fields) . ")");
            $statement->execute(array_combine($fields, $values));
            return true;
        } catch (PDOException $error) {
            echo "<p style='color: red'>There is a problem in connection : </p>" . $error->getMessage();
            exit();
        }
    }

    public function update($tableName, $id, $fields, $values)
    {
        $sql = "UPDATE `" . $tableName . "` SET";
        foreach (array_combine($fields, $values) as $filed => $value) {
            if ($value) {
                $sql .= " `" . $filed . "`= ? ,";
            } else {
                $sql .= "`" . $filed . "`= NULL ,";
            }
        }

        $sql .= " WHERE `id` = ?";

        try {
            $statement = $this->connection->prepare($sql);
            var_dump($id);
            $affectedRows = $statement->execute(array_merge(array_filter(array_values($values)), [$id]));
            return true;
        } catch (PDOException $error) {
            echo "<p style='color: red'>There is a problem in connection : </p>" . $error->getMessage();
            exit();
        }
    }

    public function delete($tableName, $id)
    {
        $sql = "DELETE FROM " . $tableName . " WHERE `id` = ?";
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);
            return true;
        } catch (PDOException $error) {
            echo "<p style='color: red'>There is a problem in connection : </p>" . $error->getMessage();
            exit();
        }
    }

    public function createTable($sql)
    {
        try {
            $this->connection->exec($sql);
        } catch (PDOException $error) {
            echo "<p style='color: red'>There is a problem in connection : </p>" . $error->getMessage();
            exit();
        }
    }
}