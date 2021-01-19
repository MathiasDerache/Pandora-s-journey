<?php
include_once __DIR__ . "/../coucheDao/CommentaireAnnDao.php";
include_once __DIR__ . "/InterfService.php";


class annoncesService implements interfService
{
    /**
     * factorisation de l'instansiation d'objet CommentaireAnnDao
     */
    public function __construct()
    {
        $this->service = new CommentaireAnnDao();
    }

    /**
     * recupère une instance de la couche controlleur et la transmet à la couche dao
     *
     * @param object $object
     * @return object
     */
    public function creatService(?object $object): ?object
    {
        return $this->service->creat($object);
    }

    /**
     * recupère une instance de la couche controlleur et la transmet à la couche dao
     *
     * @param object $object
     * @return object
     */
    public function updateService(?object $object): ?object
    {
        return $this->service->update($object);
    }

    /**
     * recupère un tableau de doinnée de la couche dao et la transmet au controlleur associé
     *
     * @return array
     */
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

    /**
     * recupère un int de la couche controlleur et la transmet à la couche dao
     *
     * @param integer $id
     * @return integer
     */
    public function deleteService(?int $id): ?int
    {
        return $this->service->delete($id);
    }
}
