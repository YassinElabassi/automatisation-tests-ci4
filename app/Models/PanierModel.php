<?php 
namespace App\Models;
use CodeIgniter\Model;

class PanierModel extends Model
{
    protected $table = 'paniers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['date_commande', 'client'];
    protected $useTimestamps = false;

    // Exemple de méthode custom
    public function getCommandesRecent()
    {
        return $this->where('date_commande >=', date('Y-m-d', strtotime('-7 days')))
                   ->findAll();
    }
}