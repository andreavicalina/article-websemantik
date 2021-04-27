<?php
    include "../connection.php";

    if (isset($_POST['btnupl'])) {
        $jdl = $_POST['judul'];
        $author = $_POST['penulis'];
        $gambar = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $tgl = $_POST['tanggal'];
        $link = $_POST['link'];
        $isi = $_POST['isi'];

        //Memasukkan gambar yang diupload ke folder pic
        move_uploaded_file($file_tmp, '../pic/'.$gambar);

        //Memasukkan data artikel ke db
        $insert = "INSERT INTO artikel (judul, id_author, gambar, tanggal, link, isi) VALUES ('$jdl', '$author', '$gambar', '$tgl', '$link', '$isi')";
        $query = mysqli_query ($connect, $insert);
?>          
        <!-- Menampilkan alert berhasil -->
        <script>
            alert("Article added!");
            window.location.href="upload.php"
        </script>
<?php
        //Jika tidak dapat mengakses db
        if (!$query) {
            echo "Something's Wrong<br>".$insert."<br>".mysqli_error($connect);
        }
    }