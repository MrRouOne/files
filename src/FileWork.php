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
        # If you need to download a file to the same directory, use this
        if ($flag === 'this') {
            return $path . $this->getFileName($filename);
        }
        # If you need to download a file to the directory above, use this,
        # use "../" to raise it up, if necessary
        if ($flag === "out") {
            return "../" . $path . $this->getFileName($filename);
        }
        return "incorrect flag";
    }

    public function upload(string $filename, string $path, string $flag): string
    {
        return move_uploaded_file($this->getFileTempName("$filename"), $this->rootToUpload($filename, $path, $flag));
    }

    public function checkUpload(string $filename, string $path, string $flag): bool
    {
        if ($this->upload($filename, $path, $flag)) {
            return 1;
        }
        return 0;
    }

}
