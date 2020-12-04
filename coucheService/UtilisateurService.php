<?php
include_once __DIR__ . "/../coucheDao/UtilisateurDao.php";
include_once __DIR__ . "/InterfService.php";


class UtilisateurService implements interfService
{
    public function __construct()
    {
        $this->service = new UtilisateurDao();
    }

    public function creatService(object $object): object
    {
        return $this->service->creat($object);
    }

    public function updateService(object $object): object
    {
        return $this->service->update($object);
    }

    public function readService(): array
    {
        return $this->service->read();
    }

    public function deleteService(int $id): int
    {
        return $this->service->delete($id);
    }
}
