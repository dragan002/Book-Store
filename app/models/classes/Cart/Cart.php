<?php

namespace App\models\classes\Cart;


use Exception;
use \PDO;
use PDOException;
use App\models\classes\Database\Database;
class Cart extends Database {
    
  public function findAllFromCart(int $userId): ?array {
        try {
            $sql = "SELECT * FROM `cart_items` WHERE user_id=:user_id";
            $stmt = $this->getConnection() -> prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch(PDOException $e) {
            die("Error in query: " . $sql . " - " . $e->getMessage());
        }
    }

    

    public function addToCart(int $userId, int $bookId): bool {
        try {
            $sql = "INSERT INTO `cart_items` (user_id, book_id) VALUES(:userId, :bookId)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
            $stmt->bindParam(":bookId", $bookId, PDO::PARAM_INT);

            $result = $stmt->execute();

            if(!$result) {
                error_log('Failed to insert into cart: ' . $stmt->errorInfo()[2]);
                throw new Exception('Error adding item to cart.');
            }

            $_SESSION['alert_message']['success'] = 'Product added to cart successfully.';

            return true;
            
        } catch(PDOException $e) {
            error_log('Failed to insert into cart: ' . $e->getMessage());
            throw new Exception('Failed to insert into cart.');
        }
    }

    public function deleteFromCart(int $bookId): bool {
        try {
            $sql = "DELETE FROM `cart_items` WHERE book_id = :id LIMIT 1";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindValue(':id', $bookId, PDO::PARAM_INT);
        
            $result = $stmt->execute();
            
            if (!$result) {
                $_SESSION['alert_message']['error'] = 'Error deleting item from cart.';
            }
            $_SESSION['alert_message']['success'] = 'Product deleted from cart successfully.';

            return true;
        }  catch (PDOException $e) {
            die("ERROR: Could not execute $sql. " . $e->getMessage());
        }
    }
}