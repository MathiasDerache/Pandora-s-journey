<?php


interface InterfService
{
    public function creatService(?object $object): ?object;
    public function updateService(?object $object): ?object;
    public function readService(int $page = null, $theme = null): ?array;
    public function readByIdService(?int $id): ?object;
    public function deleteService(?int $id): ?int;
}
