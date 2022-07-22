<?php

    class ConexaoDB {
        private static $instancia = null;

        public static function instancia() : PDO
        {        
            $host = 'localhost';
            $database = 'curso_php_cm';
            $username = 'root';
            $password = '';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$database;charset=$charset";
            $options = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            );

            self::$instancia = new PDO($dsn, $username, $password, $options);
            // self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return self::$instancia;
        }
    }

?>