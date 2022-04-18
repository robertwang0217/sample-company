@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company list</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="" required placeholder="Website">

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="logo" type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" required placeholder="Logo">

                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Create company
                                </button>
                            </div>

                        </div>

                    </form>

                    <div class="form-group row">

                        <div class="col-md-2">Name</div>
                        <div class="col-md-2">Email</div>
                        <div class="col-md-2">Website</div>
                        <div class="col-md-2">Logo</div>
                        <div class="col-md-4"> </div>

                    </div>

                    @foreach( $companies as $company )

                    <div class="form-group row">

                        <div class="col-md-2">{{ $company->name }}</div>
                        <div class="col-md-2">{{ $company->email }}</div>
                        <div class="col-md-2">{{ $company->website }}</div>
                        <a class="col-md-2" href="{{ url($company->logo) }}" target=”_blank”><img style="width:100%" src="{{ url($company->logo) }}" /></a>
                        <div class="col-md-4">
                            <a href="{{ route('company.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('company.delete', $company->id) }}" class="btn btn-primary">Delete</a>
                        </div>

                    </div>

                    @endforeach

                    {{ $companies->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
