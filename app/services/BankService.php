<?php

    require("IBankService.php");
    require("Database.php");

    class UserService extends Database implements IBankService {

        public function create(Bank $bank){

            $db = $this->connect();

            $id = $bank->id;
            $name = $bank->name;
            $logo = $bank->logo;

            try {
                $sql = "INSERT INTO bank VALUES (:id, :name, :logo)";
                $stmt = $db->prepare($sql); 

                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":logo", $logo);

                $stmt->execute();
            } catch (PDOException $e){
                die("Error: ". $e->getMessage());
            }

        }

        public function update(Bank $bank){

            $db = $this->connect();

            $id = $bank->id;
            $name = $bank->name;
            $logo = $bank->logo;

            try {
                $sql = "UPDATE bank SET name = :name, logo = :logo WHERE id = :id";
                $stmt = $db->prepare($sql);

                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":logo", $logo);
                $stmt->bindParam(":id", $id);

                $stmt->execute();
            } catch (PDOException $e){
                    die("Error: " . $e->getMessage());
                
            }

        }

        public function delete($id){

            $db = $this->connect();

            try {
                $sql = "DELETE FROM bank WHERE id = :id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }

        public function read(){

            $db = $this->connect();

            try {
                $sql = "SELECT * FROM bank";
                $query = $db->query($sql);
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }

    }