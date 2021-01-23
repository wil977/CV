@extends('layouts.menuadmin')
@section('4')
active
@endsection
@section('home')
<script type="text/javascript">
    // modal show
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#shId').text($(this).data('id'));
        $('#shEntete').text($(this).data('entete'));
        $('#shContenu').text($(this).data('contenu'));
        $('#shColapse').text($(this).data('colapse'));
        $('#shHeading').text($(this).data('heading'));
        $('.modal-title').text('Show Education');
    });

    // modal save
    $(document).on('click', '.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Education');
    });

    // modal edit
    $(document).on('click', '.edit-modal', function() {
        $('#modify').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Edit Educations');
        $('#edId').val($(this).data('id'));
        $('#edEntete').val($(this).data('entete'));
        $('#edContenu').val($(this).data('contenu'));
        $('#edColapse').val($(this).data('colapse'));
        $('#edHeading').val($(this).data('heading'));
    });

    // modal delete
    $(document).on('click', '.delete-modal', function() {
        $('#delete').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Delete Education');
        $('#delId').val($(this).data('id'));
        $('#delEntete').text($(this).data('entete'));
    });
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="test">EDUCATIONS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Educations</li>
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
                        <h3 class="card-title">Liste des données de la section éducation</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <div class="table-responsive-md">
                            <table class="table table-dark table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><a href="#" id="create-modal" class="create-modal btn btn-success"><i class="fa fa-plus"></i></a></th>
                                        <th>Id</th>
                                        <th>Entête</th>
                                        <th>Contenu</th>
                                        <th>Colapse</th>
                                        <th>Heading</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    {{csrf_field()}}
                                    @if (count($edus)>0)

                                    @foreach ($edus as $edu => $p)
                                    <tr>
                                        <td>
                                            <a href="#" style="margin-bottom:5px;" class="show-modal btn btn-info" data-id='{{$p->id}}' data-entete='{{$p->entete}}' data-contenu='{{$p->contenu}}' data-colapse='{{$p->colapse}}'
                                              data-heading='{{$p->heading}}'><i class="fa fa-eye"></i></a>
                                            <a href="#" style="margin-bottom:5px;" class="edit-modal btn btn-warning" data-id='{{$p->id}}' data-entete='{{$p->entete}}' data-contenu='{{$p->contenu}}' data-colapse='{{$p->colapse}}'
                                              data-heading='{{$p->heading}}'><i class="fa fa-pen"></i></a>
                                            <a href="#" class="delete-modal btn btn-danger" data-id={{$p->id}} data-entete='{{$p->entete}}'><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td>{{$p->id}}</td>
                                        <td>{{$p->entete}}</td>
                                        <td>{{$p->contenu}}</td>
                                        <td>{{$p->colapse}}</td>
                                        <td>{{$p->heading}}</td>
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

<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" action="{!! route('Saveeducation') !!}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez l'entête" name="entete" id="entete" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <textarea type="text" rows="4" class="form-control" placeholder="Entrez le contenu" name="contenu" id="contenu"></textarea>
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le colapse" name="colapse" id="colapse" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le heading" name="heading" id="heading" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="add">
                    <span class="fa fa-plus"></span> Save
                </button>

                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class=""></span>Close
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="show" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if (count($edus)>0)
                <p><b>Id : </b>
                <p id="shId"></p>
                </p>
                <p><b>Entête : </b>
                <p id="shEntete"></p>
                </p>
                <p><b>Contenu : </b>
                <p id="shContenu"></p>
                </p>
                <p><b>Colapse : </b>
                <p id="shColapse"></p>
                </p>
                <p><b>Heading : </b>
                <p id="shHeading"></p>
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

<div id="modify" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" action="{!! route('Editeducation') !!}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le titre" name="id" id="edId" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez l'entête" name="entete" id="edEntete" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <textarea type="text" rows="4" class="form-control" placeholder="Entrez le contenu" name="contenu" id="edContenu"></textarea>
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le colapse" name="colapse" id="edColapse" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le heading" name="heading" id="edHeading" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="add">
                    <span class="fa fa-check"></span> Edit
                </button>

                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class=""></span>Close
                </button>
            </div>
            </form>
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
                <form class="form-horizontal" role="form" action="{!! route('Deleteeducation') !!}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez l'id" name="id" id="delId" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <p>Voulez vous vriament supprimer <b id="delEntete"></b></p>
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