<?php
include_once __DIR__ . "/../coucheDao/SujetForumDao.php";
include_once __DIR__ . "/InterfService.php";


class SujetForumService implements interfService
{

    public function __construct()
    {
        $this->service = new SujetForumDao();
    }

    public function creatService(?object $object): ?object
    {
        return $this->service->creat($object);              // Function create Commentaire
    }

    public function readService(int $page = null, $theme = null): ?array
    {
        return $this->service->read($page, $theme);              // Function Read Commentaires
    }

    /**
     * recupère un tableau de doinnée de la couche dao et la transmet au controlleur associé
     *
     * @return array
     */
    public function readByIdService(?int $id): ?object
    {
        return $this->service->readById($id);
    }

    public function updateService(?object $object): ?object
    {
        return $this->service->update($object);             // Function update Commentaire
    }

    public function deleteService(?int $id): ?int
    {
        return $this->service->delete($id);         // Function Delete Commentaire
    }
}
