@extends('layouts.main')
@section('content')
    

  <body>
    <div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3>update Products</h3>
            <hr/>
        </div>
       
    </div>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <form  action="{{url('edit/'.$editData->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" name="pname"  class="form-control" id="exampleInputUsername" value="{{$editData->name}}">
            @error('pname')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Product Detail</label>
            <textarea name="pdetail" class="form-control"  required rows="5" >
                {{$editData->detail}}
            </textarea>
            @error('pdetail')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Product image</label> <br/>
            <input type="file" name="pimage" class="form-control"  >
            <img src="{{ URL::asset('storage/app/image/'.$editData->image)}}" height="100px"><br/>
            
            {{-- <input type="hidden" name="pimage" value="{{$editData->image}}"> --}}
        </div>
        @error('pimage')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="row mt-3">
             <div class="col-md-3 offset-md-10 ">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </div>
        
      </form>

     
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
  @endsection