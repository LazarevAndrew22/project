<?php

namespace app\lib;
use PDO;

class Db
{
    protected PDO $db;

    public function __construct()
    {
        $config = require 'app/config/config.php';
        $this->db = new PDO(
            "mysql:host={$config['db']['host']};
            dbname={$config['db']['db']}",
            $config['db']['user'],
            $config['db']['password']);
    }

//    public function query($tableName, $params = []): bool
//    {
//        $stmt = $this->db->prepare("INSERT INTO $tableName VALUES(:id, :firstName, :lastName, :email, :password)");
//        if (!empty($params)) {
//            foreach ($params as $key => $val) {
//                if (is_int($val)) {
//                    $type = PDO::PARAM_INT;
//                } else {
//                    $type = PDO::PARAM_STR;
//                }
//                $stmt->bindValue(':' . $key, $val, $type);
//            }
//        }
//        $stmt->execute();
//        return $stmt;
//    }

    public function selectWhere($columnName, $tableName, $val): string
    {
        $sql = $this->db->query("SELECT $columnName FROM $tableName WHERE email = '$val'");
        return $sql->fetchColumn();
    }


    public function selectFewRecords($columnName, $tableName, $email): array
    {
        $sql = $this->db->query("SELECT $columnName FROM $tableName WHERE email = '$email'");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function selectWhereMailer($columnName, $tableName, $email): array
    {
        $sql = $this->db->query("SELECT $columnName FROM $tableName WHERE mailer = '$email'");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($firstName, $lastName, $email, $password): void
    {
        $sql = "INSERT INTO users (firstName, lastName, email, password)
        VALUES ('{$firstName}', '{$lastName}','{$email}', '{$password}')";
        $this->db->exec($sql);
    }


    public function insertInbox($theme, $mailer, $message, $recipient): void
    {
        $sql = "INSERT INTO inbox (theme, mailer, message, email) 
        VALUES ( '{$theme}', '{$mailer}', '{$message}', '{$recipient}')";
        $this->db->exec($sql);
    }

    public function del($message): bool
    {
        $sql = "DELETE FROM inbox WHERE message='$message'";
        $this->db->exec($sql);
        return true;
    }
}