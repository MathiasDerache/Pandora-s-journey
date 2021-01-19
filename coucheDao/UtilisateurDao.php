<?php
include_once __DIR__ . '/InterfDao.php';
include_once __DIR__ . '/../classe_metier/Utilisateur.php';
include_once __DIR__ . '/connectionBaseDonnees.php';

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
            $stm = $db->prepare("INSERT INTO utilisateur VALUES(null,?,?,?,?,?,?,?,?,?)");
            $nom = $object->getNom();
            $prenom = $object->getPrenom();
            $pseudo = $object->getPseudo();
            $email = $object->getEmail();
            $numTel = $object->getNumTel();
            $password = $object->getPassword();
            $profil = $object->getProfil();
            $dateNaissance = $object->getDateNaissance()->format("Y-m-d");
            $civilite = $object->getCivilite();
            $stm->bindValue(1, $nom);
            $stm->bindValue(2, $prenom);
            $stm->bindValue(3, $pseudo);
            $stm->bindValue(4, $email);
            $stm->bindValue(5, $numTel);
            $stm->bindValue(6, $password);
            $stm->bindValue(7, $profil);
            $stm->bindValue(8, $dateNaissance);
            $stm->bindValue(9, $civilite);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    public function update(object $object): void
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("UPDATE utilisateur SET nom=?, prenom=?, pseudo=?, email=?, numeroTel=?, passWord=?, dateNaissance=?, sex=? WHERE idUti=?");
            $idUti = $object->getIdUti();
            $nom = $object->getNom();
            $prenom = $object->getPrenom();
            $pseudo = $object->getPseudo();
            $email = $object->getEmail();
            $numTel = $object->getNumTel();
            $password = $object->getPassword();
            $dateNaissance = $object->getDateNaissance()->format("Y-m-d");
            $civilite = $object->getCivilite();
            $stm->bindValue(1, $nom);
            $stm->bindValue(2, $prenom);
            $stm->bindValue(3, $pseudo);
            $stm->bindValue(4, $email);
            $stm->bindValue(5, $numTel);
            $stm->bindValue(6, $password);
            $stm->bindValue(7, $dateNaissance);
            $stm->bindValue(8, $civilite);
            $stm->bindValue(9, $idUti);
            $stm->execute();
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
    }

    public function read(int $page = null, $theme = null): array
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM utilisateur");
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        $tab = [];
        foreach ($array as $value) {
            $utilisateur = new Utilisateur();
            $utilisateur->setIdUti($value['idUti'])->setNom($value['nom'])->setPrenom($value['prenom'])
                ->setPseudo($value['pseudo'])->setEmail($value['email'])
                ->setNumTel($value['numeroTel'])->setPassword($value['passWord'])->setProfil($value['profil'])
                ->setDateNaissance(new DateTime($value['dateNaissance']))->setCivilite($value['sex']);
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

    /**
     * recupere dans un array avec l'utilisateur par id
     *
     * @return array
     */
    public function readById(?int $id): ?object
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM utilisateur WHERE idUti=?");
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }

        foreach ($array as $value) {
            $utilisateur = new Utilisateur();
            $utilisateur->setIdUti($value['idUti'])->setNom($value['nom'])->setPrenom($value['prenom'])
                ->setPseudo($value['pseudo'])->setEmail($value['email'])
                ->setNumTel($value['numeroTel'])->setPassword($value['passWord'])->setProfil($value['profil'])
                ->setDateNaissance(new DateTime($value['dateNaissance']))->setCivilite($value['sex']);
        }
        return $utilisateur;
    }

    public function searchByEmail(string $email): ?object
    {
        try {
            $db = $this->db->connectiondb();
            $stm = $db->prepare("SELECT * FROM utilisateur WHERE email=?");
            $stm->bindValue(1, $email);
            $stm->execute();
            $array = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $f) {
            throw new DaoException($f->getCode(), $f->getMessage());
        }
        if (!empty($array)) {
            foreach ($array as $value) {
                $utilisateur = new Utilisateur();
                $utilisateur->setIdUti($value['idUti'])->setNom($value['nom'])->setPrenom($value['prenom'])
                    ->setPseudo($value['pseudo'])->setEmail($value['email'])
                    ->setNumTel($value['numeroTel'])->setPassword($value['passWord'])->setProfil($value['profil'])
                    ->setDateNaissance(new DateTime($value['dateNaissance']))->setCivilite($value['sex']);
            }
            return $utilisateur;
        } else {
            $utilisateur = null;
            return $utilisateur;
        }
    }
}
