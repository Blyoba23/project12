<?php
namespace App\Models;
class Teacher extends User {
    private string $subject;
    public function getRole(): string { return "Викладач"; }
    public function getSubject(): string { return $this->subject; }
    public function setSubject(string $subject): void { $this->subject = $subject; }
}