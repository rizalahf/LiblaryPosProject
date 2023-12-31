@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')

Ini adalah halaman Catalog <br><br>

<div class="card">
<div class="card-header">

<a href=" {{url('catalogs/create')}} " class="btn btn-sm btn-primary pull right" >Create New Catalog</a>
</div>

<div class="card-body">
 <table class="table table-bordered">
     <thead>
     <tr>
     <th style="width: 10px">No</th>
     <th class='text-center' >Name</th>
     <th class='text-center' >Total Books</th>
     <th class='text-center'>Created At</th>
     <th class='text-center'>Action</th>
     </tr>
     </thead>
     <tbody>
        @foreach( $catalogs as $key => $catalog)
          <tr>
             <td>{{$key+1}}</td>
             <td>{{$catalog->name}}</td>
             <td class='text-center'> {{ count( $catalog->books )}} </td>
             <td class='text-center'> {{ dateformat($catalog->created_at)}} </div>
             <td class='text-center'> <a href="{{url('catalogs/'.$catalog->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>

             <form action="{{ url('catalogs', ['id' => $catalog->id])}}" method="post">
                <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are You Sure')">
                @method('delete')
                @csrf

             </form>

            </td>
             </div>
             </td>
         </tr>
        @endforeach
     </tbody>
 </table>
</div>

<!-- <div class="card-footer clearfix">
<ul class="pagination pagination-sm m-0 float-right">
<li class="page-item"><a class="page-link" href="#">«</a></li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">»</a></li>
</ul>
</div> -->
</div>

@endsection