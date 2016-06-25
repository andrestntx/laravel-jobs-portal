<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('<i class="fa fa-home"></i>', url('/'));
});

// Home > admin
Breadcrumbs::register('account', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Mi Cuenta', url('accunt'));
});

// Home > admin > stats
Breadcrumbs::register('stats', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Estadísticas', url('stats'));
});

// Home > admin
Breadcrumbs::register('admin', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Admin', url('admin'));
});

// Home > admin > geoLocations
Breadcrumbs::register('geo-locations', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Ubicaciones', route('admin.geo-locations.index'));
});

// Home > admin > company categories
Breadcrumbs::register('company-categories', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Categorias de Empresa', route('admin.company-categories.index'));
});

// Home > admin > company categories > {{ $category }}
Breadcrumbs::register('company-categories.category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('company-categories');

    if ($category->exists) {
        $breadcrumbs->push($category->name, route('admin.company-categories.show', $category));
    } else {
        $breadcrumbs->push('Nueva', route('admin.company-categories.create'));
    }
});

// Home > admin > job categories
Breadcrumbs::register('job-categories', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Categorias de Trabajo', route('admin.job-categories.index'));
});

// Home > admin > job categories > {{ $category }}
Breadcrumbs::register('job-categories.category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('job-categories');

    if ($category->exists) {
        $breadcrumbs->push($category->name, route('admin.job-categories.show', $category));
    } else {
        $breadcrumbs->push('Nueva', route('admin.job-categories.create'));
    }
});

// Home > admin > contract types
Breadcrumbs::register('contract-types', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Tipos de Contrato', route('admin.contract-types.index'));
});

// Home > admin > contract types > {{ $type }}
Breadcrumbs::register('contract-types.type', function ($breadcrumbs, $type) {
    $breadcrumbs->parent('contract-types');

    if ($type->exists) {
        $breadcrumbs->push($type->name, route('admin.contract-types.show', $type));
    } else {
        $breadcrumbs->push('Nueva', route('admin.contract-types.create'));
    }
});

// Home > admin > occupations
Breadcrumbs::register('occupations', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Ocupaciones', route('admin.occupations.index'));
});

// Home > admin > occupations > {{ $occupation }}
Breadcrumbs::register('occupations.occupation', function ($breadcrumbs, $occupation) {
    $breadcrumbs->parent('occupations');

    if ($occupation->exists) {
        $breadcrumbs->push($occupation->name, route('admin.occupations.show', $occupation));
    } else {
        $breadcrumbs->push('Nueva', route('admin.occupations.create'));
    }
});

// Home > admin > parameters
Breadcrumbs::register('parameters', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Ocupaciones', route('admin.parameters.index'));
});

// Home > admin > parameters > {{ $parameter }}
Breadcrumbs::register('parameters.parameter', function ($breadcrumbs, $parameter) {
    $breadcrumbs->parent('parameters');

    if ($parameter->exists) {
        $breadcrumbs->push($parameter->name, route('admin.parameters.show', $parameter));
    } else {
        $breadcrumbs->push('Nueva', route('admin.parameters.create'));
    }
});

// Home > admin > admins
Breadcrumbs::register('admins', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Administradores', route('admin.admins.index'));
});

// Home > admin > admins > {{ $admin }}
Breadcrumbs::register('admins.admin', function ($breadcrumbs, $admin) {
    $breadcrumbs->parent('admins');

    if ($admin->exists) {
        $breadcrumbs->push($admin->name, route('admin.admins.show', $admin));
    } else {
        $breadcrumbs->push('Nueva', route('admin.admins.create'));
    }
});

// Home > companies
Breadcrumbs::register('companies', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Empresas', url('/'));
});

// Home > companies > {{ $company }}
Breadcrumbs::register('companies.company', function ($breadcrumbs, $company) {
    $breadcrumbs->parent('companies');

    if ($company->exists) {
        $breadcrumbs->push($company->name, route('companies.show', $company));
    }
});

// Home > companies > {{ $company }} > jobs
Breadcrumbs::register('companies.company.jobs', function ($breadcrumbs, $company) {
    $breadcrumbs->parent('companies.company', $company);
    $breadcrumbs->push('Ofertas de empelo', route('companies.jobs.index', $company));
});

// Home > companies > {{ $company }} > jobs > {{ $job }}
Breadcrumbs::register('companies.company.jobs.job', function ($breadcrumbs, $company, $job) {
    $breadcrumbs->parent('companies.company.jobs', $company);

    if ($job->exists) {
        $breadcrumbs->push($job->name, route('companies.jobs.show', [$company, $job]));
    } else {
        $breadcrumbs->push('Nueva', route('companies.jobs.create', $company));
    }
});

// Home > jobs
Breadcrumbs::register('jobs', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Ofertas de empelo', route('jobs.index'));
});

// Home > jobs > {{ $job }}
Breadcrumbs::register('jobs.job', function ($breadcrumbs, $job) {
    $breadcrumbs->parent('jobs');

    if ($job->exists) {
        $breadcrumbs->push($job->name, route('jobs.show', $job));
    }
});

// Home > jobs > search
Breadcrumbs::register('jobs.search', function ($breadcrumbs) {
    $breadcrumbs->parent('jobs');
    $breadcrumbs->push('Buscar', route('jobs.search'));
});

// Home > resumes
Breadcrumbs::register('resumes', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Hojas de vida', route('resumes.index'));
});

// Home > resumes > {{ $resume }}
Breadcrumbs::register('resumes.resume', function ($breadcrumbs, $resume) {
    $breadcrumbs->parent('resumes');

    if ($resume->exists) {
        $breadcrumbs->push($resume->user->name, route('resumes.show', $resume));
    }
});

// Home > resumes > {{ $resume }} > applications
Breadcrumbs::register('resumes.applications', function ($breadcrumbs, $resume) {
    $breadcrumbs->parent('resumes.resume', $resume);
    $breadcrumbs->push('Postulaciones', route('resumes.applications'));

});

// Home > resumes > search
Breadcrumbs::register('resumes.search', function ($breadcrumbs) {
    $breadcrumbs->parent('resumes');
    $breadcrumbs->push('Buscar', route('resumes.search'));
});



