<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Services\Helper;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    private $helper;

    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }

    public function report() {

    	$companies = Company::orderBy('name')->paginate(10);

    	return view('company.index', ['companies' => $companies]);
    }

    public function edit(Int $id) {

        $company = Company::find($id);

        return view('company.edit', ['company' => $company]);
    }

    public function store(CompanyRequest $request) {

        $relativeUrl = $this->helper->saveFileToStorage($request->logo);

        Company::create([

            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $relativeUrl

        ]);

        return redirect()->route('company.report')->with('success', 'Company was successfully added!');
    }

    public function update(Int $id, CompanyRequest $request) {

        $company = Company::find($id);

        $relativeUrl = $company->logo;

        if($request->logo) {
            $relativeUrl = $this->helper->saveFileToStorage($request->logo);
        }

        $company->update([

            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $relativeUrl

        ]);

        return redirect()->route('company.report')->with('success', 'Company was successfully updated!');
    }

    public function delete(Int $id) {

        Company::find($id)->delete();

        return redirect()->route('company.report')->with('success', 'Company was successfully deleted!');
    }
}
