@extends('layouts.adminlte')


@section('content')

<section class="content-header">
  <div class="container-fluid">
   

 <!-- Main content -->

  <div class="row">
    <div class="col-md-12">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Create Your Project</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

        <form action="/datacrud/store" method="post">
        {{ csrf_field() }}

          <div class="form-group">
            <label for="inputName">Project Name</label>
            <input type="text" id="name" name="name" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label for="inputDescription">Project Description</label>
            <textarea id="content" name="content" class="form-control" rows="4" required="required"></textarea>
          </div>

          <div class="row">
            <div class="col-12">
              <input type="submit" value="Create new Project" class="btn btn-info float-right">
            </div>
          </div>

        </form>
       
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
  <div class="card">

    <div class="card-header">
      <h3 class="card-title">CRUD Table</h3>
      <div class="card-tools">
        <form action="/datacrud/search" method="GET">
          {{ csrf_field() }}
        <div class="input-group input-group-sm" style="width: 150px;">
          <input value="{{ old('search') }}" type="text" name="search" class="form-control float-right" placeholder="Search">
          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">No</th>
            <th>Project Name</th>
            <th style="width: 150px">Action</th>
          </tr>
        </thead>

        <tbody>
         
          @foreach($datacruds as $no => $c)
          <tr>
            <td>{{ ++$no + ($datacruds->currentPage()-1) * $datacruds->perPage() }}</td>
            <td>{{ $c->name}}</td>
            <td>
                <span type="button" class="badge bg-info"><a href="/datacrud/show/{{$c->id}}">Show</a></span>
                <span type="button" class="badge bg-danger" data-toggle="modal" data-target="#modal-sm{{ $c->id }}">
                  Delete
                </span>
                <span type="button" class="badge bg-warning"><a href="/datacrud/edit/{{$c->id}}">Edit</a></span>
            </td>
          </tr>

          <div class="modal fade" id="modal-sm{{ $c->id }}">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Confirm</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure? <br> Delete this {{ $c->name}}</p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger"><a style="color: white" href="/datacrud/destroy/{{ $c->id }}">Delete</a></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.modal -->

          @endforeach
        </tbody>
        
      </table>

    </div>
    <!-- /.card-body -->

    <div class="card-footer clearfix">
      {{ $datacruds->links() }}
    </div>

        </div>
      </div>
    </div>

  </div>
</section>

@endsection