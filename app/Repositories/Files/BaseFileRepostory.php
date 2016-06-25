<?php

namespace App\Repositories\Files;


use Illuminate\Http\UploadedFile;

class BaseFileRepostory
{
    protected $path;

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    public function saveFile(UploadedFile $file, $path, $name)
    {
        if($file->isValid()){
            return $file->move($path, $name);
        }

        return null;
    }

    public function getFileOrDefault($urlFile, $urlDefault)
    {
        if(! \Storage::exists($urlFile)) {
            $urlFile = $urlDefault;
        }

        return '/' . $urlFile . '?' . time();
    }

}