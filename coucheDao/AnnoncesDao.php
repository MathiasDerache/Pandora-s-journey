<?php
include_once __DIR__ . '/InterfDao.php';
include_once __DIR__ . '/../classe_metier/Annonce.php';
include_once __DIR__ . '/ConnectionBaseDonnees.php';

class AnnoncesDao implements InterfDao
{
    public function __construct()
    {
        $this->db = new ConnectionBaseDonnees(); // factorisation de la connection à la base de donnée
    }

    /**
     * methode d'ajout d'un commentaire
     *
     * @param object $object
     * @return void
     */
    public function creat(object $object): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("INSERT INTO annonces VALUES(null,?,?,?,?,?,?,?,?)");
            //recuperation des infos de $object instance de la class Annonce
            $typeAnnonce = $object->getTypeAnn();
            $titre = $object->getTitreAnn();
            $descAnn = $object->getDescAnn();
            $numContAnn = $object->getNumContAnn();
            $numAdressAnn = $object->getNumAdressAnn();
            $rueAnn = $object->getrueAnn();
            $codePost = $object->getCodePost();
            $idUti = $object->getIdUti();
            //je lie chaque variable à la requete preparée
            $stm->bindValue(1, $typeAnnonce);
            $stm->bindValue(2, $titre);
            $stm->bindValue(3, $descAnn);
            $stm->bindValue(4, $numContAnn);
            $stm->bindValue(5, $numAdressAnn, PDO::PARAM_INT);
            $stm->bindValue(6, $rueAnn, PDO::PARAM_INT);
            $stm->bindValue(7, $codePost, PDO::PARAM_INT);
            $stm->bindValue(8, $idUti);
            //execution de la requete preparée
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    /**
     * modification annonce
     *
     * @param object $object
     * @return void
     */
    public function update(object $object): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("UPDATE annonces SET TypeAnnonce=?, titre=?, description=?
                                ,numContact=?,numAdresse=?,rue=?,codePostal=?,idUti=? WHERE idAnnoce=?");
            //recuperation des infos de $object instance de la class Annonce
            $typeAnnonce = $object->getTypeAnn();
            $titre = $object->getTitreAnn();
            $descAnn = $object->getDescAnn();
            $numContAnn = $object->getNumContAnn();
            $numAdressAnn = $object->getNumAdressAnn();
            $rueAnn = $object->getrueAnn();
            $codePost = $object->getCodePost();
            $idUti = $object->getIdUti();
            $idAnn = $object->getIdAnn();
            //je lie chaque variable à la requete preparée
            $stm->bindValue(1, $typeAnnonce);
            $stm->bindValue(2, $titre);
            $stm->bindValue(3, $descAnn);
            $stm->bindValue(4, $numContAnn);
            $stm->bindValue(5, $numAdressAnn, PDO::PARAM_INT);
            $stm->bindValue(6, $rueAnn, PDO::PARAM_INT);
            $stm->bindValue(7, $codePost, PDO::PARAM_INT);
            $stm->bindValue(8, $idUti);
            $stm->bindValue(9, $idAnn, PDO::PARAM_INT);
            //execution de la requete preparée
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
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
            $stm = $db->prepare("SELECT * FROM annonces");
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        $tab = [];
        foreach ($array as $value) {
            $annonce = new Annonce();
            $annonce->setIdAnn($value['idAnnoce'])->setTypeAnn($value['typeAnnonce'])->setTitreAnn($value['titre'])->setDescAnn($value['description'])
                ->setNumContAnn($value['numContact'])->setNumAdressAnn($value['numAdresse'])
                ->setRueAnn($value['rue'])->setCodePost($value['codePostal'])->setIdUti($value['idUti']);
            $tab[] = $annonce;
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
            $stm = $db->prepare("DELETE FROM annonces WHERE idAnnoce=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    /**
     * recupere l'annonce par id
     *
     * @return array
     */
    public function readById(?int $id): ?object
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM annonces WHERE idAnnoce=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }

        foreach ($array as $value) {
            $annonce = new Annonce();
            $annonce->setIdAnn($value['idAnnoce'])->setTypeAnn($value['typeAnnonce'])->setTitreAnn($value['titre'])->setDescAnn($value['description'])
                ->setNumContAnn($value['numContact'])->setNumAdressAnn($value['numAdresse'])
                ->setRueAnn($value['rue'])->setCodePost($value['codePostal'])->setIdUti($value['idUti']);
        }
        return $annonce;
    }

    /**
     * recupere l'annonce par id
     *
     * @return array
     */
    public function readByType(?string $type): ?array
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM annonces WHERE typeAnnonce=?");
            $stm->bindValue(1, $type);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        $tab = [];
        foreach ($array as $value) {
            $annonce = new Annonce();
            $annonce->setIdAnn($value['idAnnoce'])->setTypeAnn($value['typeAnnonce'])->setTitreAnn($value['titre'])->setDescAnn($value['description'])
                ->setNumContAnn($value['numContact'])->setNumAdressAnn($value['numAdresse'])
                ->setRueAnn($value['rue'])->setCodePost($value['codePostal'])->setIdUti($value['idUti']);
            $tab[] = $annonce;
        }
        return $tab;
    }

    public function selectAllAsTotal(string $type): ?int
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT COUNT(*) AS total FROM annonces WHERE typeAnnonce=? ORDER BY idAnnoce");
            $stm->bindValue(1, $type);
            $stm->execute();
            $donneesTotal = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        return $donneesTotal[0]['total'];
    }

    /**
     * recupere dans un array toutes les annonces et les retourne
     *
     * @return array
     */
    public function readPagination(?string $typeAnnonce, ?int $premiereEntree, ?int $annonceParPage): array
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM annonces WHERE typeAnnonce=? LIMIT $premiereEntree, $annonceParPage");
            $stm->bindValue(1, $typeAnnonce);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        $tab = [];
        foreach ($array as $value) {
            $annonce = new Annonce();
            $annonce->setIdAnn($value['idAnnoce'])->setTypeAnn($value['typeAnnonce'])->setTitreAnn($value['titre'])->setDescAnn($value['description'])
                ->setNumContAnn($value['numContact'])->setNumAdressAnn($value['numAdresse'])
                ->setRueAnn($value['rue'])->setCodePost($value['codePostal'])->setIdUti($value['idUti']);
            $tab[] = $annonce;
        }
        return $tab;
    }

    public function readByTitre(?string $titre): ?object
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM annonces WHERE titre=?");
            $stm->bindValue(1, $titre);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }

        foreach ($array as $value) {
            $annonce = new Annonce();
            $annonce->setIdAnn($value['idAnnoce'])->setTypeAnn($value['typeAnnonce'])->setTitreAnn($value['titre'])->setDescAnn($value['description'])
                ->setNumContAnn($value['numContact'])->setNumAdressAnn($value['numAdresse'])
                ->setRueAnn($value['rue'])->setCodePost($value['codePostal'])->setIdUti($value['idUti']);
        }
        if (isset($annonce)) {
            return $annonce;
        } else {
            return $annonce = null;
        }
    }
}
