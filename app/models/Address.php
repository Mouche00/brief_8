<?php

    class Address {
        private $id;
        private $city;
        private $district;
        private $street;
        private $postalCode;
        private $email;
        private $telephone;

        public function __construct($city, $district, $street, $postalCode, $email, $telephone){
            $this->id = uniqid(mt_rand(), true);
            $this->city = $city;
            $this->district = $district;
            $this->street = $street;
            $this->postal_code = $postalCode;
            $this->email = $email;
            $this->telephone = $telephone;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }
        
        public function getCity(){
            return $this->city;
        }

        public function setCity($city){
            $this->city = $city;
        }

        public function getDistrict(){
            return $this->district;
        }

        public function setDistrict($district){
            $this->district= $district;
        }

        public function getPostalCode(){
            return $this->postalCode;
        }

        public function setPostalCode($postalCode){
            $this->postalCode = $postalCode;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getTelephone(){
            return $this->telephone;
        }

        public function setTelephone($telephone){
            $this->telephone = $telephone;
        }
    }

?>