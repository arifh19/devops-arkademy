var data = '{ "data" : [' +
    '{ "id_cashier":2, "product":"Latte" , "id_category":1, "price":"Rp. 10.000"  },' +
    '{ "id_cashier":1 , "product":"Cake" , "id_category":2, "price":"Rp. 15.000" },' +
    '{ "id_cashier":1, "product":"Fried Rice" , "id_category":1, "price":"Rp. 30.000" },' +
    '{ "id_cashier":2 , "product":"Gudeg" , "id_category":2, "price":"Rp. 35.000" },' +
    '{ "id_cashier":3 , "product":"Ice Tea" , "id_category":1, "price":"Rp. 55.000" },' +
    '{ "id_cashier":4 , "product":"Fried Chicken" , "id_category":2, "price":"Rp. 15.000" } ]}';
var obj = JSON.parse(data);

function add() {
    $('#addModal').modal('show');

}

function edit(id) {
    var no = id - 1;
    $("#id_cashier").val(obj.data[no].id_cashier)
    $("#id_category").val(obj.data[no].id_category)
    $("#product").val(obj.data[no].product)
    $("#price").val(obj.data[no].price)
    $('#editModal').modal('show');

}

function hapus(nama, id) {
    swal("Data " + nama + " ID #" + id, "Berhasil dihapus", "success");
}