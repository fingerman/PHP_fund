<?php
declare(strict_types=1);
namespace Services;


use Adapter\DatabaseInterface;
use Models\User;



class UserService implements UserServiceInterface
{
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function register($username, $password): bool
    {
        $stmt = $this->db->prepare("
                INSERT INTO users 
                SET 
                    name = :username, 
                    password = :pass
        ");

        return $stmt->execute(
            [
                'pass' => $password,
                'username' => $username
            ]
        );
    }

    public function exists($username): bool
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE name = ?");
        $stmt->execute(
            [
                $username
            ]
        );

        return !!$stmt->fetchRow();
    }

    public function isPasswordMatch($password, $confirm): bool
    {
        return $password == $confirm;
    }

    public function login($username, $password)
    {
        $stmt = $this->db->prepare("
            SELECT id, name, password FROM users
            WHERE name = ? 
        ");

        $stmt->execute(
            [
                $username
            ]
        );

        $user = $stmt->fetchRow();

        if (!$user) {
            throw new \Exception("Username does not exist");
        }

        if ($user['password'] != $password) {
            throw new \Exception("Password mismatch");
        }

        return $user['id'];
    }


    public function getInfo($id): User
    {
        $stmt = $this->db->prepare("
            SELECT id, name
            FROM users
            WHERE id = ?
        ");
        $stmt->execute([$id]);

        return $stmt->fetchObject(User::class);
    }
}