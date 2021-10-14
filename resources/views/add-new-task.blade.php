<!DOCTYPE html>
<html>
<head>
    <title>Data Manager - Add New Spark Application</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

<div class="container mt-4">

  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Data Manager - Submit Spark Application to Spark Cluster
    </div>
    <div class="card-body">
      <form name="add-new-task" id="add-new-task" enctype="multipart/form-data" method="post" action="{{url('store-task')}}">
       @csrf

        <div class="form-group">
          <label for="app_name">Application Name</label>
          <input type="text" id="app_name" name="app_name" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="entry_class">Entry Class</label>
          <input type="text" name="entry_class" class="form-control" required=""></input>
        </div>

        <div class="form-group">
            <label for="master_url">Master URL</label>
            <input type="text" name="master_url" class="form-control" required=""></input>
        </div>

        <div class="form-group">
            <label for="core_count">No. of Cores</label>
            <input type="number" name="core_count" class="form-control" required=""></input>
        </div>

        <div class="form-group">
            <label for="app_file">Application File</label>
            <input id="app_file" type="file" name="app_file" class="form-control" required=""></input>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>    
</body>
</html>