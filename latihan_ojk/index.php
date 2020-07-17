<?php
require_once "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
   
    
<div class="col-12 col-md-8 col-lg-10 bg-warning text-dark text-center" style="min-height: 650px">Guest Book<br>
    <form action="insertBuku.php" method="POST">
      <div class="form-group row">
        <label for="nama" class="col-sm-1 col-form-label">nama buku</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" placeholder="Nama" class="nama" name="nama">
        </div>
      </div>
 
      <div class="form-group row">
        <label for="email" class="col-sm-1 col-form-label">nama penerbit</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="alamat" placeholder="email" class="namaPenerbit" name="namaPenerbit">
        </div>
      </div>

      <div class="form-group row">
        <label for="password" class="col-sm-1 col-form-label">nama penulis</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="pesan" placeholder="password" class="penulis" name="penulis">
        </div>
      </div>

     <!-- <div class="form-group row">
        <label for="password" class="col-sm-1 col-form-label">nama penulis</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="pesan" placeholder="password" class="passwordUser" name="harga">
        </div>
      </div> -->

      <div class="form-group row">
        <label for="password" class="col-sm-1 col-form-label">tahun</label>
        <div class="col-sm-10">
        <input type="date" class="form-control" id="pesan" placeholder="y/m/d" class="penulis" name="tahun">
        </div>
      </div>

      <button  type="submit" class="btn btn-primary col-12 col-md-8 col-lg-10" style="width: 350px">send</button>
    </form><hr><br>
    <div>
     <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" 
            placeholder="search" name="q">
          <button class="btn btn-info my-2 my-sm-0" type="submit">search</button>
        </form> 
    </div><br>
  <!--   tabel data -->
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Nama buku</th>
          <th>nama penerbit</th>
          <th>nama penulis</th>
          <th>tahun terbit</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // jika $_GET['q'] ada isinya
        if (isset($_GET['q'])){
          // yang dijalankan jika ada isinya
          $q=$_GET['q'];
          $sql = "SELECT*FROM tb_buku where nama_buku like '%$q%'";
        }else{
          // jika $_GET ['q'] idak ada isisnya
          $sql = "SELECT*FROM tb_buku";
          # code...
        }
        $result = $conn->query($sql);

        if ($result->num_rows>0){
         // akan dijalankan jika recor ada
          // untuk update
          while ($row = $result->fetch_assoc()){ ?>
            <tr>
              <td><?=$row['id_buku']?></td>
              <td><?=$row['nama_buku']?></td>
              <td><?=$row['nama_penerbit']?></td>
              <td><?=$row['nama_penulis']?></td>
              <td><?=$row['tahun_terbit']?></td>
              <td>
                <a onclick="return confirm('anda yakin akan menghapus record ini?')" class="btn btn-danger"
                href="deleteBuku.php?id=<?=$row['id_buku']?>">
                  delete
                </a>
                 <a class="btn btn-primary" href="" onclick="showUpdateForm('<?=$row['id_buku']?>','<?=$row['nama_buku']?>','<?=$row['nama_penerbit']?>','<?=$row['nama_penulis']?>','<?=$row['tahun_terbit']?>')" data-toggle="modal" data-target="#exampleModal">
                  Update</a>
              </td>
            </tr>

          <?php
            }
          }else{
            // akan dijalankan jika record kosong
            echo "<tr><td colspan='3'>record masih kosong</td></tr>";
          }





          ?>

            <!-- echo "<br>";
            echo "<td>". $row['id_user']."</td>";
            echo "<td>".$row['nama_user']."</td>";
            echo "<td>".$row['email_user']."</td>";
            echo "</tr>";
           # code...
          }
        }else{
          // akan menjalankan jika tidak ada record
          echo "<tr><td colspan='3'>record masih kosong</td></tr>";
        }



        ?> -->
        
      </tbody>
    </table>
</div>
   
<!-- 
  <div class="col-12 col-md-8 border text-center bg-danger text-white">content</div>
  <div class="col-12 col-md-4 border text-center bg-success text-white">banner</div>
  <div class="col-12 border text-center bg-info text-white">footer</div> -->

</div>
<!-- Button trigger modal -->
 

<!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Update Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="updateBuku.php" method="POST">
      <div class="form-group row">
        <label for="nama" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-10">
        <!-- <input type="text" name="iduser"  id="modal-id-user" readonly="" > -->
          <input type="text" class="form-control" id="modal-id-buku" placeholder="Nama buku"  name="id" readonly>
        </div>
      </div>
 
      <div class="form-group row">
        <label for="email" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="modal-nama-buku" placeholder="nama" class="emailUser" name="nama">
        </div>
      </div>

      <div class="form-group row">
        <label for="password" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="modal-nama-penerbit" placeholder="penerbit" class="passwordUser" name="penerbit">
        </div>
      </div>
      <div class="form-group row">
        <label for="harga" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="modal-nama-penulis" placeholder="penulis" class="harga" name="penulis">
        </div>
      </div>
       <div class="form-group row">
        <label for="harga" class="col-sm-1 col-form-label"></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="modal-tahun-terbit" placeholder="tahun" class="harga" name="tahun">
        </div>
      </div>
 
      <button type="submit" class="btn btn-primary col-12 col-md-8 col-lg-10">send</button>
    </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
      // fungsi untuk menampilkan nilai pada formupdate
      function showUpdateForm(id,buku,penerbit,penulis,tahun){
        // document GetElementByid adalah cara pada js domuntuk mengambil elemen pada
        document.getElementById('modal-id-buku').value = id;
        document.getElementById('modal-nama-buku').value = buku;
        document.getElementById('modal-nama-penerbit').value = penerbit;
        document.getElementById('modal-nama-penulis').value = penulis;
        document.getElementById('modal-tahun-terbit').value = tahun;
      }
    </script>



  </body>
</html>