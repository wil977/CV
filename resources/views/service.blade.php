@extends('layouts.menuadmin')
@section('2')
active
@endsection
@section('home')
<script type="text/javascript">
    // modal show
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#shId').text($(this).data('id'));
        $('#shTitre').text($(this).data('titre'));
        $('#shContenu').text($(this).data('contenu'));
        $('#shIcon').text($(this).data('icon'));
        $('#shCouleur').text($(this).data('couleur'));
        $('.modal-title').text('Show Services');
    });

    // modal save
    $(document).on('click', '.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Services');
    });

    // modal edit
    $(document).on('click', '.edit-modal', function() {
        $('#modify').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Edit Services');
        $('#edId').val($(this).data('id'));
        $('#edTitre').val($(this).data('titre'));
        $('#edContenu').val($(this).data('contenu'));
        $('#edIcon').val($(this).data('icon'));
        $('#edCouleur').val($(this).data('couleur'));
    });

    // modal delete
    $(document).on('click', '.delete-modal', function() {
        $('#delete').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Delete Services');
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
                    <h1 class="test">SERVICES</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Services</li>
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
                        <h3 class="card-title">Liste des données de la section service</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table table-dark table-striped table-bordered table-hover table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titre</th>
                                    <th>Contenu</th>
                                    <th>Icon</th>
                                    <th>Couleur</th>
                                    <th><a href="#" id="create-modal" class="create-modal btn btn-success"><i class="fa fa-plus"></i></a></th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                {{csrf_field()}}
                                @if (count($exps)>0)
                                @foreach ($exps as $exp => $p)
                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->titre}}</td>
                                    <td>{{$p->contenu}}</td>
                                    <td>{{$p->icon}}</td>
                                    <td>{{$p->couleur}}</td>
                                    <td>
                                        <a href="#" style="margin-bottom:5px;" class="show-modal btn btn-info" data-id='{{$p->id}}' data-titre='{{$p->titre}}' data-contenu='{{$p->contenu}}' data-icon='{{$p->icon}}' data-couleur='{{$p->couleur}}'><i
                                              class="fa fa-eye"></i></a>
                                        <a href="#" style="margin-bottom:5px;" class="edit-modal btn btn-warning" data-id='{{$p->id}}' data-titre='{{$p->titre}}' data-contenu='{{$p->contenu}}' data-icon='{{$p->icon}}'
                                          data-couleur='{{$p->couleur}}'><i class="fa fa-pen"></i></a>
                                        <a href="#" class="delete-modal btn btn-danger" data-id={{$p->id}} data-titre='{{$p->titre}}'><i class="fa fa-trash"></i></a>
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
                <form class="form-horizontal" role="form" action="{!! route('Saveservice') !!}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le titre" name="titre" id="titre" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <textarea type="text" rows="4" class="form-control" placeholder="Entrez le contenu" name="contenu" id="contenu"></textarea>
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez l'icon" name="icon" id="icon" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le numéro de la couleur (entier de 1 à 6)" name="couleur" id="couleur" />
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
                @if (count($exps)>0)
                <p><b>Id : </b>
                <p id="shId"></p>
                </p>
                <p><b>Titre : </b>
                <p id="shTitre"></p>
                </p>
                <p><b>Contenu : </b>
                <p id="shContenu"></p>
                </p>
                <p><b>Icon : </b>
                <p id="shIcon"></p>
                </p>
                <p><b>Couleur : </b>
                <p id="shCouleur"></p>
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
                <form class="form-horizontal" role="form" action="{!! route('Editservice') !!}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le titre" name="id" id="edId" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le titre" name="titre" id="edTitre" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <textarea type="text" rows="4" class="form-control" placeholder="Entrez le contenu" name="contenu" id="edContenu"></textarea>
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez l'icon" name="icon" id="edIcon" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez le numéro de la couleur (entier de 1 à 6)" name="couleur" id="edCouleur" />
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
                <form class="form-horizontal" role="form" action="{!! route('Deleteservice') !!}" method="post">
                    {{csrf_field()}}
                    <div class="form-group add">
                        <input type="text" class="form-control" placeholder="Entrez l'id" name="id" id="delId" />
                        <p class="error text-center hidden" style="color:red;"></p>
                    </div>
                    <p>Voulez vous vriament supprimer <b id="delTitre"></b></p>
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