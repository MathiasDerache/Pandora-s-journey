<?php
include_once __DIR__ . "/InterfService.php";
include_once __DIR__ . '/../coucheDao/ImageDao.php';
include_once __DIR__ . '/ServiceException.php';


class ImageService implements
    InterfService
{
    // factorisation de l'instansiation d'objet ImageDao
    public function __construct()
    {
        $this->service = new ImageDAO();
    }

    // transmet l'objet reçu depuis la couche controleur à la couche DAO
    public function creatService(?Object $object): ?object
    {
        try {
            $object = $this->service->creat($object);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $object;
    }

    // transmet l'objet reçu depuis la couche controleur à la couche DAO
    public function updateService(?Object $object): ?object
    {
        try {
            $object = $this->service->update($object);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $object;
    }

    // Récupère le tableau reçu depuis la couche DAO et transmet à la couche controleur
    public function readService(int $page = null, $theme = null): ?array
    {
        try {
            $object = $this->service->read($page, $theme);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $object;
    }

    /**
     * recupère un tableau de doinnée de la couche dao et la transmet au controlleur associé
     *
     * @return array
     */
    public function readByIdService(?int $id): ?object
    {
        try {
            $object = $this->service->readByIdService($id);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $object;
    }

    // transmet l'id reçu depuis la couche controleur à la couche DAO
    public function deleteService(?int $id): ?int
    {
        try {
            $int = $this->service->delete($id);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $int;
    }

    // transmet le nom du fichier reçu depuis la couche controleur à la couche DAO
    public function searchImageProfilService(?string $NomFichier): ?array
    {
        try {
            $array = $this->service->searchImageProfil($NomFichier);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $array;
    }
}
