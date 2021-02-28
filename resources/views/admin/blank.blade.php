@extends('layouts.master')
@section('content')
@can('users_manage')
<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Blank Page</h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
        </div>
    </div>
</div>
@endcan
@endsection