<?php
include_once __DIR__ . "/../coucheDao/AnnoncesDao.php";
include_once __DIR__ . "/InterfService.php";


class AnnoncesService implements interfService
{
    /**
     * factorisation de l'instansiation d'objet AnnoncesDao
     */
    public function __construct()
    {
        $this->service = new AnnoncesDao();
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
     * recupère un objet de de la couche dao et la transmet au controlleur associé
     *
     * @return object
     */
    public function readByIdService(?int $id): ?object
    {
        return $this->service->readById($id);
    }

    /**
     * recupère un objet de de la couche dao et la transmet au controlleur associé
     *
     * @return object
     */
    public function readByTypeService(?string $type): ?array
    {
        return $this->service->readByType($type);
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

    public function selectAllAsTotalService(?string $type): ?int
    {
        return $this->service->selectAllAsTotal($type);
    }

    /**
     * recupère un tableau de doinnée de la couche dao et la transmet au controlleur associé
     *
     * @return array
     */
    public function readPaginationService(?string $typeAnnonce, ?int $premiereEntree, ?int $annonceParPage): array
    {
        return $this->service->readPagination($typeAnnonce, $premiereEntree, $annonceParPage);
    }

    public function readByTitreService(?string $titreAnnonce): ?object
    {
        return $this->service->readByTitre($titreAnnonce);
    }
}
