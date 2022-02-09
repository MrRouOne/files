<?php

namespace FileWork;

class FileWork
{
    public function getFileName(string $filename): string
    {
        return $_FILES["$filename"]['name'];
    }

    public function getFileTempName(string $filename): string
    {
        return $_FILES["$filename"]['tmp_name'];
    }

    public function getFileType(string $filename): string
    {
        return $_FILES["$filename"]['type'];
    }

    public function getFileSize(string $filename): string
    {
        return $_FILES["$filename"]['size'];
    }

    public function getFileError(string $filename): string
    {
        return $_FILES["$filename"]['error'];
    }

    public function rootToUpload(string $filename, string $path, string $flag): string
    {

        if ($flag === 'this') {
            return $path . $this->getFileName($filename);
        }

        if ($flag === "out") {
            return "../" . $path . $this->getFileName($filename);
        }
        return "incorrect flag";
    }

    public function upload(string $filename, string $path, string $flag): void
    {
        echo($this->rootToUpload($filename, $path, $flag));

        move_uploaded_file($this->getFileTempName("$filename"), $this->rootToUpload($filename, $path, $flag));
    }

}

