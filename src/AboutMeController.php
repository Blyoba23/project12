<?php

namespace App\Controllers;

class AboutMeController
{
    public function index(): string
    {
        $data = [
            'name' => 'Глеб',
            'age' => 18,
            'hobby' => 'Програмування, ігри, спорт'
        ];

        ob_start();
        extract($data);
        require __DIR__ . '/../views/aboutme.php';
        return ob_get_clean();
    }
}
