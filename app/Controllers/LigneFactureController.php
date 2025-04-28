<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LigneFactureModel;

class LigneFactureController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new LigneFactureModel();
    }

    // Afficher toutes les lignes de facture
    public function index()
    {
        $data = $this->model->findAll();
        return $this->response->setJSON($data);
    }

    // Ajouter une ligne de facture
    public function create()
    {
        $data = $this->request->getPost();

        if ($this->model->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Ligne ajoutée avec succès']);
        }

        return $this->response->setStatusCode(400)->setJSON([
            'status' => 'error',
            'errors' => $this->model->errors()
        ]);
    }

    // Mettre à jour une ligne de facture
    public function update($id)
    {
        $data = $this->request->getRawInput();

        if ($this->model->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Ligne mise à jour']);
        }

        return $this->response->setStatusCode(400)->setJSON([
            'status' => 'error',
            'errors' => $this->model->errors()
        ]);
    }

    // Supprimer une ligne
    public function delete($id)
    {
        if ($this->model->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Ligne supprimée']);
        }

        return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Échec de la suppression']);
    }

    // Afficher une ligne par ID
    public function show($id)
    {
        $ligne = $this->model->find($id);

        if ($ligne) {
            return $this->response->setJSON($ligne);
        }

        return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Ligne non trouvée']);
    }
}
