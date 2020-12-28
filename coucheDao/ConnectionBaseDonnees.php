<?php


class ConnectionBaseDonnees
{
    /**
     * methode d'appel après instanciation d'un objet conectionBaseDonnees
     *
     * @return PDO
     */
    public function connectiondb(): PDO
    {
        $host = "mysql:host=localhost;dbname=pandora";
        $user = 'root';
        $pass = '';
        //ici se trouve la connexion à la base de donnée pandora vis à PDO
        try {
            return new PDO($host, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            return $e;
        }
    }
}
