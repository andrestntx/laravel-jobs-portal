<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/22/16
 * Time: 11:12 PM
 */

namespace App\Repositories\Files;

use App\Entities\Company;
use Illuminate\Http\UploadedFile;

class CompanyFileRepository extends BaseFileRepostory
{
    protected $path = "storage/companies";
    protected $defaultLogo = "images/default.jpg";

    public function getPathCompany($id)
    {
        return $this->getPath() . "/" . $id;
    }

    public function saveLogo(UploadedFile $photoFile, Company $company)
    {
        $this->saveFile($photoFile, $this->getPathCompany($company->id), 'logo.jpg');
    }

    public function getLogoUrl(Company $company)
    {
        return $this->getLogoUrlId($company->id);
    }

    public function getLogoUrlId($id)
    {
        return $this->getFileOrDefault($this->getPathCompany($id). "/logo.jpg", $this->defaultLogo);
    }
}