<?php

include_once("interfDAO.php");
include_once("connectionBaseDonnees.php");
include_once("../classe_metier/Repondre.php");

class RepondreDAO implements InterfDao
{
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

    public function read(): array
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

    public function delete(int $id): void
    {
        try {
            $db = $this->db->connection();
            $stmt = $db->prepare("DELETE FROM repondre WHERE idCom = ?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch(PDOException $f){
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }
}