<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
<div class="card-body"> 
<div class="row">
<div class="col-md-12">
<form method="post">
<?php 
$id =$_GET ['id'];
if (isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $id_user = $_SESSION['user'] ['id_user'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];
    $query = mysqli_query($koneksi, "UPDATE ulasan SET id_buku='$id_buku',ulasan='$ulasan', rating='$rating' WHERE id_ulasan=$id"); 
    $data = mysqli_fetch_array($query);
    
    
    if ($query){
        echo '<script>alert("ubah Data Berhasil. ");location.href="?page=ulasan"; </script>';
        }else{
            echo '<script>alert("ubah Data Gagal."); </script>';
        }

        }
       $query = mysqli_query($koneksi, "SELECT*FROM ulasan WHERE id_ulasan=$id");
       $data = mysqli_fetch_array($query);
            ?>
        <div class="row mb-3">
        <div class="col-md-2">buku</div>
        <div class="col-md-8">
        <select name="id_buku" class="form-control">
        <?php
        $buk =mysqli_query($koneksi, "SELECT*FROM buku");
        while($buku =mysqli_fetch_array($buk)) {
            ?>
            <option <?php if ($data['id_buku']== $buku ['id_buku'] ) echo'selected';?> 
            value="<?php echo $buku['id_buku']; ?>"><?php echo $buku ['judul_buku']; ?></option>
            <?php
            }
            ?>
            

        
        <div class="row mb-3">
        <div class="col-md-2">Ulasan</div>
        <div class="col-md-8">
        <textarea name="ulasan" rows="5" class="form-control">
        <?php echo $data ['ulasan'];?></textarea>
        </div>
            </div>
            
        <div class="row mb-3">
        <div class="col-md-2">Rating</div>
        <div class="col-md-8">
        <select name="rating" class="form-control">
        
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        </select>
        </div>
        </div>
        <?php
        
        for ($i = 1; $i<=10; $i++){
            ?>
            <option <?php if ($data['rating'] == $i) echo 'selected'; ?>><php echo $i; ?></option>
            <?php
        }
        ?>
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <button type="submit" class="btn btn-primary" name=submit value="submit">Simpan</button>
        <button type="reset" class="btn btn-secondary" >Reset</button>
        <a href ="?page=ulasan" class="btn btn-danger">Kembali</a>
        </form>
        </div>
        </div>
        </form>
        </div>
        </div>
        </div>
