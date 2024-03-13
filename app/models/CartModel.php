<?php

class Cart extends Database {
    
  public function findAllFromCart() {
        try {
            $sql = "SELECT * FROM `cartItems`";
            $stmt = $this->getConnection() -> prepare($sql);

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
            $stmt->bindValue(":bookId", $bookId, PDO::PARAM_INT);
            $stmt->bindParam( ":bookQuantity" , $bookQuantity, PDO::PARAM_INT);

            $result = $stmt->execute();

            if(!$result) {
                die('Failed to insert into cart' . $stmt->errorInfo()[2]);
            }

            if ($result) {
                $_SESSION['alert_message']['success'] = 'Product added to cart successfully.';
            } else {
                $_SESSION['alert_message']['error'] = 'Error adding item to cart.';
            }
            return true;
        } catch(PDOException $e) {
            die("Failed to insert in card" . $e->getMessage());
        }
    }

    public function deleteFromCart($bookId) {
        try {
            $sql = "DELETE FROM `cartItems` WHERE book_id =  :id LIMIT 1";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindValue(':id', $bookId);
        
            $result = $stmt->execute();
            
            
            if ($result) {
                $_SESSION['alert_message']['success'] = 'Product deleted from cart successfully.';
            } else {
                $_SESSION['alert_message']['error'] = 'Error deleting item from cart.';
            }
            $stmt = null;
            return true;
        }  catch (PDOException $e) {
            die("ERROR: Could not execute $sql. " . $e->getMessage());
        }
    }
}