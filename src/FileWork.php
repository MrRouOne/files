<?php

namespace FileWork;

class FileWork
{
//    public function __construct(array $array = [])
//    {
//        $this->array = $array;
//    }

    public function getFile(string $filename): string
    {
        return $_FILES["$filename"]['name'];
    }

    public function getUploadFolder(string $folder): string
    {
        return $_FILES["$filename"]['name'];
    }

}

