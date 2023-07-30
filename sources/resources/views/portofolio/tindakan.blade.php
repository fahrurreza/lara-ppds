@extends('layouts.app')

@section('content')

@push('custom-style')
<link rel="stylesheet" href="assets/sweetalert/xsweetalert.css">
@endpush

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
                                data-bs-target="#standard-modal">New Tindakan</button></h4>
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
                                                        data-trx_id="{{$list->trx_id}}"
                                                        data-update_date="{{$list->update_date}}"
                                                        data-supervisor_name="{{$list->supervisor->user_name}}"
                                                        data-PPDS_name="{{$list->ppds->user_name}}"
                                                        data-stase_name="{{$list->stase->stase_name}}"
                                                        data-user_name="{{$list->ppds->user_name}}"
                                                        data-description="{{$list->tindakan->description}}"
                                                        data-path="{{asset('assets/ppds_path/posting/'.$list->path->path)}}"
                                                        data-status="{{$list->status}}"
                                                        @if($list->revision !== null)
                                                        data-revision="{{$list->revision->note}}"
                                                        @else
                                                        data-revision=""
                                                        @endif
                                                        >

                                                        <!-- https://mobile.ppdslogbook.com/assets/img/posting/{{$list->path->path}} -->
                                                        {{$list->trx_id}}
                                                    </a>
                                                </td>
                                                <td>{{$list->ppds->user_name}}</td>
                                                <td>{{$list->stase->stase_name}}</td>
                                                <td>{{$list->supervisor->user_name}}</td>
                                                <td>
                                                    @if($list->status == 1)
                                                        <span class="badge bg-primary">Active</span>
                                                    @elseif($list->status == 2)
                                                        <span class="badge bg-warning">Revision</span>
                                                    @elseif($list->status == 3)
                                                        <span class="badge bg-info">Verified</span>
                                                    @elseif($list->status == 4)
                                                        <span class="badge bg-success">Approved</span>
                                                    @else
                                                        <span class="badge bg-danger">Delete</span>
                                                    @endif

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
                    <h4 class="modal-title" id="standard-modalLabel">Form Portofolio</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-pane show active" id="typeahead-preview">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="ppds">PPDS</label>
                                    <select class="form-control custom-select" id="ppds" name="ppds_id" required>
                                        <option value="">Pilih PPDS</option>
                                        @foreach($data['ppds'] as $option)
                                        <option value="{{$option->id}}">{{$option->user_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="hospital">Hospital</label>
                                    <select class="form-control custom-select select2" id="hospital" name="hospital_id" required>
                                        <option value=''>Pilih Hospital </option>
                                        @foreach($data['hospital'] as $option)
                                        <option value="{{$option->hospital_id}}">{{$option->hospital_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="supervisor">Supervisor</label>
                                    <select class="form-control custom-select" id="supervisor" name="supervisor_id" required>
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
                                    <select class="form-control custom-select" id="kegiatan" name="stase_id" required>
                                        <option value="0">Pilih Kegiatan</option>
                                        @foreach($data['stase'] as $option)
                                        <option value="{{$option->stase_id}}">{{$option->stase_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Deskripsi Kegiatan</label>
                                    <textarea id="description" rows="2" class="form-control" name="description" required></textarea>
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
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Hospital</h5>
            </div>
            <!-- di dalam modal-body terdapat 4 form input yang berisi data. data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
            <div class="modal-body">
                <form method="POST" action="" enctype='multipart/form-data' novalidate>
                    <input type="hidden" class="form-control" name="trx_id" id="trx_id_data">
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="inputEmail4" class="form-label">Portofolio ID</label>
                            <input type="text" class="form-control" name="trx_id" id="trx_id" disabled>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label">PPDS Name</label>
                            <input type="text" class="form-control" name="user_name" id="user_name" disabled>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="inputEmail4" class="form-label">Supervisor Name</label>
                            <input type="text" class="form-control" name="supervisor_name" id="supervisor_name" disabled>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label">Stase Description</label>
                            <input type="text" class="form-control" name="stase_name" id="stase_name" disabled>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="inputEmail4" class="form-label">Note</label>
                            <textarea class="form-control"  rows="5" id="description" name="description " disabled></textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <img id="path" width="200" height="160">
                        </div>
                    </div>
                    *Note Revision
                    <textarea class="form-control"  rows="4"  name="revisi_description" id="revisi_description" ></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" id="revision" class="btn btn-warning">Revision</button>
                <button type="button" id="approve" class="btn btn-primary">Approve</button>
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

<script src="{{asset('assets/sweetalert/xsweetalert.js')}}"></script>

<script>
    $('#modaledit').on('show.bs.modal', function(event) {
        // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
        var button = $(event.relatedTarget)
        // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
        var trx_id_data = button.data('trx_id')
        var trx_id = button.data('trx_id')
        var status = button.data('status')
        var update_date = button.data('update_date')
        var supervisor_name = button.data('supervisor_name')
        var PPDS_name = button.data('PPDS_name')
        var stase_name = button.data('stase_name')
        var user_name = button.data('user_name')
        var status = button.data('status')
        var description = button.data('description')
        var path = button.data('path');
        var revision = button.data('revision');
        var imgElement = document.getElementById("path");
        var modal = $(this)

        //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
        modal.find('#trx_id_data').val(trx_id_data)
        modal.find('#trx_id').val(trx_id)
        modal.find('#status').val(status)
        modal.find('#update_date').val(update_date)
        modal.find('#PPDS_name').val(PPDS_name)
        modal.find('#stase_name').val(stase_name)
        modal.find('#user_name').val(user_name)
        modal.find('#supervisor_name').val(supervisor_name)
        modal.find('#description').val(description)
        modal.find('#revisi_description').val(revision)
        imgElement.src = path;
        
        
        

        // Mengatur visibilitas tombol "Undelete" berdasarkan status
        if (status === 1) {
            $('#revision').show(); // Menyembunyikan tombol "Undelete"
            $('#approve').show(); // Menyembunyikan tombol "Undelete"
        }
        else {
            $('#revision').hide(); // Menyembunyikan tombol "Undelete"
            $('#approve').hide(); // Menyembunyikan tombol "Undelete"
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

<script>
    var approve = document.getElementById("approve");
    approve.addEventListener("click", function() {

        Swal.fire({
            title: 'Kamu sudah yakin?',
            text: "Pastikan data ini sudah benar ya",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
            }).then((result) => {
            if (result.isConfirmed) {
                var trx_id = document.getElementById("trx_id_data").value

                $.ajax({
                    type : 'post',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url : '{{URL::to('approve-portofolio')}}',
                    data:{'trx_id':trx_id},
                    success:function(response){
                        if(response == true){
                            Swal.fire({
                            icon: 'success',
                            title: 'Portofolio has been approved',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            window.location.reload()
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Portofolio failed approved',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            setTimeout(reload, 2000)
                            function reload(){
                                window.location.reload()
                            }
                        }
                    }
                });
            }
        })
    });

    var revision = document.getElementById("revision");
    revision.addEventListener("click", function() {
          
        var note = document.getElementById("revisi_description").value;

        if(note == ''){
            Swal.fire({
                icon: 'error',
                title: 'Note Revision Is Required',
                showConfirmButton: false,
                timer: 1500
            })
        }else{
            var trx_id = document.getElementById("trx_id_data").value

            $.ajax({
                type : 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url : '{{URL::to('revision-portofolio')}}',
                data:{'trx_id':trx_id, 'note':note},
                success:function(response){
                    if(response == true){
                        Swal.fire({
                        icon: 'success',
                        title: 'Portofolio has been revisiond',
                        showConfirmButton: false,
                        timer: 3000
                        })
                        window.location.reload()
                    }else{
                        Swal.fire({
                        icon: 'error',
                        title: 'Portofolio failed revisiond',
                        showConfirmButton: false,
                        timer: 3000
                        })
                        setTimeout(reload, 3500)
                        function reload(){
                            window.location.reload()
                        }
                    }
                }
            });
        }
            
    });
</script>

@endsection