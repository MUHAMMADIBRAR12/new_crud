<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse bg-dark">
        <ul class="nav navbar-nav">
          <li><a href="{{ url('products') }}">Products</a></li>
        </ul>
    </nav>
    @if ($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
       </div>
    @endif
<div class="container mt-5">
     <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <h3>Product edit #{{ $product->name }}</h3>
                <form method="POST" action="{{ route('products.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ old('name',$product->name) }}"
                     class="form-control"/>
                    @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" value=""
                     cols="30" rows="10">"{{ old('description',$product->description) }}"
                    </textarea>
                    @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                  @endif
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" value="{{ old('image') }}" class="form-control"/>
                    @if ($errors->has('image'))
                      <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-dark">Update</button>
             </form>
            </div>
        </div>
     </div>
</div>
</body>
</html>
