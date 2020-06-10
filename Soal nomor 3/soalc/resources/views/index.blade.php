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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/favicon.ico">
    <title>Cashier Dashboard</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-light shadow-nav">
            <img class="navbar-brand inner col-md-1 col-3" src="/img/logo.png" alt="arkademy" height="70">
            <input class="form-control inner col-md-6 col-4 light-table-filter" type="search" placeholder="Search" aria-label="Search" data-table="order-table">
            <button class="btn add inner col-md-2 col-2" style="margin-left: 5em;" onclick="add()">ADD</button>
        </nav>
    </header>
    <main>
        <div class="content table-responsive">
            <table class="table borderless order-table">
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
                            <td>{{ $hasil_rupiah = "Rp " . number_format($product->price,2,',','.') }}
                            </td>
                            <td>
                                <a class="green" href="#" onclick="edit('{{ $x }}')">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="green"
                                    href="{{ route('product.destroy',$product->id) }}"
                                    data-token="{{ csrf_token() }}">
                                    <i class="fas fa-trash"></i>
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
                    <form action="{{ route('product.store') }}" method="POST">
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
                            <button type="submit" class="btn btn col-sm-2 add">ADD</button>
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
                    <form onsubmit="get_action(this);" method="POST">
                        @csrf
                        <div class="modal-body">
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
                                <input type="text" class="form-control" id="product" name="nama" placeholder="Ice Tea">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Rp. 10.000">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn col-sm-2 add">EDIT</button>
                        </div>
                    </form>
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
    <script src="/js/script.js"></script>


</body>

</html>