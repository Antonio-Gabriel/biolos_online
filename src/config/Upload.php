<?php

namespace Vendor\config;

class Upload
{

    private string $targetDir;
    private string $targetFilePath;
    private string $fileName;
    private $fileType;

    public function __construct()
    {
        $this->targetDir = $this->getPathLocation("resources");
        $this->fileName = basename($_FILES["photo"]["name"]);
        $this->targetFilePath = $this->targetDir . $this->fileName;
        $this->fileType = pathinfo($this->targetFilePath, PATHINFO_EXTENSION);
    }

    public function UploadPhoto()
    {
        if (!empty($_FILES["photo"]["name"])) {
            $allowTypes = ['jpg', 'png', 'jpeg'];

            if (in_array($this->fileType, $allowTypes)) {
                if (
                    move_uploaded_file(
                        $_FILES["photo"]["tmp_name"],
                        $this->targetFilePath
                    )
                ) {

                    return $this->fileName;
                } else {
                    move_uploaded_file(
                        $_FILES["photo"]["tmp_name"],
                        $this->targetFilePath
                    );

                    return $this->fileName;
                }
            } else {
                throw new \Exception("Sorry, only JPG, JPEG and PNG files are allowed to upload.", 2);
            }
        } else {
            return "empty.png";
        }
    }

    private function getPathLocation($dir)
    {

        return $_SERVER["DOCUMENT_ROOT"]
            . DIRECTORY_SEPARATOR . "bioloOnline"
            . DIRECTORY_SEPARATOR . "src"
            . DIRECTORY_SEPARATOR . $dir
            . DIRECTORY_SEPARATOR;
    }
}
