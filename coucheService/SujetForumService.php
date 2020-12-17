<?php
include_once __DIR__ . "/../coucheDao/SujetForumDao.php";
include_once __DIR__ . "/InterfService.php";


    class SujetForumService implements interfService{

        public function __construct()
        {
            $this->service = new SujetForumDao();
        }

        public function creatService(object $object): object
        {
            return $this->service->creat($object);              // Function create Commentaire
        }

        public function readService(): array
        {   
            return $this->service->read();              // Function Read Commentaires
        }

        public function updateService(object $object): object
        {
            return $this->service->update($object);             // Function update Commentaire
        }

        public function deleteService(int $id): int
        {
            return $this->service->delete($id);         // Function Delete Commentaire
        }
    }