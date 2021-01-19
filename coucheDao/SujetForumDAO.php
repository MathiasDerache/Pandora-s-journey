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

    public function read(int $page = null, $theme = null): array
    {
        try {
            $db = $this->db->connectiondb();
            if ($theme) {
                $request = "SELECT COUNT('id') FROM sujetfurum WHERE typeSujetTh = '$theme'";
            } else {
                $request = "SELECT COUNT('id') FROM sujetfurum";
            }
            // ici je recupère le nombre de sujet présentr dans ma bdd et je converti le résultat en entier
            $count = (int) $db->query($request)->fetch()[0];
            // je fait un sorte que $page par défaut soit un entier égal à 1
            $pageCourante = (int) ($page ?? 1);
            if ($pageCourante < 1) {
                $pageCourante = 1;
            }
            //ici j'indique le nombre de sujets par page
            $nbrSujetPage = 5;
            // ici je calcul le nombre de page
            $nbrPages = ceil($count / $nbrSujetPage);
            // calcul du point de départ dynamique
            $offset = $nbrSujetPage * ($pageCourante - 1);

            if ($theme) {
                $reqsql = "SELECT * FROM sujetfurum WHERE typeSujetTh = '$theme' ORDER BY idSujetTh DESC LIMIT $offset ,$nbrSujetPage";
            } else {
                $reqsql = "SELECT * FROM sujetfurum ORDER BY idSujetTh DESC LIMIT $offset ,$nbrSujetPage";
            }

            $stm = $db->prepare($reqsql);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getMessage());
        }
        $tab = [];
        foreach ($array as $value) {
            $sujetTheme = new SujetTheme();
            $sujetTheme->setIdSujetTh($value['idSujetTh'])->setTypeSujetTh($value['typeSujetTh'])
                ->setQuestionSujet($value['questionSujet'])->setDateAjout(new DateTime($value['dateAjoutSujet']))
                ->setIdUti($value['idUti']);
            $tab[] = $sujetTheme;
        }
        return [$tab, $nbrPages];
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
