<?php
namespace App\Controllers;

class AboutMeController {
    public function index(): string {
        $name = "Єгор Лютий";
        $age = 17;
        $skills = ["PHP", "JavaScript", "SQL", "Git"];
        ob_start();
        include __DIR__ . '/../../views/aboutme.php';
        return ob_get_clean();
    }
}