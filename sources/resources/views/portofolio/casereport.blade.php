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
                        <h4 class="page-title">Data {{$data['page']}}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h4 class="header-title" style="text-align: right;margin-right:20px;margin-top:10px;"><button
                                type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#standard-modal">New Case Report</button></h4>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="datatable-buttons"
                                        class="table table-striped dt-responsive nowrap w-100">
                                        <thead class="thead-dark">
                                            <!-- set table header  -->
                                            <tr>
                                                <th scope="col">No. Trx</th>
                                                <th scope="col">PPDS Name</th>
                                                <th scope="col">Stase</th>
                                                <th scope="col">Supervisor</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['portofolio'] as $list)
                                            <tr>
                                                <!-- menampilkan data dengan menggunakan array  -->
                                                <td>
                                                    <a href="" class="btn btn-outline-primary btn-sm"
                                                        data-toggle="modal" data-target="#modaledit"
                                                        data-id="{{$list->id}}"
                                                        data-hospital_id="{{$list->hospital_id}}"
                                                        data-hospital_name="{{$list->hospital_name}}"
                                                        data-hospital_status="{{$list->status ==  1 ? 'Active' : 'Delete'  }}"
                                                        data-hospital_update_date="">{{$list->trx_id}}</a>
                                                </td>
                                                <td>{{$list->ppds->user_name}}</td>
                                                <td>{{$list->stase->stase_name}}</td>
                                                <td>{{$list->supervisor->user_name}}</td>
                                                <td>
                                                    <span class="badge {{$list->status ==  1 ? ' bg-primary' : 'bg-warning'  }}">{{$list->status ==  1 ? 'Active' : 'Delete'  }}</span>
                                                </td>
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
        <form class="needs-validation" method="POST" action="{{route('post-tindakan')}}" enctype="multipart/form-data">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Form Data Hospital</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-pane show active" id="typeahead-preview">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="trx_id">Trx No</label>
                                    <input type="text" class="form-control" id="trx_id" value="{{$data['trx_id']}}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="supervisor">Supervisor</label>
                                    <select class="form-control custom-select" id="supervisor" name="supervisor_id">
                                        <option>Pilih Supervisor </option>
                                        @foreach($data['supervisor'] as $option)
                                        <option value="{{$option->id}}">{{$option->user_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="kegiatan">Kegiatan</label>
                                    <select class="form-control custom-select" id="kegiatan" name="stase_id">
                                        <option value="0">Pilih Kegiatan</option>
                                        @foreach($data['stase'] as $option)
                                        <option value="{{$option->stase_id}}">{{$option->stase_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="label" for="presenter">Nama Presenter</label>
                                    <input type="text" class="form-control" id="presenter" name="presenter">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Deskripsi Kegiatan</label>
                                    <textarea id="description" rows="2" class="form-control" name="description" required name="deskripsi"></textarea>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" >Foto Kegiatan</label>
                                    <div class="custom-file-upload">
                                        <input type="file" id="fileuploadInput" name="photo" accept="image/*" capture="camera">
                                        <label for="fileuploadInput">
                                            <span>
                                                <strong>
                                                <ion-icon name="camera-outline"></ion-icon>
                                                    <i>Open Camera</i>
                                                </strong>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Data Hospital</h5>
            </div>
            <!-- di dalam modal-body terdapat 4 form input yang berisi data. data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
            <div class="modal-body">
                <form method="POST" action="" enctype='multipart/form-data' novalidate>
                <input type="hidden" class="form-control" name="hospital_id" id="hospital_id_data" >
                    <div class="form-group">
                        <label>Hospital ID</label>
                        <input type="text" class="form-control" name="hospital_id" id="hospital_id" disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Hospital Name</label>
                        <input type="text" class="form-control" name="hospital_name" id="hospital_name" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="" id="">
                            <option value="1"> <span class="badge bg-primary">Active</span> </option>
                            <option value="0"> <span class="badge bg-warning">Delete</span> </option>
                        </select>
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
    var hospital_id_data = button.data('hospital_id')
    var hospital_id = button.data('hospital_id')
    var hospital_name = button.data('hospital_name')
    var status = button.data('status')
    var update_date = button.data('update_date')
    var modal = $(this)

    //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
    modal.find('#hospital_id_data').val(hospital_id_data)
    modal.find('#hospital_id').val(hospital_id)
    modal.find('#hospital_name').val(hospital_name)
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