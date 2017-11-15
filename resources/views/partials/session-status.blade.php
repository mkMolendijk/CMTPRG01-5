@if (session('status'))
    <div class="row">
        <div class="col-md">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    </div>
@endif

@if(session()->has('message'))
    <div class="row">
        <div class="col-md">
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        </div>
    </div>
@endif