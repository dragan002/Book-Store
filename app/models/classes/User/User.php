<?php

namespace App\models\classes\User;

use App\models\classes\Database\Database;

use \PDO;

class User extends Database
{

    function findAllUsers(): array
    {

        try {
            $sql = "SELECT * FROM users";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->confirmResultSet($result);

            return $result;
        } catch (PDOException $e) {
            die("Error in query: " . $sql . " - " . $e->getMessage());
        }
    }

    function login(string $email, string  $password): ?array
    {

        try {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam(1, $email, PDO::PARAM_STR);

            $stmt->execute();

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$userData) {
                throw new Exception('Login failed. Email not found.');
            }

            if (!password_verify($password, $userData['password'])) {
                throw new Exception('Login failed. Invalid password.');
            }
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $userData['id'];
            $_SESSION["username"] = $userData['username'];

            return $userData;

        } catch (PDOException $e) {
            die("Something went wrong with login: " . $e->getMessage());
        } finally {
            $stmt = null;
        }
    }

    function createUser(array $user)
    {

        try {
            $sql = "INSERT INTO users (username, email, password) ";
            $sql .= "VALUES (:userUsername, :userEmail, :userPassword)";

            $stmt = $this->getConnection()->prepare($sql);

            $stmt->bindParam(':userUsername', $user['username'], PDO::PARAM_STR);
            $stmt->bindParam(':userEmail', $user['email'], PDO::PARAM_STR);
            $stmt->bindParam(':userPassword', $user['password'], PDO::PARAM_STR);

            $result = $stmt->execute();

            if (!$result) {
                die("Failed to insert data into the database: " . $stmt->errorInfo()[2]);
            }

            return true;
        } catch (PDOException $e) {
            die("Failed to insert data into the database: " . $e->getMessage());
        }
    }

    function getLoggerFromForm(): ?array
    {
        if (!isset($_POST['email']) && !isset($_POST['password'])) {
            return false;
        }

        return [
            'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            'password' => $_POST['password']
        ];
    }

    function findUserByEmail(string $email): ?array
    {

        try {
            $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";

            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            die("Failed to retrieve data from database: " . $e->getMessage());
        }
    }

    function findUserById(int $id): ?array
    {
        try {
            $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";

            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            die("Failed to retrieve data from database: " . $e->getMessage());
        }
    }

    function deleteUser(array $userId)
    {
        try {
            $sql = "DELETE FROM users WHERE id = :id LIMIT 1";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
    
            return true;
        } catch (PDOException $e) {
            die("ERROR: Could not execute $sql. " . $e->getMessage());
        }
    }
    

    function editUser(array $user): bool
    {
        try {
            $sql = "UPDATE users SET username = :username, email = :email, password = :password, role = :role WHERE id = :id";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam(':username', $user['username'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $user['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $user['password'], PDO::PARAM_STR);
            $stmt->bindParam(':role', $user['role'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);

            $result = $stmt->execute();
            $this->confirmResultSet($result);

            $stmt = null;

            return true;
        } catch (PDOException $e) {
            die("ERROR: Could not execute $sql. " . $e->getMessage());
        }
    }

    function searchUser(string $search): ?array
    {

        try {
            $sql = "SELECT * FROM users WHERE id = :id OR username LIKE :username OR email LIKE :email";
            $stmt = $this->getConnection()->prepare($sql);

            $searchTerm = "%" . $search . "%";

            $stmt->bindParam(':id', $search, PDO::PARAM_INT);
            $stmt->bindParam(':username', $searchTerm, PDO::PARAM_STR);
            $stmt->bindParam(':email', $searchTerm, PDO::PARAM_STR);

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            die("Database query failed: " . $e->getMessage());
        }
    }

    function handleSuccessfulLogin($user): void
    {
        if ($user['role'] == 'admin') {
            header("Location: ../../app/view/admin_homepage.php");
            exit();
        } else {
            header("Location: ../../public/index.php");
            exit();
        }
    }
}