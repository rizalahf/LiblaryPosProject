<?php

namespace App\Http\Controllers;

use DB;
use App\models\Member;
use App\models\Publisher;
use App\models\Book;
use App\models\Author;
use App\models\Catalog;
use App\models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $member_total = Member::count();
        $book_total = Book::count();
        $catalog_total = Catalog::count();
        $publisher_total = Publisher::count();

        $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))->groupby('publisher_id')->orderby('publisher_id', 'asc')->pluck('total');
        $label_donut = Publisher::orderby('publishers.id', 'asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('publishers.name')->pluck('publishers.name');

        $label_bar = ['Created Book', 'Updated Book'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgrounColor'] = $key == 0 ? 'rgba(60, 141, 188, 8,9)' : 'rgba(210, 214, 222, 1)';
            $data_month = [];

            foreach(range(1,12) as $month) {
                if ($key == 0) {
                $data_month[] = Book::select(DB::raw("COUNT(*) as total"))->whereMonth('created_at', $month)->first()->total;
                } else {
                $data_month[] = Book::select(DB::raw("COUNT(*) as total"))->whereMonth('updated_at', $month)->first()->total;
                }
            }
            $data_bar[$key]['data'] = $data_month; 
        }

        return view('home', compact('member_total', 'book_total', 'catalog_total', 'publisher_total', 'data_donut', 'label_donut', 'data_bar'));
    }
}
