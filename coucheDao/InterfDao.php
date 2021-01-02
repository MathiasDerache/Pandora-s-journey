<?php


interface InterfDao
{
    public function creat(object $object): void;
    public function update(object $object): void;
    public function read(): array;
    public function readById(?int $id): ?object;
    public function delete(int $id): void;
}
