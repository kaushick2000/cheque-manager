@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6"><h5 class="m-1">Add Cheque</h5></div>
            <div class="col-6">
                <div class="text-right pb-2">
                    <a href="{{ route('cheque.index') }}" class="btn btn-sm btn-outline-primary">View Cheque</a>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card p-3 py-4">
            <form method="POST" action="{{ route('cheque.store') }}">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cheque-clientname">Client Name</label>
                            <input type="text" class="form-control" id="cheque-clientname" name="client_name"
                                placeholder="Enter Client Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cheque-date">Date</label>
                            <input type="date" class="form-control" id="cheque-date" name="date"
                                placeholder="Enter Date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cheque-amount">Amount</label>
                            <input type="number" class="form-control" id="cheque-amount" name="amount"
                                placeholder="Enter Amount" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cheque-number">Cheque No</label>
                            <input type="text" class="form-control" id="cheque-number" name="cheque_no"
                                placeholder="Enter Cheque No" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
