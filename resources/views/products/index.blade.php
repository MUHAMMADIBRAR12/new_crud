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
    <div class="container mt-3">
        <div class="text-right">
            <a href="{{url('products/create')  }}" class="btn btn-dark">New Products</a>
        </div>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        <img src="{{ asset('public/products/' . $product->image) }}" class="rounded-circle" width="50px" height="50px"/>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}" role="button">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" role="button">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
