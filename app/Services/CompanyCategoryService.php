<?php 

namespace App\Services;

use App\Repositories\CompanyCategoryRepository;
 
class CompanyCategoryService extends ResourceService {

	function __construct(CompanyCategoryRepository $repository)
	{
		$this->repository = $repository;
	}
    
}