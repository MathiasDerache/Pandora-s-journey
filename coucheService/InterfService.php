<?php


interface InterfService
{
    public function creatService(object $object): object;
    public function updateService(object $object): object;
    public function readService(): array;
    public function deleteService(int $id): int;
}
