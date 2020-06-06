var product;
var data;
var no;
var xhttp = new XMLHttpRequest();

    $.ajax({
        dataType: "json",
        url: 'http://localhost:8000/api/products',
        data: data,
        success: function(data){
            product = data;   
        }
    });
function getProduct(){
    $.ajax({
        dataType: "json",
        url: '/api/products',
        data: data,
        success: function(data){
            product = data;   
        }
    });
}
        
function add() {
    $('#addModal').modal('show');

}

function edit(id) {
    getProduct();
    no = id - 2;
    $("#id_cashier").val(product[no].id_cashier);
    $("#id_category").val(product[no].id_category);
    $("#product").val(product[no].nama);
    $("#price").val(product[no].price);
    $('#editModal').modal('show');

}

function update(){
    
    let id = product[no].id
    let cashier = product[no].id_cashier
    let category = product[no].id_category
    let nama = product[no].nama
    let price = product[no].price
       $.ajax({
        url:"/api/"+id,
        method:"PUT", //First change type to method here

        data:{
          id_cashier: cashier,
          id_category: category,
          nama: nama,
          price: price,
        },
        success:function(response) {

       },
        });
}

function hapus(nama, id) {
    swal("Data " + nama + " ID #" + id, "Berhasil dihapus", "success");
}