@if (session()->has('success'))
    <div class="alert alert-success">
        <h4 class="text-dark my-0"><strong>{{ session('success') }}</strong></h4>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        <h4 class="text-dark my-0"><strong>{{ session('error') }}</strong></h4>
    </div>
@endif
