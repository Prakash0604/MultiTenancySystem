@extends('Layout.main')
@section('content')
    <div class="container col-4 mt-4">
        <h1 class="text-center mt-3 mb-3">Student Add</h1>
        <div class="card p-3">
            <form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name',$student->name) }}"
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
                    value="{{ old('email',$student->email) }}"
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
                    value="{{ old('address',$student->address) }}"
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
                    value="{{ old('contact',$student->contact) }}"
                    class="form-control @error('contact') is-invalid @enderror"
                />
                @error('contact')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input
                    type="file"
                    name="image"
                    class="form-control @error('image') is-invalid @enderror"
                />
                @error('image')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
                <div>
                    <img src="{{ asset('storage/images/'.$student->image) }}" alt="No image" width="100" height="100">
                </div>
            </div>
            <button class="btn btn-primary">Update Student</button>
            </form>
        </div>
    </div>
@endsection
