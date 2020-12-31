<?php
include_once("../coucheDao/BilletDAO.php");
include_once("InterfService.php");

class BilletService implements interfService
{
    // factorisation de l'instansiation d'objet BilletDao
    public function __construct()
    {
        $this->service = new BilletDAO();
    }

    // transmet l'objet reçu depuis la couche controller à la couche DAO
    public function creatService(Billet $billet): object
    {
        return $this->service->creat($billet);
    }

    // transmet l'objet reçu depuis la couche controller à la couche DAO
    public function updateService(Billet $billet): object
    {
        return $this->service->update($billet);
    }

    // transmet le tableau reçu depuis la couche controller à la couche DAO
    public function readService(): array
    {
        return $this->service->read();
    }

            /**
     * recupère un tableau de doinnée de la couche dao et la transmet au controlleur associé
     *
     * @return array
     */
    public function readByIdService(int $id): array
    {
        return $this->service->readByIdService($id);
    }

    // transmet l'id reçu depuis la couche controller à la couche DAO
    public function deleteService(int $id): int
    {
        return $this->service->delete($id);
    }
}
