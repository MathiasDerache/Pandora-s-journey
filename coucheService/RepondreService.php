<?php
include_once("../coucheDao/RepondreDAO.php");
include_once("InterfService.php");

class RepondreService implements interfService
{
    // factorisation de l'instansiation d'objet AnnoncesDao
    public function __construct()
    {
        $this->service = new RepondreDAO();
    }

    // transmet l'objet reçu depuis la couche controller à la couche DAO
    public function creatService(Repondre $repondre): object
    {
        return $this->service->creat($repondre);
    }

    // transmet l'objet reçu depuis la couche controller à la couche DAO
    public function updateService(Repondre $repondre): object
    {
        return $this->service->update($repondre);
    }

    // transmet le tableau reçu depuis la couche controller à la couche DAO
    public function readService(): array
    {
        return $this->service->read();
    }

    // transmet l'id reçu depuis la couche controller à la couche DAO
    public function deleteService(int $id): int
    {
        return $this->service->delete($id);
    }
}