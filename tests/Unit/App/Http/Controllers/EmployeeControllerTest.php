<?php

namespace Tests\Unit\App\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Employee;
use App\Http\Controllers\EmployeeController;
use App\Http\Requests\EmployeeRequest;

class EmployeeControllerTest extends TestCase
{
	use DatabaseTransactions;

    private $control;

    public function setUp() : void
    {
        parent::setUp();
        $this->control = app()->make(EmployeeController::class);
    }

    public function testUpdate()
    {
        $employee = factory(Employee::class)->create();

        $data = [
        	'firstName' => 'test first',
            'lastName'  => "test last",
            'companyId' => $employee->company_id,
            'email'   => 'test@email.com',
            'phone'   => '0432415443'
        ];

        $data = new EmployeeRequest($data);

        $this->control->update($employee->id, $data);

        $newEmployee = Employee::find($employee->id);

        $expect = [
        	'firstName' => 'test first',
            'lastName'  => "test last",
            'companyId' => $employee->company_id,
            'email'   => 'test@email.com',
            'phone'   => '0432415443'
        ];

        $employeeData = [
            'firstName'    => $newEmployee->first_name,
            'lastName'    => $newEmployee->last_name,
            'companyId' => $newEmployee->company_id,
            'email'   => $newEmployee->email,
            'phone'   => $newEmployee->phone,
        ];

        $this->assertEquals($employeeData, $expect);
    }

    public function testDelete()
    {
        $employee = factory(Employee::class)->create();

        $this->control->delete($employee->id);

        $newEmployee = Employee::find($employee->id);

        $this->assertEquals($newEmployee, null);
    }
}
