<?php

namespace Barcha17\Module\ModuleTest;

use Barcha17\Module\ModuleTest\Document;


class DocumentRepository
{
    private $storageDir;
    public function __construct(string $storageDir)
    {
        $this->storageDir = $storageDir;
        if (!file_exists($storageDir))
            mkdir($storageDir);
    }
    public function getDocument(int $id): Document
    {
        $path = $this->storageDir . "/$id.txt";
        if (!file_exists($path))
            throw new \Exception("Cannot find the document");
        return (new Document())->setText(file_get_contents($path));
    }
    public function newDocument(string $data): ?int
    {
        $id = time();
        $path = $this->storageDir . "/$id.txt";
        if (file_exists($path))
            throw new \Exception("Could not add new document");
        return file_put_contents($path, $data) ? $id : null;
    }
}
