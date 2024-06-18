@extends('Layout.main')
@section('content')
    <div class="container">
        <h1 class="text-center mt-4 mb-4">Student List</h1>
        <div class="card mt-4 p-2">
            @if (session()->has('message'))
                <div
                    class="alert alert-success alert-dismissible fade show"
                    role="alert"
                >
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close"
                    ></button>

                    <strong>{{ session()->get('message') }}</strong>
                </div>

            @endif
            <div
                class="table-responsive"
            >
                <table
                    class="table table-bordered"
                    style="border: 2px solid black"
                >
                    <thead class="bg-dark">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="mx-auto">
                        @forelse ($students as $student)
                        <tr class="align-middle text-center">
                            <td>
                                @if ($student->image!="")

                                <img src="{{ asset('storage/'.$student->image) }}" alt="" width="100px" height="100px" class="rounded-circle">

                                @else
                                <img src="{{ asset('defaultimage.png') }}" alt="" width="100px" height="100px">
                                @endif
                            </td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->contact }}</td>
                            <td>
                                <form action="{{ route('students.destroy',$student->id) }}" method="POST" class="d-flex">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('students.edit',$student->id) }}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger" onclick="alert('Are you sure your want to delete ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">No data found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
