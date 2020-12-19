@extends('layouts.adminlte')
@section('content')

<section class="content-header">
  <div class="container-fluid">



    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Edit Your Project</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
  
            @foreach($datacruds as $c)
            <form action="/datacrud/update" method="post">
              {{ csrf_field() }}
            <div class="form-group">
                <label for="inputName">Project Id</label>
                <input value="{{ $c->id }}" type="text" id="id" name="id" class="form-control" required="required">
            </div>
            <div class="form-group">
                <label for="inputName">Project Id</label>
                <input value="{{ $c->name }}" type="text" id="name" name="name" class="form-control" required="required">
            </div>
            <div class="form-group">
                <label for="inputDescription">Project Content</label>
                <textarea id="content" type="text" class="form-control" name="content">{{ $c->content }}</textarea>
              </div>
    
              <div class="row">
                <div class="col-12">
                  <input type="submit" value="Update" class="btn btn-info float-right">
                </div>
              </div>
            </form>

          @endforeach
          </div>
          <!-- /.card-body -->
          
        </div>
        <!-- /.card -->
      </div>
  
    </div>

    
  </div>
</section>
@endsection