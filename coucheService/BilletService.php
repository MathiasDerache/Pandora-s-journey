<?php
include_once __DIR__ . "/../coucheDao/BilletDao.php";
include_once __DIR__ . "/InterfService.php";

class BilletService implements interfService
{

    // factorisation de l'instansiation d'objet BilletDao
    public function __construct()
    {
        $this->service = new BilletDAO();
    }

    /**
     * recupère une instance de la couche controlleur et la transmet à la couche dao
     *
     * @param object $object
     * @return object
     */
    public function creatService(?Object $billet): ?object
    {
        return $this->service->creat($billet);
    }

    // transmet l'objet reçu depuis la couche controller à la couche DAO
    public function updateService(?Object $billet): ?object
    {
        return $this->service->update($billet);
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

    // transmet le tableau reçu depuis la couche DAO à la couche controlleur
    public function readByIdUtiService(int $page = null): ?array
    {
        return $this->service->readByIdUti($page);
    }
}
