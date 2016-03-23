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
    protected $path = "companies";

    public function getPathCompany(Company $company)
    {
        return $this->getPath() . "/" . $company->id;
    }

    public function saveLogo(UploadedFile $photoFile, Company $company)
    {
        $this->saveFile($photoFile, $this->getPathCompany($company), 'logo.jpg');
    }

    public function getLogoUrl(Company $company)
    {
        return '/' . $this->getPathCompany($company). "/logo.jpg";
    }
}