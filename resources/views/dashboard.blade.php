@extends('Layout.mainbranch')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <a href="{{ route('tenants.create') }}" class="btn btn-primary">Add Users</a>
        </div>
        <div class="container mt-4">
            @if (session()->has('message'))
                <div
                    class="alert alert-success text-center alert-dismissible fade show"
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
                    class="table table-bordered text-center"
                    style="border: 2px solid black"
                >
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Domain Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($tenants as $tenant)
                        <tr class="">
                            <td>{{ $tenant->name }}</td>
                            <td>{{ $tenant->email }}</td>
                            @foreach ($tenant->domains as $domain)
                            <td>
                               {{ $domain->domain }}
                            </td>
                                @endforeach
                            <td>
                                <a href="" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No data found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
