<?php

    namespace Models;

    use mysqli;
    use Cfg\Config;

    abstract class Model extends Config
    {
        /**
         * @var array
         */
        private const DIFFERENT_PROPERTY = [
            'table' => null,
            'connect' => null,
            'user' => null,
            'db_password' => null,
            'server' => null,
            'db_name' => null,
            'id' => null,
        ];

        /**
         * @var mysqli
         */
        protected $connect;

        /**
         * @var string
         */
        protected $table = '';

        /**
         * @var int
         */
        public $id = 0;

        /**
         * @return void
         */
        public function __construct()
        {
            $this->connect = mysqli_connect($this->server, $this->user, $this->db_password, $this->db_name);

            if (!$this->connect) {
                die("Connection fail");
            }

            mysqli_set_charset($this->connect, "utf8");
        }

        /**
         *
         * @param int $id
         * @return self
         */
        public function setId(int $id): self
        {
            $this->id = $id;

            return $this;
        }

        /**
         *
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @return array
         */
        public function findAll(): array
        {
            $select = "SELECT * FROM `" . $this->table . "`";

            $result = mysqli_query($this->connect, $select);

            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

            return $rows;
        }

        /**
         * @return void
         */
        public function delete(): void
        {
            $delete = "DELETE FROM `" . $this->table . "` where `id` = '" . $this->getId() . "'";

            mysqli_query($this->connect, $delete);
        }

        /**
         * @param array
         * @return void
         */
        public function update(): void
        {
            $properties = $this->getProperties();

            if ($properties) {
                $update = "UPDATE `" . $this->table . "` SET " . implode(', ', $properties) . " WHERE `id` = '" . $this->getId() . "'";

                mysqli_query($this->connect, $update);
            }
        }

        /**
         *
         * @param string $id
         * @return array
         */
        public function findOne(string $id): array
        {
            $select = "SELECT * FROM `" . $this->table . "` where id = '" . $id . "'";

            $result = mysqli_query($this->connect, $select);

            return  mysqli_fetch_assoc($result);
        }

        /**
         * @return void
         */
        public function insert(): void
        {
            $properties = $this->getProperties();

            $insert = "INSERT INTO `" . $this->table . "` SET " . implode(', ', $properties);

            mysqli_query($this->connect, $insert);
        }

        /**
         * @return array
         */
        private function getProperties(): array
        {
            $properties_diff = array_diff_key(get_object_vars($this), self::DIFFERENT_PROPERTY);

            $properties = [];

            foreach ($properties_diff as $key => $value) {
                $properties[] = "`" . $key . "` = '" . $value . "'";
            }

            return $properties;
        }
    }
