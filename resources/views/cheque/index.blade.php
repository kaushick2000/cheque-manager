@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6"><h5 class="m-1">Cheques</h5></div>
            <div class="col-6">
                <div class="text-right pb-2">
                    <a href="{{ route('cheque.create') }}" class="btn btn-sm btn-outline-primary">Add Cheque</a>
                </div>
            </div>
        </div>

        <div class="my-3">
            <form method="POST" action="{{ route('cheque.query') }}">
                @csrf

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" id="cheque-no" name="cheque_no"
                                placeholder="Enter Cheque No (optional)" value="<?= $cheque_no ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Get</button>
                    </div>
                </div>
            </form>
        </div>

        @if (isset($cheques))
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th nowrap>#</th>
                                <th nowrap>Cheque No</th>
                                <th nowrap>Client's Name</th>
                                <th nowrap>Date</th>
                                <th nowrap>Amount</th>
                                <th nowrap>Added At</th>
                                <th nowrap></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cheques as $cheque)
                                <tr>
                                    <td class="align-middle text-nowrap">{{ $loop->iteration }}</td>
                                    <td class="align-middle text-nowrap">{{ $cheque->cheque_no ?? '-' }}</td>
                                    <td class="align-middle text-nowrap">{{ $cheque->client_name }}</td>
                                    <td class="align-middle text-nowrap">{{ date('d-m-Y', strtotime($cheque->date)) }}</td>
                                    <td class="align-middle text-nowrap">{{ $cheque->amount }}</td>
                                    <td class="align-middle text-nowrap">{{ date('d-m-Y H:i A', strtotime($cheque->updated_at)) }}</td>
                                    <td align="right">
                                        <a href="{{ route('cheque.download', ['id' => $cheque->id]) }}" class="btn btn-sm btn-outline-primary">PDF</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" align="center">No Records Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
