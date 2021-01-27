@extends('layouts.menuadmin')
@section('3')
active
@endsection
@section('home')
<script type="text/javascript">
    // modal show
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#shId').text($(this).data('id'));
        $('#shName').text($(this).data('name'));
        $('#shColors').text($(this).data('colors'));
        $('#shWidth').text($(this).data('width'));
        $('.modal-title').text('Show Compétences');
    });

    // modal save
    $(document).on('click', '.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Compétences');
    });

    // modal edit
    $(document).on('click', '.edit-modal', function() {
        $('#modify').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Edit Compétences');
        $('#edId').val($(this).data('id'));
        $('#edName').val($(this).data('name'));
        $('#edColors').val($(this).data('colors'));
        $('#edWidth').val($(this).data('width'));
        $('#edCouleur').val($(this).data('couleur'));
    });

    // modal delete
    $(document).on('click', '.delete-modal', function() {
        $('#delete').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Delete Compétences');
        $('#delId').val($(this).data('id'));
        $('#delTitre').text($(this).data('titre'));
    });
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="test">COMPÉTENCES</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Competences</li>
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
                        <h3 class="card-title">Liste des données de la section competence</h3>
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
                                        <th>Nom</th>
                                        <th>Couleur</th>
                                        <th>Pourcentage de compétence</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    {{csrf_field()}}
                                    @if (count($comps)>0)
                                    @foreach ($comps as $cmp => $p)
                                    <tr>
                                        <td>
                                            <a href="#" style="margin-bottom:5px;" class="show-modal btn btn-info" data-id={{$p->id}} data-name='{{$p->name}}' data-colors='{{$p->colors}}' data-width='{{$p->width}}'><i class="fa fa-eye"></i></a>
                                            <a href="#" style="margin-bottom:5px;" class="edit-modal btn btn-warning" data-id={{$p->id}} data-name='{{$p->name}}' data-colors='{{$p->colors}}' data-width='{{$p->width}}'><i class="fa fa-pen"></i></a>
                                            <a href="#" class="delete-modal btn btn-danger" data-id={{$p->id}} data-name='{{$p->name}}' data-colors='{{$p->colors}}' data-width='{{$p->width}}'><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td>{{$p->id}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->colors}}</td>
                                        <td>{{$p->width}}</td>

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
                <form class="form-horizontal" role="form" action="{{route('Savecompetence')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le nom (string)" name="name" id="name" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="number" class="form-control" placeholder="Entrez le numéro de couleur (entier)" name="colors" id="colors" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="number" class="form-control" placeholder="Entrez le Pourcentage de la compétence (entier)" name="width" id="width" />
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
                @if (count($comps)>0)
                <p><b>Id : </b>
                <p id="shId"></p>
                </p>
                <p><b>Nom : </b>
                <p id="shName"></p>
                </p>
                <p><b>Numéro de couleur : </b>
                <p id="shColors"></p>
                </p>
                <p><b>Pourcentage de la compétence : </b>
                <p id="shWidth"></p>
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
                <form class="form-horizontal" role="form" action="{{route('Editcompetence')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="hidden" class="form-control" placeholder="Entrez l'id" name="id" id="edId" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le nom" name="name" id="edName" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le numéro de couleur" name="colors" id="edColors" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le Pourcentage de la compétence" name="width" id="edWidth" />
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
                <form class="form-horizontal" role="form" action="{{route('Deletecompetence')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="hidden" class="form-control" placeholder="Entrez l'id" name="id" id="delId" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <p>Voulez vous vriament supprimer cette compétence ?<b id="delName"></b></p>
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