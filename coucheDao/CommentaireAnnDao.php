<?php
include_once __DIR__ . '/InterfDao.php';
include_once __DIR__ . '/../classe_metier/CommentaireAnnonce.php';
include_once __DIR__ . '/conectionBaseDonnees.php';


class CommentaireAnnDao implements InterfDao
{
    public function __construct()
    {
        $this->db = new ConnectionBaseDonnees();
    }
    /**
     * ajout de commentaire annonce
     *
     * @param object $object
     * @return void
     */
    public function creat(object $object): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("INSERT INTO commentaire VALUES(null,?,?,?,?)");
            //recuperation des infos de $object instance de la class CommentaireAnnonce
            $contComm = $object->getContComm();
            $dateMessAnn = $object->getDateMessAnn()->format('Y-m-d');
            $idUti = $object->getIdUti();
            $idAnn = $object->getIdAnn();

            //je lie chaque variable à la requete preparée
            $stm->bindValue(1, $contComm);
            $stm->bindValue(2, $dateMessAnn);
            $stm->bindValue(3, $idUti);
            $stm->bindValue(4, $idAnn);
            //execution de la requete preparée
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }
    public function update(object $object): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("UPDATE commentaire SET contCom=?, datePubCom=?
                                ,idUti =?, idannoce=? WHERE idCom=?");
            //recuperation des infos de $object instance de la class CommentaireAnnonce
            $contComm = $object->getContComm();
            $dateMessAnn = $object->getDateMessAnn()->format('Y-m-d');
            $idUti = $object->getIdUti();
            $idAnn = $object->getIdAnn();
            $idComm = $object->getIdComm();

            //je lie chaque variable à la requete preparée
            $stm->bindValue(1, $contComm);
            $stm->bindValue(2, $dateMessAnn);
            $stm->bindValue(3, $idUti);
            $stm->bindValue(4, $idAnn);
            $stm->bindValue(5, $idComm);
            //execution de la requete preparée
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    /**
     * selection de tous les commentaires
     *
     * @return array
     */
    public function read(int $page = null, $theme = null): array
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM commentaire");
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        $tab = [];
        foreach ($array as $value) {
            $comm = new CommentaireAnnonce();
            $comm->setIdComm($value['idCom'])->setContComm($value['commentaire'])
                ->setDateMessAnn(new DateTime($value['description']))
                ->setIdAnn($value['idannoce'])->setIdUti($value['idUti']);
            $tab[] = $comm;
        }
        return $tab;
    }

    /**
     * suppression commentaire
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("DELETE FROM commentaire WHERE idCom=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    /**
     * recupere dans un array avec le commentaire de l'annonce par id
     *
     * @return array
     */
    public function readById(?int $id): ?object
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM commentaire WHERE idCom=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }

        foreach ($array as $value) {
            $comm = new CommentaireAnnonce();
            $comm->setIdComm($value['idCom'])->setContComm($value['commentaire'])
                ->setDateMessAnn(new DateTime($value['description']))
                ->setIdAnn($value['idannoce'])->setIdUti($value['idUti']);
        }
        return $comm;
    }
}
