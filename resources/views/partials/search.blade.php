<form role="search" method="POST" action="{{ url('/search') }}">
    {{ method_field('POST') }}
    {{ csrf_field() }}
    <div class="form-group">
        <div class="input-group mb-2 mb-sm-0">
            <input type="text" class="form-control" id="searchInput" name="searchInput" placeholder="Search...">
            <div class="input-group-addon">Search</div>
        </div>
    </div>
</form>