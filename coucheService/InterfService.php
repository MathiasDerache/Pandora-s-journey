<?php


interface InterfService
{
    public function creatService(object $object): void;
    public function updateService(object $object): void;
    public function readService(): array;
    public function deleteService(int $id): void;
}
