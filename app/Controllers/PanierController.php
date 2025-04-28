<?php 
namespace App\Controllers;
use App\Models\PanierModel;

class PanierController extends BaseController
{
    public function index()
    {
        $model = new PanierModel();
        $data['paniers'] = $model->findAll();
        return view('liste_paniers', $data);
    }

    public function creer()
    {
        return view('formulaire_panier');
    }
}