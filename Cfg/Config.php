<?php

    namespace Cfg;

    abstract class Config
    {
        /**
         * @var string
         */
        protected $server = "localhost";
        protected $user = "root";
        protected $db_password = "root";
        protected $db_name = "test";
    }
