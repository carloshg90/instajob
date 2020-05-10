@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home empresa</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Soc una empresa</h1>

                    En aquesta vista mostrarem els treballadors que busquin feina en la mateixa zona o del mateix sector que la empresa.

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
