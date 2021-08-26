@extends('layouts.back')

@section('content')
    <div class="card mb-4" >
        <div class="card-header">Create New Roles</div>

        <div class="card-body">
            <form action="{{ route('roles.create') }}" method="post">
                @csrf
              @include('permission.roles.partial.form-control',['submit' => 'Create'])
            </form>
        
        </div>
    </div>

    <div class="card">
        <div class="card-header">Data Roles</div>
    
        <div class="card-body">
                <table class="table table-hover ">
                    <tr>
                        <th>#</th>
                        <th> Name</th>
                        <th>Guard Name </th>
                        <th>Create At </th>
                        <th>Act</th>
                    </tr>

                    @foreach ($roles as  $index => $role)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>{{ $role->created_at->format("d F Y")}}</td>
                        <td><a href="{{ route('roles.edit',$role) }}" class="btn btn-primary btn-sm">EDIT</a></td>
                    </tr>
                        
                    @endforeach

                </table>
        </div>
    </div>
@endsection