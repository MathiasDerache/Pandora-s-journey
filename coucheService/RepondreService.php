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
    public function creatService(?object $repondre): ?object
    {
        return $this->service->creat($repondre);
    }

    // transmet l'objet reçu depuis la couche controller à la couche DAO
    public function updateService(?object $repondre): ?object
    {
        return $this->service->update($repondre);
    }

    // transmet le tableau reçu depuis la couche controller à la couche DAO
    public function readService(int $page = null, $theme = null): ?array
    {
        return $this->service->read($page, $theme);
    }

    /**
     * recupère un tableau de doinnée de la couche dao et la transmet au controlleur associé
     *
     * @return array
     */
    public function readByIdService(?int $id): ?object
    {
        return $this->service->readByIdService($id);
    }

    // transmet l'id reçu depuis la couche controller à la couche DAO
    public function deleteService(?int $id): ?int
    {
        return $this->service->delete($id);
    }
}
