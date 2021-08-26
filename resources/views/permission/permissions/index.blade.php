@extends('layouts.back')

@section('content')
    <div class="card mb-4" >
        <div class="card-header">Create New permissions</div>

        <div class="card-body">
            <form action="{{ route('permission.create') }}" method="post">
                @csrf
              @include('permission.permissions.partial.form-control',['submit' => 'Create'])
            </form>
        
        </div>
    </div>

    <div class="card">
        <div class="card-header">Table Permissions</div>
    
        <div class="card-body">
                <table class="table table-hover ">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Guard Name </th>
                        <th>Create At </th>
                        <th>Act</th>
                    </tr>

                    @foreach ($permissions as  $index => $permission)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>{{ $permission->created_at->format("d F Y")}}</td>
                        <td><a href="{{ route('permission.edit',$permission) }}" class="btn btn-primary btn-sm">EDIT</a></td>
                    </tr>
                        
                    @endforeach

                </table>
        </div>
    </div>
@endsection