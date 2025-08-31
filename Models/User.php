<?php

    namespace Models;

    include_once __DIR__ . "/../Models/Model.php";

    use Models\Model;

    class User extends Model
    {
        /**
         * @var string
         */
        protected $table = 'users';

        /**
         * @var string
         */
        protected $name;

        /**
         * @var string
         */
        protected $password;

        /**
         * @var string
         */
        protected $email;

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @param string $name
         * @return self
         */
        public function setName(string $name): self
        {
            $this->name = $name;

            return $this;
        }

        /**
         * @return string
         */
        public function getPassword(): string
        {
            return $this->password;
        }

        /**
         * @param string $password
         * @return self
         */
        public function setPassword(string $password): self
        {
            $this->password = $password;

            return $this;
        }

        /**
         * @return string
         */
        public function getEmail(): string
        {
            return $this->email;
        }

        /**
         * @param string $email
         * @return self
         */
        public function setEmail(string $email): self
        {
            $this->email = $email;

            return $this;
        }

        /**
         * @return string
         */
        public function getTable(): string
        {
            return $this->table;
        }
    }
