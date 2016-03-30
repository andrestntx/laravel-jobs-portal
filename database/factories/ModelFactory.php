<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Entities\Company;
use App\Entities\CompanyCategory;
use App\Entities\Job;
use App\Entities\JobCategory;
use App\Entities\User;

$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->unique()->userName,
        'name' => $faker->unique()->name,
        'email' => $faker->unique()->email,
        'password' => '123',
        'remember_token' => str_random(10)
    ];
});

$factory->defineAs(User::class, 'admin', function (Faker\Generator $faker) use ($factory) {
    $user = $factory->raw(User::class);
    return array_merge($user, ['role' => 'admin']);
});

$factory->defineAs(User::class, 'employer', function (Faker\Generator $faker) use ($factory) {
    $user = $factory->raw(User::class);
    return array_merge($user, ['role' => 'employer']);
});

$factory->define(CompanyCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name,
        'description' => $faker->text(50)
    ];
});

$factory->define(Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->company,
        'email' => $faker->unique()->email
    ];
});

$factory->define(JobCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name,
        'description' => $faker->text(50)
    ];
});

$factory->define(Job::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->unique()->name,
        'contract_type_id'  => $faker->randomElement([1,2,3,4]),
        'occupation_id'     => $faker->randomElement([1,2,3,4]),
        'experience'        => $faker->randomDigit(),
        'salary'            => $faker->randomNumber(8),
    ];
});

$factory->define(App\Entities\ContractType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(50)
    ];
});

$factory->define(App\Entities\Skill::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName
    ];
});

$factory->define(App\Entities\Occupation::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\Entities\Jobseeker::class, function (Faker\Generator $faker) {
    return [
        'doc' => $faker->unique()->randomNumber(6),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->email,
        'phone' => $faker->unique()->phoneNumber
    ];
});

$factory->define(App\Entities\Resume::class, function (Faker\Generator $faker) {
    return [
        'profile' => $faker->realText(),
        'wage_aspiration' => $faker->randomNumber(5),
        'study_title'       => $faker->name
    ];
});


$factory->define(App\Entities\Study::class, function (Faker\Generator $faker) {
    return [
        'institution'   => $faker->company,
        'title'         => $faker->firstName,
        'notes'         => $faker->realText(),
        'init'          => $faker->date(),
        'finish'          => $faker->date()
    ];
});


$factory->define(App\Entities\Experience::class, function (Faker\Generator $faker) {
    return [
        'company'   => $faker->company,
        'name'         => $faker->firstName,
        'notes'         => $faker->realText(),
        'init'          => $faker->date(),
        'finish'          => $faker->date()
    ];
});

$factory->define(App\Entities\GeoLocation::class, function (Faker\Generator $faker) {
    return [
        'lat'           => $faker->randomFloat(5,1,7),
        'lng'           => $faker->randomFloat(5,-76,-69),
        'formatted_address' => $faker->streetAddress,
        'id'            => $faker->unique()->uuid
    ];
});
