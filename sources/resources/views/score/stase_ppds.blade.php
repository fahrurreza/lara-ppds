@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Data Stase</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="datatable-buttons"
                                        class="table table-striped dt-responsive nowrap w-100">
                                        <thead class="thead-dark">
                                            <!-- set table header  -->
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Stase Name</th>
                                                <th scope="col">Capaian</th>
                                                <th scope="col">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['stase'] as $list)
                                            <tr>
                                                <!-- menampilkan data dengan menggunakan array  -->
                                                <td>
                                                
                                                <a href="" class="btn btn-outline-primary btn-sm"
                                                        data-toggle="modal" data-target="#modaledit"
                                                        data-id="{{$list->id}}"
                                                        data-stase_id="{{$list->stase_id}}"
                                                        data-stase_name="{{$list->stase_name}}"
                                                        data-status="{{$list->status}}"
                                                        data-update_date="">{{$list->stase_id}}</a>    
                                                </td>
                                                <td>{{$list->stase->stase_name}}</td>
                                                <td>85</td>
                                                <td><input type="number"></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- end preview-->
                            </div> <!-- end tab-content-->
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->
</div>


<!-- MODAL TAMBAH DATA -->
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form class="needs-validation" method="POST" action="{{route('stase')}}" enctype='multipart/form-data' novalidate>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Form Data Stase</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-pane show active" id="typeahead-preview">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Stase Name</label>
                                    <input type="text" class="form-control" name="stase_name"
                                        data-provide="typeahead" id="the-basics" placeholder="Stase Name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Stase Score</label>
                                    <input type="text" class="form-control" name="stase_score"
                                        data-provide="typeahead" id="the-basics" placeholder="Stase Score" required>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- end preview-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add" class="btn btn-primary">Save</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--MODAL EDIT DATA-->
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data stase</h5>
            </div>
            <!-- di dalam modal-body terdapat 4 form input yang berisi data. data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
            <div class="modal-body">
                <form method="POST" action="" enctype='multipart/form-data' novalidate>
                <input type="hidden" class="form-control" name="stase_id" id="stase_id_data" >
                    <div class="form-group">
                        <label for="exampleFormControlInput1">stase ID</label>
                        <input type="text" class="form-control" name="stase_id" id="stase_id" disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">stase Name</label>
                        <input type="text" class="form-control" name="stase_name" id="stase_name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Status</label>
                        <input type="text" class="form-control" name="status" id="status">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="undelete" id="undeleteBtn" class="btn btn-danger">Undelete</button>
                <button type="submit" name="delete"  id="deleteBtn" class="btn btn-danger">Delete</button>
                <button type="submit" name="save" id="saveBtn" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-success" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<script>
$('#modaledit').on('show.bs.modal', function(event) {
    // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
    var button = $(event.relatedTarget)

    // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
    var stase_id_data = button.data('stase_id')
    var stase_id = button.data('stase_id')
    var stase_name = button.data('stase_name')
    var status = button.data('status')
    var update_date = button.data('update_date')
    var modal = $(this)

    //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
    modal.find('#stase_id_data').val(stase_id_data)
    modal.find('#stase_id').val(stase_id)
    modal.find('#stase_name').val(stase_name)
    modal.find('#status').val(status)
    modal.find('#update_date').val(update_date)

     // Mengatur visibilitas tombol "Undelete" berdasarkan status
     if (status === 'Active') {
        $('#undeleteBtn').hide(); // Menyembunyikan tombol "Undelete"
        $('#saveBtn').show(); // Menyembunyikan tombol "Undelete"
        $('#deleteBtn').show(); // Menyembunyikan tombol "Undelete"
    } else if (status === 'Delete') {
        $('#undeleteBtn').show(); // Menampilkan tombol "Undelete"
        $('#deleteBtn').hide(); // Menyembunyikan tombol "Undelete"
        $('#saveBtn').hide(); // Menyembunyikan tombol "Undelete"
    }
})
    // Fungsi untuk menyembunyikan elemen div setelah beberapa detik
    function hideDiv() {
        var div = document.getElementById("myDiv"); // Ganti "myDiv" dengan ID elemen div Anda

        setTimeout(function() {
            div.style.display = "none"; // Menyembunyikan elemen div dengan mengubah properti display menjadi "none"
        }, 5000); // Ubah 5000 menjadi jumlah milidetik (5 detik) sesuai kebutuhan Anda
    }

    // Panggil fungsi hideDiv() saat halaman pertama kali dimuat
    window.onload = hideDiv;
</script>

@endsection