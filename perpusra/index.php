
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Rakyat</title>
    <meta name="descriptions" content="Perpustakaan Rakyat" />
    <meta name="keywords" content="Perpustakaan Rakyat" />
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <script src="jQuery.js"></script>
</head>

<body>
    <div class="wrap">
        <!-- Header-->
        <header>
            <div class="logo">
                <img src="assets/perpusra.png" width="250" >
            </div>
            <div class="judul">
             </div>
        </header>
        <!-- Header-->

        <!-- menu -->
        <nav class="menu">
            <ul>
                <li>
                    <a href="index.html">Beranda</a>
                </li>
                <li>
                    <a href="#">Sekilas</a>
                </li>
                <li>
                    <a href="#">Koleksi</a>
                </li>
                <li>
                    <a href="#">Pelayanan</a>
                </li>
                <li>
                    <a href="#">Kegiatan</a>
                </li>
                <li>
                    <a href="#">Komunitas</a>
                </li> 
                <li>
                    <a href="#">Login</a>
                </li> 
            </ul>
        </nav>
        <!-- menu -->
      
    <!-- main -->
    <div class="content">
            <div class="descriptions" align="center">
                <h2 style="margin: 0px;" >Selamat Datang di Perpustakaan Rakyat</h2>
                <h3 style="margin: 0px;"> Anda belum Login !</h3>
                
                <a href="http://localhost/perpusra/admin/">Silahkan Login !</a>
                <hr>
            </div>
            <div class="descriptions" align="center">
                <img src="assets/perpustaan.jpeg">
                <h1> Perpustakaan Rakyat </h1>
                <hr>
                <p>
                    Perpustakaan Rakyat (Perpusra) adalah sebuah perpustaakn online berbasis website yang dapat diakses oleh semua orang dari berbagai kalangan seperti siswa, mahasiswa, guru atau masyarakat umum secara GRATIS. Pembuatan Website ini bertujuan sebagai media pembelajaran untuk mewujudkan merdeka belajar dan untuk menyongsong sumberdaya manusia Indonesia yang berkwalitas</p>
            </div>
    </div>  
    
    <!-- akhir  -->
            <div class="footer" align="center">
                <h5>Copyleft 2020 @taufiqhidayat15</h5>
                
            </div>
    <!-- akhir  -->
    </div>

    <script>
$(document).ready (function(){
    
    $('.menu').click(function(){
	   $(this).css('color', 'blue');
	
	});
	$('h4').mouseenter(function(){
	   $(this).css('color', 'blue');
	
	});
	$('h4').mouseleave(function(){
	   $(this).css('color', 'black');
    });
});
    </script>
    
</body>

</html>
