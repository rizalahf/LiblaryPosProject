<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.author.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'addres' => ['required'], 
    
    ]);

        Author::create($request->all());

        return redirect ('authors');
    }

    /**
     * Display the specified resource.
     */

     public function api()
     {
        $authors = Author::all();
        $datatables = datatables()->of($authors)->addColumn('date', function($authors) {return dateformat($authors->created_at); })->addIndexColumn();

        return $datatables->make(true);
     }

    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request,[
            'name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'addres' => ['required'], 
    
    ]);

        $author->update($request->all());

        return redirect ('authors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
    }
}
