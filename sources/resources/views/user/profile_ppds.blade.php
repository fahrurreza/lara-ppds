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
                        <h4 class="page-title">{{$data['page']}}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h4 class="header-title" style="text-align: right;margin-right:20px;margin-top:10px;"><button
                                type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#standard-modal">New PPDS</button></h4>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="datatable-buttons"
                                        class="table table-striped dt-responsive nowrap w-100">
                                        <thead class="thead-dark">
                                            <!-- set table header  -->
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">PPDS Name</th>
                                                <th scope="col">Telephone</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Photo</th>
                                                <th scope="col">Update ID</th>  
                                                <th scope="col">Update Date</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['ppds'] as $list)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    <a href="" class="btn btn-outline-success btn-sm"
                                                        data-toggle="modal" data-target="#modaledit"
                                                        data-user_id="{{$list->user_id}}"
                                                        data-user_name="{{$list->user_name}}"
                                                        data-email="{{$list->email}}"
                                                        data-phone="{{$list->phone}}"
                                                        data-status="{{$list->status}}">
                                                        {{$list->user_name}}
                                                    </a>
                                                </td>
                                                <td>+62 {{$list->phone}}</td>
                                                <td>{{$list->gender ==  1 ? 'Male' : 'Female'  }}</td>
                                                <td>{{$list->email}}</td>
                                                <td>
                                                    @if($list->photo == null)
                                                    <img src="https://cdn.pixabay.com/photo/2016/03/31/20/11/doctor-1295571_640.png" height=50 width=50></img>
                                                    @else
                                                    <img src="{{$list->photo}}" height=50 width=50></img>
                                                    @endif
                                                </td>
                                                <td>{{$list->update_name->user_name}}</td>
                                                <td>{{$list->update_date}}</td>
                                                <td><span class="badge {{$list->status ==  1 ? ' bg-primary' : 'bg-warning'  }}">{{$list->status ==  1 ? 'Active' : 'Delete'  }}</span></td>
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
        <form class="needs-validation" method="POST" action="{{route('user-post')}}" enctype='multipart/form-data' novalidate>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Form Data Stase</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-pane show active" id="typeahead-preview">
                        <div class="row">
                            <input type="hidden" name="user_level" value="1">
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <input type="text" class="form-control" id="name1" placeholder="FULL NAME"
                                        style="text-transform:uppercase" name="user_name" required>
                                </div>
                            </div>

                            <div class=" mt-1 text-left">
                                <div class="custom-control custom-radio mb-1">
                                    <input type="radio" id="customRadio1" name="gender" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="customRadio1">Male</label>
                                </div>
                                <div class="custom-control custom-radio mb-1">
                                    <input type="radio" id="customRadio2" name="gender" class="custom-control-input" value="2">
                                    <label class="custom-control-label" for="customRadio2">Female</label>
                                </div>

                            </div>
                            <div class="form-group boxed mb-3">
                                <div class="input-wrapper">
                                    <input type="number" class="form-control" placeholder="PHONE" name="phone" required>
                                </div>
                            </div>
                            <div class="form-group boxed mb-3">
                                <div class="input-wrapper">
                                    <input type="email" class="form-control" id="email1" placeholder="EMAIL ADDRESS"
                                        name="email" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Data stase</h5>
            </div>
            <!-- di dalam modal-body terdapat 4 form input yang berisi data. data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
            <div class="modal-body">
                <form method="POST" action="" enctype='multipart/form-data' novalidate>
                <input type="hidden" class="form-control" name="stase_id" id="stase_id_data" >
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Full Name</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="text" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" name="undelete" id="undeleteBtn" class="btn btn-danger">Undelete</button>
                <button type="button" name="delete"  id="deleteBtn" class="btn btn-danger">Delete</button>
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
    var user_id = button.data('user_id')
    var user_name = button.data('user_name')
    var email = button.data('email')
    var phone = button.data('phone')
    var status = button.data('status')
    var update_date = button.data('update_date')
    var modal = $(this)

    //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
    modal.find('#user_id').val(user_id)
    modal.find('#user_name').val(user_name)
    modal.find('#email').val(email)
    modal.find('#phone').val(phone)
    modal.find('#status').val(status)
    modal.find('#update_date').val(update_date)

     // Mengatur visibilitas tombol "Undelete" berdasarkan status
     if (status === 1) {
        $('#undeleteBtn').hide(); // Menyembunyikan tombol "Undelete"
        $('#saveBtn').show(); // Menyembunyikan tombol "Undelete"
        $('#deleteBtn').show(); // Menyembunyikan tombol "Undelete"
    } else if (status === 2) {
        $('#undeleteBtn').show(); // Menampilkan tombol "Undelete"
        $('#deleteBtn').hide(); // Menyembunyikan tombol "Undelete"
        $('#saveBtn').hide(); // Menyembunyikan tombol "Undelete"
    }
})

    let undeleteBtn = document.querySelector('#undeleteBtn');
    element.addEventListener("click", function(){
        console.log('OK')
    });
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