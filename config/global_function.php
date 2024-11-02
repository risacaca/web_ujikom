<?php
require_once('connection.php');
// Login
function login($username, $password){
    global $conn; 
		$uname = $username;
		$upass = $password;		
		$sql = mysqli_query($conn,"SELECT * FROM user WHERE username='$uname' AND password=md5('$upass')");
		$cek = mysqli_num_rows($sql);
		if($cek > 0 ){
            $query = mysqli_fetch_array($sql);
            $_SESSION['status'] = "login";
            $_SESSION['id_user'] = $query['id'];
            $_SESSION['username'] = $query['username'];
            $_SESSION['nama'] = $query['nama'];
            $_SESSION['no_identitas'] = $query['no_identitas'];
            $_SESSION['role'] = $query['role'];
			return true;		
        }
		else {
			return false;
		}
}
// Get All Data from table
function getData($table_name)
{
    global $conn;
    $sql = mysqli_query($conn, "SELECT * FROM $table_name");
    $rows = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $rows[] = $row;
    }
    return $rows;
}

function getUser()
{
    global $conn;
    $sql = mysqli_query($conn, "SELECT * FROM user where role = 'User'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $rows[] = $row;
    }
    return $rows;
}

function getAutoComplete($table_name, $keyword)
{
    global $conn;
    $searchTerm = $_GET['term'];
    $sql="SELECT * FROM $table_name WHERE $keyword LIKE '%".$searchTerm."%' ORDER BY $keyword ASC";
    $hasil=mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($hasil)) {
    $data[] = $row['no_identitas'];
    }
    echo json_encode($data);
}

// Get Count Record from table
function getCount($table_name)
{
    global $conn;
    $sql = "Select * from $table_name ORDER BY id DESC";
    if ($result = mysqli_query($conn, $sql)) {
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}

function getCountmember($table_name)
{
    global $conn;
    $sql = "Select * from $table_name WHERE role='user'";
    if ($result = mysqli_query($conn, $sql)) {
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}

function getCountByStatus($status, $no_id)
{
    global $conn;
    $sql = "Select * from peminjaman where status = '$status' AND no_identitas = '$no_id' ORDER BY id DESC";
    if ($result = mysqli_query($conn, $sql)) {
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}

function getPinjaman()
{
    global $conn;
    $sql = mysqli_query($conn, "SELECT peminjaman.id, peminjaman.tgl_pinjam, peminjaman.tgl_kembali,peminjaman.tgl_skembali, peminjaman.no_identitas, user.nama, user.jabatan, peminjaman.kode_brg, barang.nama_brg, peminjaman.jumlah, peminjaman.keperluan, peminjaman.status FROM ((peminjaman INNER JOIN user on peminjaman.no_identitas = user.no_identitas)INNER JOIN barang on peminjaman.kode_brg = barang.kode_brg) ORDER BY ID DESC;");
    $rows = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $rows[] = $row;
    }
    return $rows;
}

function getTopPinjam() {
    global $conn;
    $sql2= mysqli_query($conn,"SELECT peminjaman.kode_brg, barang.nama_brg, COUNT(peminjaman.kode_brg) as Jumlah FROM barang INNER JOIN peminjaman ON barang.kode_brg = peminjaman.kode_brg GROUP BY barang.kode_brg, barang.nama_brg;");
    $rows = [];
    while ($row = mysqli_fetch_assoc($sql2)) {
        $rows[] = $row;
    }
    return $rows;
}

function getTodayPeminjaman(){
    global $conn;

    $sql = mysqli_query($conn,"SELECT peminjaman.id, peminjaman.tgl_pinjam, (SELECT CAST(peminjaman.tgl_pinjam AS TIME)) As Jam, peminjaman.tgl_kembali, peminjaman.no_identitas, user.nama, user.jabatan, peminjaman.kode_brg, barang.nama_brg, peminjaman.jumlah, peminjaman.keperluan, peminjaman.status FROM ((peminjaman INNER JOIN user on peminjaman.no_identitas = user.no_identitas)INNER JOIN barang on peminjaman.kode_brg = barang.kode_brg) WHERE (SELECT CAST(peminjaman.tgl_pinjam AS DATE))=CURRENT_DATE();");
    $rows = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $rows[] = $row;
    }
    return $rows;
}
// User Akses
function getPinjmanUser($nama_user){
    global $conn;
    $sql = mysqli_query($conn, "SELECT peminjaman.id, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.no_identitas, user.nama, user.jabatan, peminjaman.kode_brg, barang.nama_brg, peminjaman.jumlah, peminjaman.keperluan, peminjaman.status FROM ((peminjaman INNER JOIN user on peminjaman.no_identitas = user.no_identitas)INNER JOIN barang on peminjaman.kode_brg = barang.kode_brg) WHERE user.nama = '$nama_user';");
    $rows = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $rows[] = $row;
    }
    return $rows;
}

function getCountStatus($table_name, $status)
{
    global $conn;
    $sql = "Select * from $table_name where status = '$status'";
    if ($result = mysqli_query($conn, $sql)) {
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}

function validatePass($username,$oldPass)
{
    global $conn;
    $sql = "SELECT * FROM user WHERE username='$username' AND password=md5('$oldPass')";
    if ($result = mysqli_query($conn, $sql)) {
        $rowcount = mysqli_fetch_array($result);
        return $rowcount;
    }
}

// Insert data
if (isset($_GET['action']) && $_GET['action'] == 'insert') {
    
    /* Table Barang */
    if ($_GET['table'] == 'barang') {

        // Post Values
        $kodeBarang = $_POST['kodeBarang'];
        $namaBarang = $_POST['namaBarang'];
        $kategori = $_POST['kategori'];
        $merk = $_POST['merk'];
        $jumlah = $_POST['jumlah'];

        // Query
        $sql = "INSERT INTO `barang` (`kode_brg`, `nama_brg`, `kategori`, `merk`, `jumlah`) VALUES ('$kodeBarang', '$namaBarang', '$kategori', '$merk', '$jumlah')";
        mysqli_query($conn, $sql);
        if ($sql) {

            // Redirect with clearing form values
            $_POST['kodeBarang'] = '';
            $_POST['namaBarang'] = '';
            $_POST['kategori'] = '';
            $_POST['merk'] = '';
            $_POST['jumlah'] = '';

            header("location:../admin/barang");
        }
    }

    if ($_GET['table'] == 'user') {

        // Post Values
        $NoIdentitas = $_POST['NoIdentitas'];
        $namaMember = $_POST['namaMember'];
        $status = $_POST['status'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $kontak = $_POST['kontak'];

        // Query
        $sql = "INSERT INTO `user` (`no_identitas`, `nama`, `jabatan`, `username`, `password`, `role`,`kontak`) VALUES ('$NoIdentitas', '$namaMember', '$status', '$username', md5('$password'), '$role', '$kontak')";
        mysqli_query($conn, $sql);
        if ($sql) {

            // Redirect with clearing form values
            $_POST['NoIdentitas'] = '';
            $_POST['namaMember'] = '';
            $_POST['status'] = '';
            $_POST['username'] = '';
            $_POST['password'] = '';
            $_POST['role'] = '';
            $_POST['kontak'] = '';

            header("location:../admin/users");
        }
    }
    
    if ($_GET['table'] == 'peminjaman') {

        // Post Values
        $NoIdentitas = $_POST['no_identitas'];
        $kodeBarang = $_POST['kodeBarang'];
        $jumlah = $_POST['jumlah'];
        $keperluan = $_POST['keperluan'];
        $tgl = date('Y-m-d H:i:s');
        $tglskembali = $_POST['tgl_skembali'];
        $keperluan = $_POST['keperluan'];
        $status = 'Belum Kembali';
        $id_login = '1';

        //cek data user
        $cekUser = "SELECT * FROM `user` WHERE `no_identitas` = '$NoIdentitas'";
        // Cek apakah stok memadai
        $cekstock = "SELECT * FROM `barang` WHERE `kode_brg` = '$kodeBarang'";
        // Query
        $sql = "INSERT INTO `peminjaman` (tgl_pinjam,tgl_kembali, `no_identitas`,tgl_skembali, `kode_brg`, `jumlah`,`keperluan`,`status`,`id_login`) VALUES ('$tgl',NULL,'$NoIdentitas','$tglskembali', '$kodeBarang', '$jumlah', '$keperluan', '$status', '$id_login')";
  
        $cekUser = mysqli_query($conn, $cekUser);
        $avail= mysqli_fetch_array($cekUser);
        if ($avail['no_identitas'] != $NoIdentitas) {
            // var_dump($avail['no_identitas']);
            echo"<script>alert('Data user tidak ditemukan !');document.location='../admin/barang'</script>";
        }else{
            $result = mysqli_query($conn, $cekstock);
            $row = mysqli_fetch_array($result);
            if (($row['jumlah'] < $jumlah) || ($jumlah <= 0)) {
                echo"<script>alert('Jumlah barang tidak mencukupi !');document.location='../admin/barang'</script>";
            }else{
                 mysqli_query($conn, $sql);
                if ($sql) {
        
                    // Redirect with clearing form values
                    $_POST['no_identitas'] = '';
                    $_POST['KodeBarang'] = '';
                    $_POST['jumlah'] = '';
                    $_POST['keperluan'] = '';
                    $_POST['status'] = '';
                    $_POST['id_login'] = '';
        
                    header("location:../admin/barang");
                }
        
            }
        }
     }

} 

// Update data
if (isset($_GET['action']) && $_GET['action'] == 'update') {
    if ($_GET['table'] == 'barang') {

        $id = $_POST['id'];
        $kodeBarang = $_POST['kodeBarang'];
        $namaBarang = $_POST['namaBarang'];
        $kategori = $_POST['kategori'];
        $merk = $_POST['merk'];
        $jumlah = $_POST['jumlah'];
        $sql = "UPDATE `barang` SET `kode_brg` = '$kodeBarang', `nama_brg` = '$namaBarang', `kategori` = '$kategori', `merk` = '$merk', `jumlah` = '$jumlah' WHERE `id` = '$id'";
        mysqli_query($conn, $sql);

        if ($sql) {
            header("location:../admin/barang");
        }

    }

    if ($_GET['table'] == 'user') {
        $id = $_POST['id'];
        $noidentitas = $_POST['NoIdentitas'];
        $nama = $_POST['namaMember'];
        $status = $_POST['status'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $kontak = $_POST['kontak'];
        $sql = "UPDATE `user` SET `no_identitas` = '$noidentitas', `nama` = '$nama', `jabatan` = '$status', `username` = '$username', `password` = md5('$password'), `role` = '$role', `kontak` = '$kontak' WHERE `id` = '$id'";
        mysqli_query($conn, $sql);

        if ($sql) {
            header("location:../admin/users");
        }

    }

    if ($_GET['table'] == 'peminjaman') {
        $id = $_POST['id'];
        $sql = "UPDATE `peminjaman` SET `tgl_kembali` = now(), `status` = 'Kembali' WHERE `id` = '$id'";
        var_dump($sql);
        mysqli_query($conn, $sql);

        if ($sql) {
            header("location:../admin/peminjaman");
        }
    }
    
}

// Delete data
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    if ($_GET['table'] == 'barang') {      
        $id = $_POST['id'];
        $sql = "DELETE FROM `barang` WHERE `id` = '$id'";
        mysqli_query($conn, $sql);
        if ($sql) {
            header("location:../admin/barang.php");
        }

    }

    if ($_GET['table'] == 'user') {
        $id = $_POST['id'];
        $sql = "DELETE FROM `user` WHERE `id` = '$id'";
        mysqli_query($conn, $sql);
        if ($sql) {
            header("location:../admin/users");
        }

    }

    if ($_GET['table'] == 'peminjaman') {
        $id = $_POST['id'];
        $sql = "DELETE FROM `peminjaman` WHERE `id` = '$id'";
        mysqli_query($conn, $sql);
        if ($sql) {
            header("location:../admin/peminjaman");
        }

    }

}

