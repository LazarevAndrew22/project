<?php


namespace app\models;


use app\core\Model;
use PDO;


class Account extends Model
{

    public function validate($input, $post): bool
    {

        $rules = [
            'firstName' =>
                [
                    'pattern' => '#^[a-zA-Z]{1,20}$#',
                    'message' => 'First name is incorrect!',
                ],
            'lastName' =>
                [
                    'pattern' => '#^[a-zA-Z]{1,20}$#',
                    'message' => 'Last name is incorrect!',
                ],
            'email' =>
                [
                    'pattern' => '#^([a-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
                    'message' => 'Email address is incorrect!',
                ],
            'password' =>
                [
                    'pattern' => '#^[a-zA-Z0-9]{8,20}$#',
                    'message' => 'Password is incorrect! It must be [a-zA-Z0-9]{8,20}',
                ],
        ];

        foreach ($input as $val) {
            if (!isset($post[$val]) || !preg_match($rules[$val]['pattern'], $post[$val])) {
                $this->error = $rules[$val]['message'];
                return false;
            }
        }


        return true;
    }
    public function matchingPasswords($post): bool
    {
        return $post['password'] === $post['repassword'];
    }

    public function checkEmailExists($email): bool
    {
        if ($this->db->selectWhere('email', 'users', $email)){
            return true;
        }
        return false;
    }


    public function checkPassword($post): bool{

        $hash = $this->db->selectWhere('password', 'users', $post['loginEmail']);
        if(password_verify($post['passwordLogin'], $hash)){
            return true;
        }
        return false;
    }


    public function registerDb($post): void
    {
        $params = [
            'firstName' => $post['firstName'],
            'lastName' => $post['lastName'],
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
        ];

        $this->db->insert($params['firstName'], $params['lastName'], $params['email'], $params['password']);
    }

    public function getLetters($email): array
    {
        return $this->db->selectFewRecords('message', 'inbox', $email);
    }

    public function getMailer($email): array
    {
        return $this->db->selectFewRecords('mailer', 'inbox', $email);
    }

    public function getTheme($email): array
    {
        return $this->db->selectFewRecords('theme', 'inbox', $email);
    }

    public function sendMessage($post): void
    {
        $params = [
            'recipient' => $post['recipient'],
            'theme' => $post['theme'],
            'message' => nl2br($post['message']),
            'mailer' => $_SESSION['userEmail'],
        ];

        $this->db->insertInbox($params['theme'], $params['mailer'], $params['message'], $params['recipient']);

    }



    public function getRecipient($mailer): array
    {
        return $this->db->selectWhereMailer('email', 'inbox', $mailer);
    }

    public function getSentLetters($mailer): array
    {
        return $this->db->selectWhereMailer('message', 'inbox', $mailer);
    }

    public function getSentThemes($mailer): array
    {
        return $this->db->selectWhereMailer('theme', 'inbox', $mailer);
    }

    public function del($message): void
    {
        $this->db->del($message);
    }
}