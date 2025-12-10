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

    // Реєстрація з хешуванням паролю
    public static function register($username, $password)
    {
        $db = self::connect();

        $stmt = $db->prepare("INSERT INTO Users (username, password) VALUES (:u, :p)");

        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // bcrypt
            return $stmt->execute([
                ":u" => $username,
                ":p" => $hashedPassword,
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    // Логін з перевіркою хеша
    public static function login($username, $password)
    {
        $db = self::connect();

        $stmt = $db->prepare("SELECT * FROM Users WHERE username = :u");
        $stmt->execute([":u" => $username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) { // перевірка bcrypt
            return $user;
        }

        return false;
    }
}
