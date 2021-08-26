<div class="">

    @can('product-list')
    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase  "><strong>Produk</strong> </small>
        <div class="list-group">
            @can('product-create')
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                Create Product
             </a>
            @endcan
            
            <a href="#" class="list-group-item list-group-item-action">Data Product</a>
          </div>
    </div>
    @endcan
  
    @hasanyrole('admin'|'administrator')
    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase  "><strong>Categories</strong> </small>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
               Create Categori
            </a>
            <a href="#" class="list-group-item list-group-item-action">Data Categori</a>
          </div>
    </div>

    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase  "><strong>Rolee & Permission</strong> </small>
        <div class="list-group">
            <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action" aria-current="true">
               Roles
            </a>
            <a href="{{ route('permission.index') }}" class="list-group-item list-group-item-action">Permission</a>
            <a href="{{ route('assign.create') }}" class="list-group-item list-group-item-action">Asign Permission</a>
          </div>
    </div>

    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase  "><strong>User</strong> </small>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
               Create User
            </a>
            <a href="#" class="list-group-item list-group-item-action">Data User</a>
          </div>
    </div>
    @endhasanyrole
    
    <div class="mb-5">
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>
 
 
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
        </div>
    </div>


  
</div>