@extends('layouts.admin')
@section('header', 'Transaction')

@section('css')
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css') }}">
@endsection

@section('content')

<div id="controller">

<div class="card">
<div class="card-header">
 <div class="row">
    <div class="col-md-7">
      <a href="#" class="btn btn-sm btn-primary pull right" @click="addData()" >Add Transaction</a>
    </div>
    <div class="col-md-2">
      <select name="status" class="form-control">
        <option value="11"> Filter Status </option>
        <option value="1"> Aktif </option>
        <option value="0"> Non-Aktif </option>
      </select>
    </div>
    <div class="col-md-3">
      <select name="date_start" class="form-control">
        <option value="0"> Filter Date Start </option>
        <option value="1"> January </option>
        <option value="2"> February </option>
        <option value="3"> March </option>
        <option value="4"> April </option>
        <option value="5"> May </option>
        <option value="6"> June </option>
        <option value="7"> July </option>
        <option value="8"> Agustust </option>
        <option value="9"> September </option>
        <option value="10"> October </option>
        <option value="11"> November </option>
        <option value="12"> December </option>
      </select>
    </div>
 </div>
</div>

<div class="card-body">
 <table id="datatable" class="table-bordered table-striped">
     <thead>
     <tr>
     <th style="width: 10px">No</th>
     <th class='text-center' >Date Start</th>
     <th class='text-center' >Date End</th>
     <th class='text-center'>Borrower</th>
     <th class='text-center'>Durate</th>
     <th class='text-center'>Book Total</th>
     <th class='text-center'>Payment Total</th>
     <th class='text-center'>Status</th>
     <th class='text-center'>Action</th>
     </tr>
     </thead>
 </table>
</div>

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" :action="actionUrl"  autocomplete="off">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @csrf

                <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                <div class="form-group">
                    <label>Member</label>
                    <select name="member_id" class="form-control">
                    @foreach($members as $member)    
                    <option :selected="transaction == {{$member->id}}" value="{{$member->id}}">{{$member->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>Date and time:</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime">
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Book</label>
                    <select name="book_id" class="form-control">
                    @foreach($books as $book)    
                    <option :selected="transactionDetails == {{$book->id}}" value="{{$book->id}}">{{$book->title}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio1" name="status" value="returned">
                    <label for="customRadio1" class="custom-control-label">Returned</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" value="not returned">
                    <label for="customRadio2" class="custom-control-label">Not been returned</label>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

</div>

@endsection

@section('js')

<!-- TABLE plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- jQuery -->
<!-- <script src="{{asset('assets/plugins/jquery/jquery.min.js') }}"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
<!-- Select2 -->
<!-- <script src="{{asset('assets/plugins/select2/js/select2.full.min.js') }}"></script> -->
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<!-- <script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script> -->
<!-- BS-Stepper -->
<!-- <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script> -->
<!-- dropzonejs -->
<!-- <script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js') }}"></script> -->
<!-- AdminLTE App -->
<!-- <script src="{{asset('assets/dist/js/adminlte.min.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('assets/dist/js/demo.js') }}"></script> -->

<script type="text/javascript">
  $(function () {
    $("#datatable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>

<script type="text/javascript">

    var actionUrl = '{{url('transactions')}}';
    var apiUrl = '{{url('api/transactions')}}';

    var columns = [
      {data: 'DT_RowIndex', class: 'text-center', orderable: true },
      {data: 'created_at', class: 'text-center', orderable: true},
      {data: 'date_end', class: 'text-center', orderable: true},
      {data: 'name', class: 'text-center', orderable: true},
      {data: 'borrow_long', class: 'text-center', orderable: true},
      {data: 'book_total', class: 'text-center', orderable: true},
      {data: 'payment_total', class: 'text-center', orderable: true},
      {data: 'status', class: 'text-center', orderable: true},
      {render: function (index, row, data, meta){
             return `
             <a href="#" class="btn btn-warning brn-sm" onclick="controller.editData(event, ${meta.row})"> 
                 Edit 
             </a>

             <a class="btn btn-danger brn-sm" onclick="controller.deleteData(event, ${data.id})"> 
                 Delete
             </a> `;
        
      }, orderable: false, width: '345px', class: 'text-center'},
    ];

</script>

<script src="{{asset('js/data.js')}}"></script>

<script type="text/javascript">
  $('select[name=status]').on ('change', function() {
    status = $('select[name=status]').val();
    if (status == 11) {
      controller.table.ajax.url(actionUrl).load();
    } 
    else {
      controller.table.ajax.url(actionUrl+'?status='+status).load();
    }
  });
</script>

<script type="text/javascript">
  $('select[name=date_start]').on ('change', function() {
    date_start = $('select[name=date_start]').val();
    if (status == 0) {
      controller.table.ajax.url(actionUrl).load();
    } 
    else {
      controller.table.ajax.url(actionUrl+'?date_start='+date_start).load();
    }
  });
</script>

<script type="text/javascript">
//Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
</script>

@endsection