<?php

$con->auth();
$conn=$con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $sql="select * from tb_buku";
        $spesialis=$conn->query($sql);
        $content="views/buku/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['judul'])){
                $err['judul']="Nama Dokter Wajib";
            }
            if(empty($_POST['penulis'])){
                $err['penulis']="Pendidikan Wajib Terisi";
            }
            if(empty($_POST['penerbit'])){
                $err['penerbit']="No IDI Wajib Angka";
            }
            if(empty($_POST['tgl'])){
                $err['tgl']="Pendidikan Wajib Terisi";
            }
            
            //validasi FILE UPLOAD
            if(!empty($_FILES['fileToUpload']["name"])){
                $target_dir = "../media/uploads/";
                $file=basename($_FILES["fileToUpload"]["name"]);
                $target_file = $target_dir . $file ;
                $uploadOk = 1;
                $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        $err["fileToUpload"]= "File is an ebook - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        $err["fileToUpload"]= "File is not an ebook.";
                        $uploadOk = 0;
                    }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                $err["fileToUpload"]= "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
                $err["fileToUpload"]= "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($FileType != "doc" && $FileType != "docx" && $FileType != "pdf" ) {
                $err["fileToUpload"]= "Sorry, only DOC, DOCX, & PDF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 1) {
               
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $_POST['filebuku']=$file;
                    if(isset($_POST['file_old']) && $_POST['file_old'] !=''){
                        unlink($target_dir.$_POST['file_old']);
                    }
                 } else {
                    $err["fileToUpload"]= "Sorry, there was an error uploading your file.";
                }
            }
        }

            if(!isset($err)){
                $id_pegawai=$_SESSION['login']['id'];
                if(!empty($_POST['id_buku'])){
                    //update
                    $sql="update tb_buku set judul='$_POST[judul]',penulis='$_POST[penulis]',penerbit='$_POST[penerbit]', tgl='$_POST[tgl]',filebuku='$_POST[filebuku]'
                    where id_buku='$_POST[id_buku]'";
                }else{
                   //save
                   $sql = "INSERT INTO tb_buku (judul,penulis,penerbit,tgl,filebuku ) 
                   VALUES ('$_POST[judul]','$_POST[penulis]','$_POST[penerbit]','$_POST[tgl]','$_POST[filebuku]')";
                }
                    if ($conn->query($sql) === TRUE) {
                        header('Location: '.$con->site_url().'/admin/index.php?mode=buku');
                    } else {
                        $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
                    }
            }
        }else{
            $err['msg']="tidak diijinkan";
        }
        if(isset($err)){
            $content="views/buku/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $buku ="select * from tb_buku where id_buku='$_GET[id]'";
        $buku=$conn->query($buku);
        $_POST=$buku->fetch_assoc();
        $_POST['penerbit']=$_POST['penerbit'];
        $_POST['id_buku']=$_POST['id_buku'];
        //var_dump($buku);
        $content="views/buku/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete';
        $buku ="delete from tb_buku where id_buku='$_GET[id]'";
        $buku=$conn->query($buku);
        header('Location: '.$con->site_url().'/admin/index.php?mode=buku');
    break;
    case 'baca';
        $buku ="select * from tb_buku where id_buku='$_GET[id]'";
        $buku=$conn->query($buku);
        $_POST=$buku->fetch_assoc();
        $_POST['filebuku']=$_POST['filebuku'];
        
        $content="views/buku/baca.php";
        include_once 'views/template.php';     
      

    break;

    


    default:
    $sql="select * from tb_buku";
    $dokter=$conn->query($sql);
    $conn->close();
    $content="views/buku/tampil.php";
    include_once 'views/template.php';
}
?>