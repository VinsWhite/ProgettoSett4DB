<?php 

namespace GestioneUtentiDTO {

    use PDO;
    class Admin {
        private PDO $conn;

        public function __construct(PDO $conn) {
            $this->conn = $conn;
        }

        // funzione utile per prelevarci tutti gli utenti memorizzati nel database
        public function getAll() {
            $sql = "SELECT * FROM pdo_datiSensibili.user";
            $res = $this->conn->query($sql, PDO::FETCH_ASSOC);
            return $res ? $res : null;
        }

        public function addUser($name, $email, $password) {
            try {
                $sql = "INSERT INTO pdo_datiSensibili.user (nameUser, email, passW) VALUES (:name, :email, :password)";
                
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':password' => $password
                ]);
            } catch (\PDOException $e) {
                echo "Errore durante l'aggiunta dell'utente: " . $e->getMessage();
                return false;
            }
        }
        
        public function updateUser($id, $name, $email, $password) {
            try {
                $sql = "UPDATE pdo_datiSensibili.user SET nameUser = :name, email = :email, passW = :password WHERE id = :id";
                
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id,
                    ':name' => $name,
                    ':email' => $email,
                    ':password' => $password
                ]);
                return true;
            } catch (\PDOException $e) {
                echo "Errore durante l'aggiornamento dell'utente: " . $e->getMessage();
                return false;
            }
        }
        

    }


}