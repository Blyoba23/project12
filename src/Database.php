<?php

class Database
{
    private static $db;

    public static function connect()
    {
        if (self::$db === null) {
            self::$db = new PDO("sqlite:" . __DIR__ . "/../database.db");
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "CREATE TABLE IF NOT EXISTS Users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT UNIQUE,
                password TEXT
            )";
            self::$db->exec($query);
        }

        return self::$db;
    }

    public static function register($username, $password)
    {
        $db = self::connect();

        $stmt = $db->prepare("INSERT INTO Users (username, password) VALUES (:u, :p)");

        try {
            return $stmt->execute([
                ":u" => $username,
                ":p" => $password,
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function login($username, $password)
    {
        $db = self::connect();

        $stmt = $db->prepare("SELECT * FROM Users WHERE username = :u AND password = :p");
        $stmt->execute([
            ":u" => $username,
            ":p" => $password
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
