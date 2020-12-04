<?php
include_once __DIR__ . '/InterfDao.php';
include_once __DIR__ . '/../classe_metier/Utilisateur.php';
include_once __DIR__ . '/conectionBaseDonnees.php';

class UtilisateurDao implements InterfDao
{
    public function __construct()
    {
        $this->db = new ConnectionBaseDonnees();
    }


    public function creat(object $object): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("INSERT INTO utilisateur VALUES(null,NOW(),?,?,?,?,?,?,?)");
            $nom = $object->getNom();
            $prenom = $object->getPrenom();
            $pseudo = $object->getPseudo();
            $email = $object->getEmail();
            $numTel = $object->getNumTel();
            $password = $object->getPassword();
            $profil = $object->getProfil();
            $stm->bindValue(1, $nom);
            $stm->bindValue(2, $prenom);
            $stm->bindValue(3, $pseudo);
            $stm->bindValue(4, $email);
            $stm->bindValue(5, $numTel);
            $stm->bindValue(6, $password);
            $stm->bindValue(7, $profil);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    public function update(object $object): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("UPDATE utilisateur SET nom=?, prenom=?, pseudo=?
                                , email=?,numeroTel=?, passWord=?,idProfil=? WHERE idannonce=?");
            $nom = $object->getNom();
            $prenom = $object->getPrenom();
            $pseudo = $object->getPseudo();
            $email = $object->getEmail();
            $numTel = $object->getNumTel();
            $password = $object->getPassword();
            $profil = $object->getProfil();
            $stm->bindValue(1, $nom);
            $stm->bindValue(2, $prenom);
            $stm->bindValue(3, $pseudo);
            $stm->bindValue(4, $email);
            $stm->bindValue(5, $numTel);
            $stm->bindValue(6, $password);
            $stm->bindValue(7, $profil);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    public function read(): array
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM utilisateur WHERE idUti=?");
            $stm->bindValue(1, $idUti);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        $tab = [];
        foreach ($array as $value) {
            $utilisateur = new Utilisateur();
            $utilisateur->setNom($value['nom'])->setPrenom($value['prenom'])
                ->setPseudo($value['pseudo'])->setEmail($value['numAdresse'])
                ->setNumTel($value['numTel'])->setPassword($value['password'])->setProfil($value['profil']);
            $tab[] = $utilisateur;
        }
        return $tab;
    }

    public function delete(int $idUti): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("DELETE FROM utilisateur WHERE idUti=?");
            $stm->bindValue(1, $idUti);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }
}
