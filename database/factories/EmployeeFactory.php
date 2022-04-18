<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Employee;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Company;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$company = Company::where('name', 'company name')->first();

if($company == null) {

	$company = Company::create([
	    'name' => 'company name',
	    'email' => 'company@name.com',
	    'website' => Str::random(10),
	    'logo' => Str::random(10)
	]);
}

$factory->define(Employee::class, function (Faker $faker) use ($company) {

	info($faker->name);

    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'company_id' => $company->id,
        'email' => $faker->unique()->safeEmail,
        'phone' => Str::random(10)
    ];
});
