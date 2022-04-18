<?php

namespace Tests\Unit\App\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Company;
use App\Http\Controllers\CompanyController;
use App\Http\Requests\CompanyRequest;

class CompanyControllerTest extends TestCase
{
	use DatabaseTransactions;

    private $control;

    public function setUp() : void
    {
        parent::setUp();
        $this->control = app()->make(CompanyController::class);
    }

    public function testUpdate()
    {
        $company = factory(Company::class)->create();

        $data = [
            'name'    => "test user",
            'email'   => 'test@email.com',
            'website'   => 'www.test.com.au'
        ];

        $data = new CompanyRequest($data);

        $this->control->update($company->id, $data);

        $newCompany = Company::find($company->id);

        $expect = [
            'name'    => "test user",
            'email'   => 'test@email.com',
            'website'   => 'www.test.com.au'
        ];

        $companyData = [
            'name'    => $newCompany->name,
            'email'   => $newCompany->email,
            'website'   => $newCompany->website,
        ];

        $this->assertEquals($companyData, $expect);
    }

    public function testDelete()
    {
        $company = factory(Company::class)->create();

        $this->control->delete($company->id);

        $newCompany = Company::find($company->id);

        $this->assertEquals($newCompany, null);
    }
}
