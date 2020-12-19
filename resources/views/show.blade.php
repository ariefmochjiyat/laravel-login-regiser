@extends('layouts.adminlte')
@section('content')

<section class="content-header">
  <div class="container-fluid">



    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Show Your Project</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
  
            @foreach($datacruds as $c)
            <div class="form-group">
              <label for="#">Project Name</label>
              <p>{{ $c->name }}</p>
            </div>
            <div class="form-group">
              <label for="#">Project Description</label>
              <p>{{ $c->content }}</p>
            </div>

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