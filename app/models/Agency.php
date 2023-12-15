<?php

    class Agency {
        private $id;
        private $longitude;
        private $latitude;
        private $bankId;
        private $addressId;

        public function __construct($longitude, $latitude, $bankId, $addressId){
            $this->id = uniqid(mt_rand(), true);
            $this->longitude = $longitude;
            $this->latitude = $latitude;
            $this->bankId = $bankId;
            $this->addressId = $addressId;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }
        
        public function getLongitude(){
            return $this->longitude;
        }

        public function setLongitude($longitude){
            $this->longitude = $longitude;
        }

        public function getLatitude(){
            return $this->latitude;
        }

        public function setLatitude($latitude){
            $this->latitude= $latitude;
        }

        public function getBankId(){
            return $this->bankId;
        }

        public function setBankId($bankId){
            $this->bankId = $bankId;
        }

        public function getAddressId(){
            return $this->addressId;
        }

        public function setAddressId($addressId){
            $this->addressId = $addressId;
        }
    }

?>