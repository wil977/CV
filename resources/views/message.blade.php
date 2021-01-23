@extends('layouts.menuadmin')
@section('7')
active
@endsection
@section('home')
<script type="text/javascript">
    // modal show
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#shId').text($(this).data('id'));
        $('#shName').text($(this).data('name'));
        $('#shEmail').text($(this).data('email'));
        $('#shSubject').text($(this).data('subject'));
        $('#shMessage').text($(this).data('message'));
        $('.modal-title').text('Show Message');
    });

    // modal delete
    $(document).on('click', '.delete-modal', function() {
        $('#delete').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Delete Message');
        $('#delId').val($(this).data('id'));
        $('#delName').text($(this).data('name'));
    });
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="test">MESSAGES DE CONTACT AVEC NOUS DE LA PART DES UTILISATEURS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Messages</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des données de la section message</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <div class="table-responsive-md">
                            <table class="table table-dark table-striped table-bordered table-hover table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    {{csrf_field()}}
                                    @if (count($mes)>0)

                                    @foreach ($mes as $me => $p)
                                    <tr>
                                        <td>
                                            <a href="#" style="margin-bottom:5px;" class="show-modal btn btn-info" data-id='{{$p->id}}' data-name='{{$p->name}}' data-email='{{$p->email}}' data-subject='{{$p->subject}}'
                                              data-message='{{$p->message}}'><i class="fa fa-eye"></i></a>
                                            <a href="#" class="delete-modal btn btn-danger" data-id={{$p->id}} data-name='{{$p->name}}'><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td>{{$p->id}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->email}}</td>
                                        <td>{{$p->subject}}</td>
                                        <td>{{$p->message}}</td>
                                        <td>{{$p->created_at}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


<div id="show" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if (count($mes)>0)
                <p><b>Id : </b>
                <p id="shId"></p>
                </p>
                <p><b>Name : </b>
                <p id="shName"></p>
                </p>
                <p><b>Email : </b>
                <p id="shEmail"></p>
                </p>
                <p><b>Subject : </b>
                <p id="shSubject"></p>
                </p>
                <p><b>Message : </b>
                <p id="shMessage"></p>
                </p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class=""></span>Close
                </button>
            </div>
        </div>
    </div>
</div>

<div id="delete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" action="{!! route('Deletemessage') !!}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez l'id" name="id" id="delId" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <p>Voulez vous vriament supprimer <b id="delName"></b></p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" id="add">
                    <span class="fa fa-trash"></span> Delete
                </button>

                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class=""></span>Close
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script>
@endsection