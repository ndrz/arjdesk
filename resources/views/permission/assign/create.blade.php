@extends('layouts.back')


@section('styles')
<link href="{{ asset('dist/css/select2.min.css') }}" rel="stylesheet">
@endsection

@push('scripts')
    <script src="{{ asset('dist/js/select2.min.js') }}"></script>

    <script>
      $(document).ready(function() {
          $('.select2').select2({
            placeholder:"Select Permissions"
          });
      });
    </script>
@endpush

@section('content')
@if (session('success'))
    <div class="alert alert-success">
       {{ session('success') }}
    </div>
        
@endif

<div class="card mb-3">
    <div class="card-header">Assign Permission </div>
    <div class="card-body">
        <form action="{{ route('assign.create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="role">Role Name </label>
                <select name="role" id="role" class="form-control">
                    <option disabled selected>Choose Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name  }}</option>
                    @endforeach

                </select>
                @error('role')
                      <div class="text-danger mt-2 d-block">
                        {{ $message }}
                      </div>
                @enderror
            </div>

            .<div class="form-group">
              <label for="permissions ">Permissions</label>
              <select name="permissions[]" id="permissions" class="form-control select2" multiple>

                  @foreach ($permissions as $permission)
                  <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                  @endforeach
                  
              </select>
              @error('permissions')
                <div class="text-danger mt-2 d-block">
                        {{ $message }}
                    </div>
              @enderror
            </div>
                <button type="submit" class="btn btn-secondary">Assign </button>
            
        </form>
    </div>
</div>

<div class="card">
  <div class="card-header">Table Role and Permissions</div>
  <div class="card-body">
    <table class="table table-hover">
       <tr>
         <th>#</th>
         <th>Role</th>
         <th>Permissions </th>
       </tr>

       @foreach ($roles as $index => $role)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $role->name }}</td>
          <td>{{ implode(', ', $role->getPermissionNames()->toArray()) }}</td>
        </tr>           
       @endforeach
    </table>
  </div>
</div>

@endsection