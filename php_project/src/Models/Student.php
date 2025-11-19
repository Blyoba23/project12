<?php
namespace App\Models;
class Student extends User {
    private string $group;
    public function getRole(): string { return "Студент"; }
    public function getGroup(): string { return $this->group; }
    public function setGroup(string $group): void { $this->group = $group; }
}