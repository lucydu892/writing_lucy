<?php
    class User {
        private $firstName;
        private $lastName;
        private $email;
        private $phone;
        private $password;
        private $website;
        private $gender;

        public function __construct($firstName, $lastName, $email, $phone, $website) {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->phone = $phone;
            $this->website = $website;
        }
        public function getFirstName() {
            return $this->firstName;
        }
        public function getLastName() {
            return $this->lastName;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getPhone() {
            return $this->phone;
        }
        public function getPassword() {
            return $this->password;
        }
        public function getWebsite() {
            return $this->website;
        }
    }