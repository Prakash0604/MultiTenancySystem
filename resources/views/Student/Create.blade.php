@extends('Layout.main')
@section('content')
    <div class="container col-4 mt-4">
        <h1 class="text-center mt-3 mb-3">Student Add</h1>
        <div class="card p-3">
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                />
                @error('name')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                />
                @error('email')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div><div class="mb-3">
                <label for="" class="form-label">Address</label>
                <input
                    type="text"
                    name="address"
                    value="{{ old('address') }}"
                    class="form-control @error('address') is-invalid @enderror"
                />
                @error('address')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div><div class="mb-3">
                <label for="" class="form-label">Contact Number</label>
                <input
                    type="number"
                    name="contact"
                    value="{{ old('contact') }}"
                    class="form-control @error('contact') is-invalid @enderror"
                />
                @error('contact')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div><div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input
                    type="file"
                    name="image"
                    class="form-control @error('image') is-invalid @enderror"
                />
                @error('image')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-primary">Add Student</button>
            </form>
        </div>
    </div>
@endsection
