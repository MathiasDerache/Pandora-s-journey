<?php
include_once __DIR__ . "/../coucheDao/CommentaireForumDao.php";
include_once __DIR__ . "/InterfService.php";
include_once __DIR__ . "/../classe_metier/CommentaireSujet.php";


class CommentaireForumService implements interfService
{

    public function __construct()
    {
        $this->service = new CommentaireForumDao();
    }

    public function creatService(?object $object): ?object
    {
        return $this->service->creat($object);              // Function create Commentaire
    }

    public function readService(int $page = null, $theme = null): ?array
    {
        return $this->service->read($page, $theme);              // Function Read Commentaires
    }

    /**
     * recupère un tableau de doinnée de la couche dao et la transmet au controlleur associé
     *
     * @return array
     */
    public function readByIdService(?int $id): ?object
    {
        return $this->service->readIdService($id);
    }

    public function updateService(?object $object): ?object
    {
        return $this->service->update($object);             // Function update Commentaire
    }

    public function deleteService(?int $id): ?int
    {
        return $this->service->delete($id);         // Function Delete Commentaire
    }

    public function foundComById(?int $id): ?array
    {
        return $this->service->foundCommentaireById($id);
    }
}
