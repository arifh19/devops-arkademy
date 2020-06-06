<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <title>Cashier Dashboard</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-light shadow-nav">
            <img class="navbar-brand inner col-md-1 col-3" src="/img/logo.png" alt="arkademy" height="70">
            <input class="form-control inner col-md-6 col-4" type="search" placeholder="Search" aria-label="Search">
            <button class="btn add inner col-md-2 col-2" style="margin-left: 5em;" onclick="add()">ADD</button>
        </nav>
    </header>
    <main>
        <div class="content table-responsive">
            <table class="table borderless">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Cashier</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="tabel">
                    @foreach($products as $product)

                        <tr>
                            <th scope="row">{{ $x++ }}</th>
                            <td>{{ $product->cashier->nama }}</td>
                            <td>{{ $product->nama }}</td>
                            <td>{{ $product->category->nama }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a class="green" href="#" onclick="edit('{{$x}}')">
                                    <svg class="bi bi-pencil-square" width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a class="green" href="{{route('product.destroy',$product->id)}}">
                                    <svg class="bi bi-trash" width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('product.store')}}" method="POST">
                    <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <select class="custom-select" name="id_cashier">
                                    @foreach($cashiers as $cashier)
                                        <option value="{{ $cashier->id }}">{{ $cashier->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="id_category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ice Tea" name="nama">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Rp. 10.000" name="price">
                            </div>
                            
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn col-sm-2 add" >ADD</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <select class="custom-select" name="id_cashier" id="id_cashier">
                                    @foreach($cashiers as $cashier)
                                        <option value="{{ $cashier->id }}">{{ $cashier->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="id_category" id="id_category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="product" name="nama"
                                    placeholder="Ice Tea">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Rp. 10.000">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn col-sm-2 add" onclick="update()">EDIT</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

    <script src="/js/app.js"></script>
    

</body>

</html>