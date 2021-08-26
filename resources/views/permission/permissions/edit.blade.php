@extends('layouts.back')

@section('content')
    <div class="card mb-4" >
        <div class="card-header">Edit Permissions</div>

        <div class="card-body">
            <form action="{{ route('permission.edit',$permission) }}" method="post">
                @csrf
                @method('PUT')
              @include('permission.permissions.partial.form-control')
            </form>
        
        </div>
    </div>

@endsection