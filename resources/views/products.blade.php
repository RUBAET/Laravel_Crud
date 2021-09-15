  @extends('layouts.main')
  @section('content')
      
  
  <body>
    <div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3>Products</h3>
            <hr/>
        </div>
       
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">Sl No</th>
            <th scope="col">Product Id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Detail</th>
            <th scope="col">Product Image</th>
            <th  scope="col">Edit</th>
            <th  scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
        @foreach($getData as $key=>$data)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$data->id}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->detail}}</td>
            <td><img src="storage/app/image/{{ $data->image }}" width="100px"></td>
            <td class='edit'><a href='{{url('edit/'.$data->id)}}'><i class='fas fa-edit'></i></a></td>
            <td class='delete'><a href='{{url('delete/'.$data->id)}}'><i class='fas fa-trash'></i></a></td>
          </tr>
         @endforeach 
        </tbody>
      </table>
      
      <div class="row">
        <div class="col-md-3 offset-md-5 mt-3">
        {{$getData->links()}}
        </div>
         <div class="col-md-3 offset-md-1 mt-3">
            <a href="{{url('add')}}" style="text-decoration: none;"><button type="submit" class="btn btn-primary">Add Product</button></a>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
  @endsection
