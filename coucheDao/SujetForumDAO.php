<?php

include_once("interfDao.php");
include_once("connectionBaseDonnees.php");
include_once __DIR__ . "/../classe_metier/SujetTheme.php";

class SujetForumDAO implements InterfDao
{

    public function __construct()
    {
        $this->db = new ConnectionBaseDonnees(); // factorisation de la connection à la base de donnée
    }

    public function creat(object $sujetTheme): void
    {

        try {
            $db = $this->db->connectiondb();
            $typeSujet = $sujetTheme->getTypeSujetTh();
            $questionSujet = $sujetTheme->getQuestionSujet();
            $idUti = $sujetTheme->getIdUti();
            $stm = $db->prepare("INSERT INTO sujetfurum VALUES(NULL,?,?,NOW(),?)");
            $stm->bindValue(1, $typeSujet);
            $stm->bindValue(2, $questionSujet);
            $stm->bindValue(3, $idUti,  PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    public function read(): array
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM sujetfurum ORDER BY idSujetTh DESC");
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());            // Function Read Commentaires
        }
        $tab = [];
        foreach ($array as $value) {
            $sujetTheme = new SujetTheme();
            $sujetTheme->setIdSujetTh($value['idSujetTh'])->setTypeSujetTh($value['typeSujetTh'])
                ->setQuestionSujet($value['questionSujet'])->setDateAjout(new DateTime($value['dateAjoutSujet']))
                ->setIdUti($value['idUti']);
            $tab[] = $sujetTheme;
        }
        return $tab;
    }

    public function update(object $sujetTheme): void
    {

        try {
            $db = $this->db->connectiondb();
            $idSuje = $sujetTheme->getIdSujetForum();
            $intSujet = $sujetTheme->getIntSujet();
            $idTheme = $sujetTheme->getIdTheme();           // Function update Commentaire
            $idUti = $sujetTheme->getIdUti();
            $stm = $db->prepare("UPDATE sujetfurum SET typeSujetTh=?, idTheme=?, idUti=? WHERE idSujetTh =?");
            $stm->bindValue(1, $intSujet);
            $stm->bindValue(2, $idTheme,  PDO::PARAM_INT);
            $stm->bindValue(3, $idUti,  PDO::PARAM_INT);
            $stm->bindValue(4, $idSuje,  PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }


    public function delete(int $id): void
    {

        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("DELETE FROM sujetfurum WHERE idSujetTh = ?");     // Function Delete Commentaire
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        };
    }


    /**
     * recupere dans un array avec le sujet par id
     *
     * @return array
     */
    public function readById(?int $id): ?object
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM sujetfurum WHERE idSujetTh=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        if (!empty($array)) {
            foreach ($array as $value) {
                $sujetTheme = new SujetTheme();
                $sujetTheme->setIdSujetTh($value['idSujetTh'])->setTypeSujetTh($value['typeSujetTh'])->setDateAjout(new DateTime($value['dateAjoutSujet']))
                    ->setQuestionSujet($value['questionSujet'])
                    ->setIdUti($value['idUti']);
            }
            return $sujetTheme;
        } else {
            return null;
        }
    }
}
