<div class="row">
    <div class="pull-left">
        <h4>Daftar Buku</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=buku&page=add">
            <button class="btn btn-primary">Tambah</button>
        </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>
                    no
                </td>
                <td>Judul Buku</td><td>Penulis</td><td>Penerbit</td><td>Tanggal</td><th>File</th>
            </tr>
        </thead>
        <tbody>
            <?php if($dokter != NULL){ 
                $no=1;
                foreach($dokter as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['judul']?></td><td><?=$row['penulis']?></td><td><?=$row['penerbit'];?></td><td><?=$row['tgl']?></td>
                        <td>
                        <?=$row['filebuku'];?>
                        <a href="index.php?mod=buku&page=baca&id=<?=$row['id_buku']?>"><i class="fa fa-book"></i> </a>
                        

                         </td>   
                              
                        <td>
                            <a href="index.php?mod=buku&page=edit&id=<?=$row['id_buku']?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=buku&page=delete&id=<?=$row['id_buku']?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>