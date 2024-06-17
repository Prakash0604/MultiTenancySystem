@extends('Layout.mainbranch')
@section('content')
<div class="container col-4">
    <h1 class="text-center mt-4 mb-4">New User</h1>
    <div class="card p-4">
        <form action="{{ route('tenants.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    id=""
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                />
                @error('name')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div> <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    id=""
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                />
                @error('email')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div> <div class="mb-3">
                <label for="" class="form-label">Domain Name</label>
                <input
                    type="text"
                    name="domain_name"
                    id=""
                    class="form-control @error('domain_name') is-invalid @enderror"
                    value="{{ old('domain_name') }}"
                />
                @error('domain_name')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div> <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    id=""
                    class="form-control @error('password') is-invalid @enderror"
                />
                @error('password')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div> <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id=""
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                />
                @error('password_confirmation')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-primary">Create User</button>
        </form>
    </div>
</div>
@endsection
