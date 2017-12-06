<form role="search" method="POST" action="{{ url('admin/addGame') }}" enctype="application/x-www-form-urlencoded">
    {{ method_field('POST') }}
    {{ csrf_field() }}
    <div class="form-group">
        <div class="input-group mb-2 mb-sm-0">
            <input type="text" class="form-control" id="searchInput" placeholder="Search...">
            <div class="input-group-addon">Search</div>
        </div>
    </div>
</form>