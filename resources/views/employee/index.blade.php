@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employee list</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('employee.store') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-4">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="" required placeholder="First name">

                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="" required placeholder="Last name">

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">

                                <select id="companyId" class="form-control @error('companyId') is-invalid @enderror" name="companyId" required placeholder="Company">
                                    <option value="">Select</option>

                                    @foreach ($companies as $key => $value)
                                        <option value="{{ $value }}">{{ $key }}</option>
                                    @endforeach

                                </select>

                                @error('companyId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="" required placeholder="Phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Create employee
                                </button>
                            </div>

                        </div>

                    </form>

                    <div class="form-group row">

                        <div class="col-md-2">First name</div>
                        <div class="col-md-2">Last name</div>
                        <div class="col-md-2">Company</div>
                        <div class="col-md-2">Email</div>
                        <div class="col-md-2">Phone</div>
                        <div class="col-md-2"> </div>

                    </div>

                    @foreach( $employees as $employee )

                    <div class="form-group row">

                        <div class="col-md-2">{{ $employee->first_name }}</div>
                        <div class="col-md-2">{{ $employee->last_name }}</div>
                        <div class="col-md-2">{{ $employee->company()->first()->name }}</div>
                        <div class="col-md-2">{{ $employee->email }}</div>
                        <div class="col-md-2">{{ $employee->phone }}</div>
                        <div class="col-md-2">
                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                            <a style="margin-top:5px;" href="{{ route('employee.delete', $employee->id) }}" class="btn btn-primary">Delete</a>
                        </div>

                    </div>

                    @endforeach

                    {{ $employees->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
