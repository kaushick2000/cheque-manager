<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cheque;

class ChequeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cheque/index');
    }

    public function query(Request $request)
    {
        $Cheque = Cheque::with('users');

        $Cheque->where('user_id', Auth::id());
        if ($request->cheque_no) {
            $Cheque->where('cheque_no', $request->cheque_no);
        }

        return view('cheque/index', [
            'cheque_no' => $request->cheque_no,
            'cheques' => $Cheque->get()
        ]);
    }

    public function create()
    {
        return view('cheque/create');
    }

    public function store(Request $request)
    {
        $cheque = new Cheque;

        $cheque->client_name = $request->client_name;
        $cheque->date = $request->date;
        $cheque->amount = $request->amount;
        $cheque->cheque_no = $request->cheque_no;
        $cheque->user_id = Auth::id();

        $cheque->save();

        return redirect()->route('cheque.create')->with('status', 'Cheque added successfully!');
    }

    public function download(Request $request)
    {
        $mpdf = new \Mpdf\Mpdf();

        $cheque = Cheque::find($request->id);
        $html = view('cheque/pdf', ['cheque' => $cheque])->render();

        $mpdf->WriteHTML($html);
        $mpdf->Output("Cheque-{$cheque->account_no}.pdf", 'D');
    }
}
