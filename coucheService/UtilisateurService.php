<?php
include_once __DIR__ . "/../coucheDao/UtilisateurDao.php";
include_once __DIR__ . "/InterfService.php";


class UtilisateurService implements interfService
{
    public function __construct()
    {
        $this->service = new UtilisateurDao();
    }

    public function creatService(?object $object): ?object
    {
        try {
            $passwordHash = password_hash($object->getPassword(), PASSWORD_DEFAULT);
            $object->setPassword($passwordHash);
            $result = $this->service->creat($object);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $result;
    }

    public function updateService(?object $object): ?object
    {
        try {
            $passwordHash = password_hash($object->getPassword(), PASSWORD_DEFAULT);
            $object->setPassword($passwordHash);
            $result = $this->service->update($object);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $result;
    }

    public function readService(int $page = null, $theme = null): ?array
    {
        try {
            $array = $this->service->read($page, $theme);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $array;
    }

    /**
     * recupère un tableau de doinnée de la couche dao et la transmet au controlleur associé
     *
     * @return array
     */
    public function readByIdService(?int $id): ?object
    {
        try {
            $object =  $this->service->readById($id);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $object;
    }

    public function deleteService(?int $id): ?int
    {
        try {
            $result = $this->service->delete($id);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $result;
    }

    public function searchByEmailService(string $email): ?object
    {
        try {
            $object =  $this->service->searchByEmail($email);
        } catch (DaoException $e) {
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $object;
    }

    public function connexion(Utilisateur $utilisateur, Utilisateur $userData): ?Utilisateur
    {
        $passwordVerify = password_verify($utilisateur->getPassword(), $userData->getPassword());
        if ($passwordVerify) {
            return $userData;
        } else {
            $userData = null;
            return $userData;
        }
    }
}
