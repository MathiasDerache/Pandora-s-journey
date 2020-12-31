<?php


interface InterfDao
{
    public function creat(object $object): void;
    public function update(object $object): void;
    public function read(): array;
    public function readById(int $id): array;
    public function delete(int $id): void;
}
