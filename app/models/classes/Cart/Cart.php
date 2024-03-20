<?php

namespace App\models\classes\Cart;


use \PDO;
use PDOException;
use App\models\classes\Database\Database;
class Cart extends Database {
    
  public function findAllFromCart($userId) {
        try {
            $sql = "SELECT * FROM `cartItems` WHERE user_id=:user_id";
            $stmt = $this->getConnection() -> prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch(PDOException $e) {
            die("Error in query: " . $sql . " - " . $e->getMessage());
        }
    }

    

    public function addToCart($userId, $bookId, $bookQuantity) {
        try {
            $sql = "INSERT INTO `cartItems` (user_id, book_id, book_quantity) VALUES(:userId, :bookId, :bookQuantity)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
            $stmt->bindPAram(":bookId", $bookId, PDO::PARAM_INT);
            $stmt->bindParam( ":bookQuantity" , $bookQuantity, PDO::PARAM_INT);

            $result = $stmt->execute();

            if(!$result) {
                error_log('Failed to insert into cart: ' . $stmt->errorInfo()[2]);
                throw new Exception('Error adding item to cart.');
            }

            $_SESSION['alert_message']['success'] = 'Product added to cart successfully.';

            return $result;
            
        } catch(PDOException $e) {
            error_log('Failed to insert into cart: ' . $e->getMessage());
            throw new Exception('Failed to insert into cart.');
        }
    }

    public function deleteFromCart($bookId) {
        try {
            $sql = "DELETE FROM `cartItems` WHERE book_id = :id LIMIT 1";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindValue(':id', $bookId);
        
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