<?php
/**
 * Created by PhpStorm.
 * Parameter: andrestntx
 * Date: 3/22/16
 * Time: 11:12 PM
 */

namespace App\Repositories\Files;

use App\Entities\Parameter;
use Illuminate\Http\UploadedFile;

class ParameterFileRepository extends BaseFileRepostory
{
    protected $path = "storage/parameters";

    public function getNameFile($parameter)
    {
        return $parameter->name . '.' . $parameter->extension;
    }
    
    public function getPathParameter($parameter)
    {
        return $this->getPath() . "/" . $this->getNameFile($parameter);
    }

    public function saveParameterFile(UploadedFile $file, Parameter $parameter)
    {
        $this->saveFile($file, $this->getPath(), $this->getNameFile($parameter));
    }

    public function getFileUrl(Parameter $parameter)
    {
        return '/' . $this->getPath() . "/" . $this->getNameFile($parameter);
    }
    
}