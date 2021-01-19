<?php

include_once("interfDAO.php");
include_once("connectionBaseDonnees.php");
include_once("../classe_metier/Repondre.php");

class RepondreDAO implements InterfDao
{

    public function __construct()
    {
        $this->db = new ConnectionBaseDonnees(); // factorisation de la connection à la base de donnée
    }

    // Récupère l'objet transmis par la couche Service afin d'ajouter la reponse dans la base de données
    public function creat(Repondre $repondre): void
    {
        $idComm = $repondre->getIdComm();
        $idComm_commentaire = $repondre->getIdComm_commentaire();
        try {
            $db = $this->db->connection();
            $stmt = $db->prepare("INSERT INTO repondre VALUES(?,?)");
            $stmt->bindValue(1, $idComm, PDO::PARAM_INT);
            $stmt->bindValue(3, $idComm_commentaire, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    // Transmets un tableau avec toutes les données à la couche Service
    public function read(int $page = null, $theme = null): array
    {
        try {
            $db = $this->db->connection();
            $stmt = $db->prepare("SELECT * FROM repondre");
            $stmt->execute();
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        foreach ($array as $value) {
            $repondre = new Repondre();
            $repondre->setIdComm($value["idCom"])->setIdComm_commentaire($value["idCom_commentaire"]);
            $tab[] = $repondre;
        }
        return $tab;
    }

    // Récupère l'objet transmis par la couche Service afin de modifier la reponse dans la base de données
    public function update(Repondre $repondre): void
    {
        $idComm = $repondre->getIdComm();
        $idComm_commentaire = $repondre->getIdComm_commentaire();
        try {
            $db = $this->db->connection();
            $stmt = $db->prepare("UPDATE repondre SET idCom_commentaire = ? WHERE idCom = ?");
            $stmt->bindValue(1, $idComm, PDO::PARAM_INT);
            $stmt->bindValue(3, $idComm_commentaire, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    // Récupère l'id de la reponse transmis par la couche Service afin de la supprimer dans la base de données
    public function delete(int $id): void
    {
        try {
            $db = $this->db->connection();
            $stmt = $db->prepare("DELETE FROM repondre WHERE idCom = ?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    /**
     * recupere dans un array avec la réponse par id
     *
     * @return array
     */
    public function readById(?int $id): ?object
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM repondre WHERE idCom=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        foreach ($array as $value) {
            $repondre = new Repondre();
            $repondre->setIdComm($value["idCom"])->setIdComm_commentaire($value["idCom_commentaire"]);
        }
        return $repondre;
    }
}
