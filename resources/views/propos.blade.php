  @extends('layouts.menuadmin')
  @section('1')
  active
  @endsection
  @section('home')
  <script type="text/javascript">
      $(document).on('click', '.show-modal', function() {
          $('#show').modal('show');
          $('#Id').text($(this).data('id'));
          $('#Commentaire').text($(this).data('commentaire'));
          $('.modal-title').text('Show Propos');
      });

      $(document).on('click', '.create-modal', function() {
          $('#create').modal('show');
          $('.form-horizontal').show();
          $('.modal-title').text('Add Propos');
      });

      $(document).on('click', '.edit-modal', function() {
          $('#modify').modal('show');
          $('.form-horizontal').show();
          $('.modal-title').text('Edit Propos');
          $('#commentairemodif').val($(this).data('commentaire'));
          $('#idmodif').val($(this).data('id'));
      });

      $(document).on('click', '.delete-modal', function() {
          $('#delete').modal('show');
          $('.form-horizontal').show();
          $('.modal-title').text('Delete Propos');
          $('#iddelete').val($(this).data('id'));
      });
  </script>



  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="test">A PROPOS</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                          <li class="breadcrumb-item active">A propos</li>
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
                          <h3 class="card-title">Liste des données de la section à propos</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <input class="form-control" id="myInput" type="text" placeholder="Search..">
                          <br>
                          <table class="table table-dark table-striped table-bordered table-hover table-responsive-md">
                              <thead>
                                  <tr>
                                      <th>Id</th>
                                      <th>Commentaire</th>
                                      <th><a href="#" id="create-modal" class="create-modal btn btn-success"><i class="fa fa-plus"></i></a></th>
                                  </tr>
                              </thead>
                              <tbody id="myTable">
                                  {{csrf_field()}}
                                  @if (count($propos)>0)

                                  @foreach ($propos as $pro => $p)
                                  <tr>
                                      <td>{{$p->id}}</td>
                                      <td class="text-justify">{{$p->commentaire}}</td>
                                      <td>
                                          <a href="#" style="margin-bottom:5px;" class="show-modal btn btn-info" data-id={{$p->id}} data-commentaire='{{$p->commentaire}}'><i class="fa fa-eye"></i></a>
                                          <a href="#" style="margin-bottom:5px;" class="edit-modal btn btn-warning" data-id={{$p->id}} data-commentaire='{{$p->commentaire}}'><i class="fa fa-pen"></i></a>
                                          <a href="#" class="delete-modal btn btn-danger" data-id={{$p->id}} data-commentaire={{$p->commentaire}}><i class="fa fa-trash"></i></a>
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
                  <form class="form-horizontal" role="form" action="{{route('Savepropos')}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group row add">
                          <label for="commentaire" class="control-label col-sm-4">Commentaire:</label>
                          <div class="col-sm-8">
                              <textarea rows="6" class="form-control" name="commentaire" id="commentaire"></textarea>
                              <p class="error text-center hidden" style="color:red;"></p>
                          </div>
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

  <div id="modify" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title"></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <form class="form-horizontal" role="form" action="{{route('Editpropos')}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group row add">
                          {{-- <label for="commentaire" class="control-label col-sm-4">Id :</label> --}}
                          <div class="col-sm-8">
                              <input type="hidden" id="idmodif" name="idmodif" class="form-control" required>
                          </div>
                      </div>
                      <div class="form-group row add">
                          <label for="commentaire" class="control-label col-sm-4">Commentaire :</label>
                          <div class="col-sm-8">
                              <textarea rows="6" class="form-control" name="commentairemodif" id="commentairemodif" required></textarea>
                              <p class="error text-center hidden" style="color:red;"></p>
                          </div>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="add">
                      <span class="fa fa-check"></span> Modify
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
                  @if (count($propos)>0)
                  <p><b>Id</b> :
                  <p id="Id"></p>
                  </p>
                  <p><b>Commentaire</b> :
                  <p id="Commentaire"></p>
                  </p>
                  @endif
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">
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
                  <form class="form-horizontal" role="form" action="{{route('Deletepropos')}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group row add">
                          {{-- <label for="commentaire" class="control-label col-sm-4">Id :</label> --}}
                          <div class="col-sm-8">
                              <input type="hidden" id="iddelete" name="iddelete" class="form-control" required>
                          </div>
                      </div>
                      <p>Voulez-Vous vraiment supprimer ce propos ?</p>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-danger" id="add">
                      <span class="fa fa-check"></span> Delete
                  </button>

                  <button type="button" class="btn btn-warning" data-dismiss="modal">
                      <span class=""></span>Close
                  </button>
              </div>
              </form>
          </div>
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