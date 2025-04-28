<?php
namespace App\Controllers;

class TestDB extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        try {
            $query = $db->query('SELECT 1');
            echo "Connexion MySQL fonctionnelle!";
        } catch (\Exception $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
}