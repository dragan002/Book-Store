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
            return true;
        } catch(PDOException $e) {
            die("Failed to insert in card" . $e->getMessage());
        }
    }
}