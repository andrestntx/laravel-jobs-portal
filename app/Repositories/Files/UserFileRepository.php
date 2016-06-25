<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/22/16
 * Time: 11:12 PM
 */

namespace App\Repositories\Files;

use App\Entities\User;
use Illuminate\Http\UploadedFile;

class UserFileRepository extends BaseFileRepostory
{
    protected $path = "storage/users";
    protected $defaultPhoto = "images/default.jpg";

    public function getPathUser($id)
    {
        return $this->getPath() . "/" . $id;
    }

    public function savePhoto(UploadedFile $photoFile, User $user)
    {
        $this->saveFile($photoFile, $this->getPathUser($user->id), 'photo.jpg');
    }

    public function getPhotoUrl(User $user)
    {
        return $this->getPhotoUrlId($user->id);
    }

    public function getPhotoUrlId($id)
    {
        return $this->getFileOrDefault($this->getPathUser($id). "/photo.jpg", $this->defaultPhoto);
    }
}