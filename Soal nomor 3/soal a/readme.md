Tabel Cashiers
![2020-06-06_18-05-52](assets/2020-06-06_18-05-52.png)

Tabel Categories
![2020-06-06_18-06-30]((assets/2020-06-06_18-06-30.png)

Tabel Products
![2020-06-06_18-06-54](assets/2020-06-06_18-06-54.png)

Soal
![2020-06-06_18-04-04](assets/2020-06-06_18-04-04.png)

Hasil :
Query yang digunakan 
"SELECT T2.nama AS cashier, T1.nama AS product, T3.nama AS caetgory, price  FROM `products` T1 INNER JOIN cashiers T2 ON T1.id_cashier=T2.id INNER JOIN categories T3 ON T1.id_category=T3.id"

![2020-06-06_18-02-55](assets/2020-06-06_18-02-55.png)

Output dari Query :
![2020-06-06_18-05-19](assets/2020-06-06_18-05-19.png)
