    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">AAUXFIN NEWS  </div>
      <div class="list-group list-group-flush">
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>       
        <a href="{{ route('home.contents') }}" class="list-group-item list-group-item-action bg-light">Posts</a>
        <a href="{{route('advertisment.index')}}" class="list-group-item list-group-item-action bg-light">Advertisement</a>
        <a href="{{route('marketing.index')}}" class="list-group-item list-group-item-action bg-light">Marketing</a>
        <a href="{{route('home.categories')}}" class="list-group-item list-group-item-action bg-light">Categories</a>
        
        <a href="{{ route('home.vacancy') }}" class="list-group-item list-group-item-action bg-light">Vacancy</a>
        @if(Auth::check() && Auth::user()->rolePivots->pluck('role_id')->contains('1'))
        <a href="{{ route('home.user') }}" class="list-group-item list-group-item-action bg-light">Users</a>
        <a href="{{ route('home.role') }}" class="list-group-item list-group-item-action bg-light">Role</a>
        @endif
      </div>
    </div>
    <!-- /#sidebar-wrapper -->