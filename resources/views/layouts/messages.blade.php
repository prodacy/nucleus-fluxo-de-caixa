@if (session('danger'))
<div class="alert alert-danger border-left-danger alert-dismissible fade show show-down" role="alert">
    {{ session('danger') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning border-left-warning alert-dismissible fade show show-down" role="alert">
    {{ session('warning') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif

@if (session('info'))
<div class="alert alert-info border-left-info alert-dismissible fade show show-down" role="alert">
    {{ session('info') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show show-down" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger show-down" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif