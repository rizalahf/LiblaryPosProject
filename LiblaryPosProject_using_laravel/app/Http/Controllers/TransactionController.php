<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\TransactionDetail;
use App\Models\Member;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->status) {
            $datas = Transaction::where('status', $request->status)->get();
        }
        else {
            $datas = Transaction::all();
        }

        $datatables = datatables()->of($datas)->addIndexColumn();

        $members = Member::all();

        $transactions = Transaction::all();
        $transactionDetails = TransactionDetail::all();

        $books = Book::all();

        // return $datatables->make(true);

        return view('admin.transaction.index', compact('members', 'transactionDetails', 'transactions', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function api()
    {

       $transactions = Transaction::all();
       $datatables = datatables()->of($transactions)->addColumn('date', function($transactions) {return dateformat($transactions->created_at); })->addIndexColumn();

       return $datatables->make(true);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => ['null'],
            'member_id' => ['required'],
            'book_id' => ['required'],
            'date_start' => ['null'],
            'book_total' => ['null'],
            'borrow_long' => ['null'], 
            'payment_total' => ['null'],
            'status' => ['required'],

    ]);
        Transaction::create($request->all());

        return redirect ('transactions');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
    }
}
