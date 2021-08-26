@extends('layouts.back')

@section('content')
    <div class="card mb-4" >
        <div class="card-header">Edit Roles</div>

        <div class="card-body">
            <form action="{{ route('roles.edit',$role) }}" method="post">
                @csrf
                @method('PUT')
              @include('permission.roles.partial.form-control')
            </form>
        
        </div>
    </div>

@endsection