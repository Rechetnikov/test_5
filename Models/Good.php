<?php

    namespace Models;

    use Models\Model;

    class Good extends Model
    {
        /**
         * @var string
         */
        protected $table = 'goods';

        /**
         * @var string
         */
        public $name;

        /**
         * @var float
         */
        public $price;

        /**
         * @var string
         */
        public $img;

        /**
         *
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         *
         * @param string $name
         * @return self
         */
        public function setName(string $name): self
        {
            $this->name = $name;

            return $this;
        }

        /**
         *
         * @return float
         */
        public function getPrice(): float
        {
            return $this->price;
        }

        /**
         *
         * @param float $price
         * @return self
         */
        public function setPrice(float $price): self
        {
            $this->price = $price;

            return $this;
        }

        /**
         * @param string $img
         * @return self
         */
        public function setImg($img): self
        {
            $this->img = $img;

            return $this;
        }
        /**
         * @return string
         */

        public function getImg(): string
        {
            return $this->img;
        }
    }
