<?php

include_once("interfDAO.php");
include_once("connectionBaseDonnees.php");
include_once("../classe_metier/Billet.php");

class BilletDAO implements InterfDao
{
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

    public function delete(int $id): void
    {
        try {
            $db = $this->db->connection();
            $stmt = $db->prepare("DELETE FROM billet WHERE idUti = ?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch(PDOException $f){
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }
}