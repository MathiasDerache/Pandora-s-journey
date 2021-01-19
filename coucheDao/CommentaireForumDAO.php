<?php

include_once("interfDao.php");
include_once("connectionBaseDonnees.php");
include_once __DIR__ . "/../classe_metier/CommentaireSujet.php";
include_once __DIR__ . "/DaoException.php";


class CommentaireForumDAO implements InterfDao
{

    public function __construct()
    {
        $this->db = new ConnectionBaseDonnees(); // factorisation de la connection à la base de donnée
    }

    public function creat(object $commSujet): void
    {

        try {
            $db = $this->db->connectiondb();
            $pseudo = $commSujet->getPseudoUt();
            $contCommSuj = $commSujet->getContCommSuj();
            $idSuje = $commSujet->getIdSuje();
            $idUti = $commSujet->getIdUti();
            $stm = $db->prepare("INSERT INTO commentairefurum VALUES(NULL,?,NOW(),?,?,?)");
            $stm->bindValue(1, $pseudo);
            $stm->bindValue(2, $contCommSuj);
            $stm->bindValue(3, $idSuje, PDO::PARAM_INT);
            $stm->bindValue(4, $idUti,  PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getMessage());
        }
    }

    public function read(int $page = null, $theme = null): array
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM commentairefurum");
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());            // Function Read Commentaires
        }
        $tab = [];
        foreach ($array as $value) {
            $commSujet = new CommentaireSujet();
            $commSujet->setIdCommSuj($value['idcommSujet'])->setPseudoUt($value['psodoUt'])
                ->setDateCommSuj(new DateTime($value['dateComSuj']))
                ->setContCommSuj($value['contComSuj'])->setIdSuje($value['idSujetTh'])
                ->setIdUti($value['idUti']);
            $tab[] = $commSujet;
        }
        return $tab;
    }


    public function update(object $commSujet): void
    {

        try {
            $db = $this->db->connectiondb();
            $idCommSuj = $commSujet->getIdCommSuj();
            $pseudoUt = $commSujet->getPseudoUt();                                      // Function update Commentaire
            $dateCommSuj = $commSujet->getDateCommSuj()->format("Y-m-d");
            $contCommSuj = $commSujet->getContCommSuj();
            $idSuje = $commSujet->getIdSuje();
            $idUti = $commSujet->getIdUti();
            $stm = $db->prepare("UPDATE commentairefurum SET pseudoUt=?, dateComSuj=?, contComSuj=?, idSujetTh=?, idUti=?  WHERE idcommSujet =?");
            $stm->bindValue(1, $pseudoUt);
            $stm->bindValue(2, $dateCommSuj);
            $stm->bindValue(3, $contCommSuj);
            $stm->bindValue(4, $idSuje,  PDO::PARAM_INT);
            $stm->bindValue(5, $idUti,  PDO::PARAM_INT);
            $stm->bindValue(6, $idCommSuj,  PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getMessage());
        }
    }


    public function delete(int $id): void
    {

        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("DELETE FROM commentairefurum WHERE idcommSujet = ?");     // Function Delete Commentaire
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    /**
     * recupere dans un array avec le commentaire du forum par id
     *
     * @return array
     */
    public function readById(?int $id): ?object
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM commentairefurum WHERE idComSujet=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }

        foreach ($array as $value) {
            $commSujet = new CommentaireSujet();
            $commSujet->setIdCommSuj($value['idcommSujet'])->setPseudoUt($value['psodoUt'])
                ->setDateCommSuj(new DateTime($value['dateComSuj']))
                ->setContCommSuj($value['contComSuj'])->setIdSuje($value['idSujetTh'])
                ->setIdUti($value['idUti']);
        }
        return $commSujet;
    }

    public function foundCommentaireById(?int $id): ?array
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM commentairefurum WHERE idSujetTh=? ORDER BY idcommsujet DESC");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());            // Function Read Commentaires
        }
        $tab = [];
        foreach ($array as $value) {
            $commSujet = new CommentaireSujet();
            $commSujet->setIdCommSuj($value['idcommSujet'])->setPseudoUt($value['pseudoUt'])
                ->setDateCommSuj(new DateTime($value['dateComSuj']))
                ->setContCommSuj($value['contComSuj'])->setIdSuje($value['idSujetTh'])
                ->setIdUti($value['idUti']);
            $tab[] = $commSujet;
        }
        return $tab;
    }

    public function readIdService(?int $id): ?object
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM commentairefurum WHERE idcommSujet=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());            // Function Read Commentaires
        }

        foreach ($array as $value) {
            $commSujet = new CommentaireSujet();
            $commSujet->setIdCommSuj($value['idcommSujet'])->setPseudoUt($value['pseudoUt'])
                ->setDateCommSuj(new DateTime($value['dateComSuj']))
                ->setContCommSuj($value['contComSuj'])->setIdSuje($value['idSujetTh'])
                ->setIdUti($value['idUti']);
        }
        return $commSujet;
    }
}
