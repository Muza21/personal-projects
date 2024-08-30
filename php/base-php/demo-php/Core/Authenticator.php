<?php

namespace Core;

use Core\App;
use Core\Database;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = $this->findUser($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email
                ]);

                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        $id = $this->findUserId($user['email']);

        Session::put('user', [
            'email' => $user['email'],
            'id' => $id
        ]);

        session_regenerate_id();
    }

    public  function logout()
    {
        Session::destroy();
    }

    private function findUser($email)
    {
        $db = App::resolve(Database::class);

        $user = $db->query("select * from users where email = :email", [
            'email' => $email,
        ])->find();

        return $user;
    }

    private function findUserId($email)
    {
        return $this->findUser($email)['id'];
    }
}
