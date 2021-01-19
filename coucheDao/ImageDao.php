<?php
include_once __DIR__ . '/InterfDao.php';
include_once __DIR__ . '/../classe_metier/Image.php';
include_once __DIR__ . '/connectionBaseDonnees.php';
include_once __DIR__ . '/DaoException.php';

class ImageDao implements
    InterfDao
{
    public function __construct()
    {
        $this->db = new ConnectionBaseDonnees(); // factorisation de la connection à la base de donnée
    }

    /**
     * methode d'ajout d'une Image
     *
     * @param object $object
     * @return void
     */
    public function creat(object $object): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("INSERT INTO image VALUES(null,?,?,?,?,?)");
            //recuperation des infos de $object instance de la class Annonce
            $NomFichier = $object->getNomFichier();
            $tailleFichier = $object->getTailleFichier();
            $PathFile = $object->getPathFile();
            $TypeImage = $object->getTypeImage();
            $IdUti = $object->getIdUti();

            //je lie chaque variable à la requete preparée
            $stm->bindValue(1, $NomFichier);
            $stm->bindValue(2, $tailleFichier, PDO::PARAM_INT);
            $stm->bindValue(3, $PathFile);
            $stm->bindValue(4, $TypeImage);
            $stm->bindValue(5, $IdUti, PDO::PARAM_INT);
            //execution de la requete preparée
            $stm->execute();
        } catch (PDOException $e) {
            throw new DaoException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * modification Image
     *
     * @param object $object
     * @return void
     */
    public function update(object $object): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("UPDATE image SET NomFichier=?,TailleFichier=?, TypeImage=?, PathFile=? WHERE Id=?");
            $idImage = $object->getId();
            $NomFichier = $object->getNomFichier();
            $TailleFichier = $object->getTailleFichier();
            $TypeImage = $object->getTypeImage();
            $PathFile = $object->getPathFile();

            $stm->bindValue(1, $NomFichier);
            $stm->bindValue(2, $TailleFichier, PDO::PARAM_INT);
            $stm->bindValue(3, $TypeImage);
            $stm->bindValue(4, $PathFile);
            $stm->bindValue(5, $idImage, PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $e) {
            throw new DaoException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * recupere dans un array toutes les annonces et les retourne
     *
     * @return array
     */
    public function read(int $page = null, $theme = null): array
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM image");
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new DaoException($e->getMessage(), (int)$e->getCode());
        }
        $tab = [];
        foreach ($array as $value) {
            $image = new Image();
            $image->setId($value['Id'])->setNomFichier($value['NomFichier'])->setTypeImage($value['TypeImage'])
                ->setPathFile($value['PathFile'])->setIdUti($value['idUti'])
                ->setTailleFichier($value['TailleFichier']);
            $tab[] = $image;
        }
        return $tab;
    }

    /**
     * supprime l'annonce
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("DELETE FROM image WHERE id=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $e) {
            throw new DaoException($e->getMessage(), (int)$e->getCode());
        }
    }


    public function searchImageProfil(string $NomFichier): array
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM image WHERE NomFichier=?");
            $stm->bindValue(1, $NomFichier);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new DaoException($e->getMessage(), (int)$e->getCode());
        }
        return $array;
    }

    /**
     * recupere dans un array avec l'image par id
     *
     * @return array
     */
    public function readById(?int $id): ?object
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM image WHERE Id=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new DaoException($e->getMessage(), (int)$e->getCode());
        }

        foreach ($array as $value) {
            $image = new Image();
            $image->setId($value['Id'])->setNomFichier($value['NomFichier'])->setTypeImage($value['TypeImage'])
                ->setPathFile($value['PathFile'])->setIdUti($value['idUti'])
                ->setTailleFichier($value['TailleFichier']);
        }
        return $image;
    }
}
