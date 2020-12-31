<?php
include_once __DIR__ . "/InterfService.php";
include_once __DIR__ . '/../coucheDao/ImageDao.php';


class ImageService implements InterfService
{
    // factorisation de l'instansiation d'objet ImageDao
    public function __construct()
    {
        $this->service = new ImageDAO();
    }

    // transmet l'objet reçu depuis la couche controleur à la couche DAO
    public function creatService(?Object $object): ?object
    {
        return $this->service->creat($object);
    }

    // transmet l'objet reçu depuis la couche controleur à la couche DAO
    public function updateService(?Object $object): ?object
    {
        return $this->service->update($object);
    }

    // Récupère le tableau reçu depuis la couche DAO et transmet à la couche controleur
    public function readService(): ?array
    {
        return $this->service->read();
    }

    /**
     * recupère un tableau de doinnée de la couche dao et la transmet au controlleur associé
     *
     * @return array
     */
    public function readByIdService(?int $id): ?array
    {
        return $this->service->readByIdService($id);
    }

    // transmet l'id reçu depuis la couche controleur à la couche DAO
    public function deleteService(?int $id): ?int
    {
        return $this->service->delete($id);
    }

    // transmet le nom du fichier reçu depuis la couche controleur à la couche DAO
    public function searchImageProfilService(?string $NomFichier): ?array
    {
        return $this->service->searchImageProfil($NomFichier);
    }
}
