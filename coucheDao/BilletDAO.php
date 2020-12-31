<?php

include_once("interfDAO.php");
include_once("connectionBaseDonnees.php");
include_once("../classe_metier/Billet.php");

class BilletDAO implements InterfDao
{
    public function __construct()
    {
        $this->db = new ConnectionBaseDonnees(); // factorisation de la connection à la base de donnée
    }

    // Récupère l'objet transmis par la couche Service afin de créer le billet dans la base de données
    public function creat(Billet $billet): void
    {
        $numBillet = $billet->getNumBillet();
        $dateEmb = $billet->getDateEmb();
        $idUti = $billet->getIdUti();
        try {
            $db = $this->db->connection();
            $stmt = $db->prepare("INSERT INTO billet VALUES(?,?,?)");
            $stmt->bindValue(1, $numBillet, PDO::PARAM_INT);
            $stmt->bindValue(2, $dateEmb);
            $stmt->bindValue(3, $idUti, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    // Transmets un tableau avec toutes les données à la couche Service
    public function read(): array
    {
        try {
            $db = $this->db->connection();
            $stmt = $db->prepare("SELECT * FROM billet");
            $stmt->execute();
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        foreach ($array as $value) {
            $billet = new Billet();
            $billet->setNumBillet($value["numeroDeBillet"])->setDateEmb($value["dateEmb"])->setIdUti($value["idUti"]);
            $tab[] = $billet;
        }
        return $tab;
    }

    // Récupère l'objet transmis par la couche Service afin de modifier le billet dans la base de données
    public function update(Billet $billet): void
    {
        $numBillet = $billet->getNumBillet();
        $dateEmb = $billet->getDateEmb();
        $idUti = $billet->getIdUti();
        try {
            $db = $this->db->connection();
            $stmt = $db->prepare("UPDATE billet SET numeroDeBillet = ?, dateEmb = ? WHERE idUti = ?");
            $stmt->bindValue(1, $numBillet, PDO::PARAM_INT);
            $stmt->bindValue(2, $dateEmb);
            $stmt->bindValue(3, $idUti, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    // Récupère l'id du billet transmis par la couche Service afin de le supprimer dans la base de données
    public function delete(int $id): void
    {
        try {
            $db = $this->db->connection();
            $stmt = $db->prepare("DELETE FROM billet WHERE idUti = ?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    /**
     * recupere dans un array avec le billet par id
     *
     * @return array
     */
    public function readById(int $id): array
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM billet WHERE numeroDeBillet=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        $tab = [];
        foreach ($array as $value) {
            $billet = new Billet();
            $billet->setNumBillet($value["numeroDeBillet"])->setDateEmb($value["dateEmb"])->setIdUti($value["idUti"]);
            $tab[] = $billet;
        }
        return $tab;
    }
}
