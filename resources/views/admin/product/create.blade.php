@extends('admin.layout.layout')

@section('contents')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create New Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('product.index') }}">Products</a></li>
            <li class="breadcrumb-item active">Create New Product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <form action="{{ Route('product.store') }}" class="row" method="post" 
                        enctype="multipart/form-data">
      @csrf
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Product Information</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input id="name" class="form-control" name="name"/>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input id="price" class="form-control" name="price"/>
            </div>
            <div class="form-group">
              <label for="photo">Image</label>
              <input type="file" id="photo" class="form-control" name="photo"/>
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select id="category" class="form-control custom-select" name="category_id">
                <option selected disabled>Select one</option>
                @foreach($cates as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-12">
        <input type="submit" value="Create" class="btn btn-success float-right">
      </div>
    </form>
  </section>
  <!-- /.content -->
</div>

@endsection