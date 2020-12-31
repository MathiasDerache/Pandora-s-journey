<?php

include_once("interfDao.php");
include_once("connectionBaseDonnees.php");
include_once("../classe_metier/CommentaireSujet.php");

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
            $idCommSuj = $commSujet->getIdCommSuj();
            $pseudoUt = $commSujet->getPseudoUt();              // Function create Commentaire
            $dateCommSuj = $commSujet->getDateCommSuj()->format('Y-m-d');
            $contCommSuj = $commSujet->getContCommSuj();
            $idSuje = $commSujet->getIdSuje();
            $idUti = $commSujet->getIdUti();
            $stm = $db->prepare("INSERT INTO commentairefurum VALUES(?,?,?,?,?,?)");
            $stm->bindValue(1, $idCommSuj, PDO::PARAM_INT);
            $stm->bindValue(2, $pseudoUt);
            $stm->bindValue(3, $dateCommSuj);
            $stm->bindValue(4, $contCommSuj);
            $stm->bindValue(5, $idSuje, PDO::PARAM_INT);
            $stm->bindValue(6, $idUti,  PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    public function read(): array
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
            $dateCommSuj = $commSujet->getDateCommSuj();
            $contCommSuj = $commSujet->getContCommSuj();
            $idSuje = $commSujet->getIdSuje();
            $idUti = $commSujet->getIdUti();
            $stm = $db->prepare("UPDATE commentairefurum SET psodoUt=?, dateComSuj=?, contComSuj=?, idSujetTh=?, idUti=?  WHERE idcommSujet =?");
            $stm->bindValue(1, $pseudoUt);
            $stm->bindValue(2, $dateCommSuj);
            $stm->bindValue(3, $contCommSuj);
            $stm->bindValue(4, $idSuje,  PDO::PARAM_INT);
            $stm->bindValue(5, $idUti,  PDO::PARAM_INT);
            $stm->bindValue(6, $idCommSuj,  PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
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
    public function readById(int $id): array
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
}
