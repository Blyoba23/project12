<?php
namespace App\Models;

abstract class User {
    private string $name;
    private string $email;

    public function __construct(string $name, string $email) {
        $this->name = $name;
        $this->email = $email;
    }

    abstract public function getRole(): string;

    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
    public function setName(string $name): void { $this->name = $name; }
    public function setEmail(string $email): void { $this->email = $email; }
}