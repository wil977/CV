@extends('layouts.menuadmin')
@section('9')
active
@endsection
@section('home')
<script type="text/javascript">
    // modal show
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#shId').text($(this).data('id'));
        $('#shTasse').text($(this).data('tasse'));
        $('#shProjet').text($(this).data('projet'));
        $('#shClient').text($(this).data('client'));
        $('.modal-title').text('Show Statistique');
    });

    // modal save
    $(document).on('click', '.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Statistique');
    });

    // modal edit
    $(document).on('click', '.edit-modal', function() {
        $('#modify').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Edit Statistique');
        $('#edId').val($(this).data('id'));
        $('#edTasse').val($(this).data('tasse'));
        $('#edProjet').val($(this).data('projet'));
        $('#edClient').val($(this).data('client'));
    });

    // modal delete
    $(document).on('click', '.delete-modal', function() {
        $('#delete').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Delete Statistique');
        $('#delId').val($(this).data('id'));
    });
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="test">Statistique</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Statistique</li>
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
                        <h3 class="card-title">Liste des données de la section Statistique</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table table-dark table-striped table-bordered table-hover table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre de tasse de thé</th>
                                    <th>Nombre de projet réaliser</th>
                                    <th>Nombre de client satisfait</th>
                                    <th><a href="#" id="create-modal" class="create-modal btn btn-success"><i class="fa fa-plus"></i></a></th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                {{csrf_field()}}
                                @if (count($stats)>0)
                                @foreach ($stats as $stat => $p)
                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->tasse}}</td>
                                    <td>{{$p->projet}}</td>
                                    <td>{{$p->client}}</td>
                                    <td>
                                        <a href="#" style="margin-bottom:5px;" class="show-modal btn btn-info" data-id='{{$p->id}}' data-tasse='{{$p->tasse}}' data-projet='{{$p->projet}}' data-client='{{$p->client}}'><i class="fa fa-eye"></i></a>
                                        <a href="#" style="margin-bottom:5px;" class="edit-modal btn btn-warning" data-id='{{$p->id}}' data-tasse='{{$p->tasse}}' data-projet='{{$p->projet}}' data-client='{{$p->client}}'><i class="fa fa-pen"></i></a>
                                        <a href="#" class="delete-modal btn btn-danger" data-id={{$p->id}}><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
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
                <form class="form-horizontal" role="form" action="{!! route('Savestat') !!}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="number" class="form-control" placeholder="Entrez le nombre de tasse de thé" name="tasse" id="tasse" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="number" class="form-control" placeholder="Entrez le projet réaliser" name="projet" id="projet" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="number" class="form-control" placeholder="Entrez le nombre de client satisfait" name="client" id="client" />
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
                @if (count($stats)>0)
                <p><b>Id : </b>
                <p id="shId"></p>
                </p>
                <p><b>Nombre de tasse de thé : </b>
                <p id="shTasse"></p>
                </p>
                <p><b>Nombre de projet réaliser : </b>
                <p id="shProjet"></p>
                </p>
                <p><b>Client : </b>
                <p id="shClient"></p>
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
                <form class="form-horizontal" role="form" action="{!! route('Editstat') !!}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="number" class="form-control" placeholder="Entrez l'id" name="id" id="edId" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="number" class="form-control" placeholder="Entrez le nombre de tasse de thé" name="tasse" id="edTasse" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="number" class="form-control" placeholder="Entrez le projet réaliser" name="projet" id="edProjet" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="number" class="form-control" placeholder="Entrez le nombre de client satisfait" name="client" id="edClient" />
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
                <form class="form-horizontal" role="form" action="{!! route('Deletestat') !!}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez l'id" name="id" id="delId" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <p>Voulez vous vriament supprimer cet stat</p>
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