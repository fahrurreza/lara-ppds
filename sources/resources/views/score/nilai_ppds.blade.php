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
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="datatable-buttons"
                                        class="table table-striped dt-responsive nowrap w-100">
                                        <thead class="thead-dark">
                                            <!-- set table header  -->
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">PPDS Name</th>
                                                <th scope="col">Semester</th>
                                                <th scope="col">Nilai</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['ppds'] as $list)
                                            <tr>
                                                <!-- menampilkan data dengan menggunakan array  -->
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    <a href="{{route('nilai-ppds-portofolio', ['id' => cript($list->ppds_id) ])}}" class="btn btn-outline-success btn-sm">{{$list->ppds->user_name}}</a>    
                                                </td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td><span class="badge bg-warning">UnCheck</span></td>
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


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>

@endsection