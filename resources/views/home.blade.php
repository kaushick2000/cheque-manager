@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Cheque</h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                    <p class="card-text">Create / view / download Cheque</p>
                    <a href="{{ route('cheque.create') }}" class="card-link">Add Cheque</a>
                    <a href="{{ route('cheque.index') }}" class="card-link">View Cheque</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
