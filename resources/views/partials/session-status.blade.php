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

@if(session()->has('error'))
    <div class="row">
        <div class="col-md">
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        </div>
    </div>
@endif

@if(session()->has('warning'))
    <div class="row">
        <div class="col-md">
            <div class="alert alert-warning">
                {{ session()->get('warning') }}
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}<br />
        @endforeach
    </div>
@endif