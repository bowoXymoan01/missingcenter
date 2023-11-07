<?php
error_reporting(0);
switch ($_GET['action']) {
    default:
?>
        <table class="table table-bordered table-striped">
            <thead>
                <th>No. Urut</th>
                <th>Kode</th>
                <th>Nama</th>
                <th><a href="index.php?page=kategori&action=add" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i>Add</a></th>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM kategori order by urut_kategori asc");
                ?>
                <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td><?= $data['urut_kategori']; ?></td>
                        <td><?= $data['kode_kategori']; ?></td>
                        <td><?= $data['nama_kategori']; ?></td>
                        <td>
                            <a href="index.php?page=kategori&action=edit&id=<?= $data['kode_kategori']; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <a href="index.php?page=kategori&action=hapus&id=<?= $data['kode_kategori']; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php
        break;
    case 'add':
    ?>
        <form action="index.php?page=kategori&action=save" method="post">
            <label for="urut_kategori">No. Urut:</label>
            <input type="number" name="urut_kategori" id="urut_kategori" class="form-control" required>
            <label for="kode_kategori">Kode:</label>
            <input type="text" name="kode_kategori" id="kode_kategori" class="form-control" required>
            <label for="nama_kategori">Nama:</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="index.php?page=kategori" class="btn btn-danger">KEMBALI</a>
        </form>
    <?php
        break;
    case 'save':
        if (isset($_POST['urut_kategori']) && isset($_POST['kode_kategori']) && isset($_POST['nama_kategori'])) {
            $urut_kategori = $_POST['urut_kategori'];
            $kode_kategori = $_POST['kode_kategori'];
            $nama_kategori = $_POST['nama_kategori'];

            $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kode_kategori = '" . $kode_kategori . "'");
            $data_kategori = mysqli_fetch_assoc($query_kategori);

            if ($data_kategori) {
                echo "<script>
                        alert('Gagal Menambah ! Kode Kategori Telah Digunakan.');
                        document.location='index.php?page=kategori&action=add';
                    </script>";
            } else {
                $query = mysqli_query($koneksi, "INSERT INTO kategori (urut_kategori, kode_kategori, nama_kategori) VALUES ('" . $urut_kategori . "', '" . $kode_kategori . "', '" . $nama_kategori . "')");

                if ($query) {
                    echo "<script>
                            document.location='index.php?page=kategori';
                        </script>";
                } else {
                    echo "<script>
                            alert('Gagal');
                            document.location = 'index.php?page=kategori&action=add';
                        </script>";
                }
            }
        }
        break;
    case 'edit':
        $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kode_kategori = '" . $_GET['id'] . "'");
        $data = mysqli_fetch_assoc($query);
    ?>
        <form action="index.php?page=kategori&action=update" method="post">
            <input type="hidden" name="id" value="<?= $data['kode_kategori']; ?>">
            <label for="urut_kategori">No. Urut:</label>
            <input type="number" name="urut_kategori" id="urut_kategori" class="form-control" required value="<?= $data['urut_kategori'] ?>">
            <label for="kode_kategori">Kode:</label>
            <input type="text" name="kode_kategori" id="kode_kategori" class="form-control" required value="<?= $data['kode_kategori'] ?>" disabled>
            <label for="nama_kategori">Nama:</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required value="<?= $data['nama_kategori'] ?>">
            <br>
            <button type="submit" class="btn btn-primary">UPDATE</button>
            <a href="index.php?page=kategori" class="btn btn-danger">KEMBALI</a>
        </form>
<?php
        break;
    case 'update':
        if (isset($_POST['id'])) {
            $urut_kategori = $_POST['urut_kategori'];
            $nama_kategori = $_POST['nama_kategori'];
            $query = mysqli_query($koneksi, "UPDATE kategori SET urut_kategori = '" . $urut_kategori . "', nama_kategori = '" . $nama_kategori . "' WHERE kode_kategori = '" . $_POST['id'] . "'");

            if ($query) {
                echo "<script>
                        document.location='index.php?page=kategori';
                    </script>";
            } else {
                echo "<script>
                        alert('Gagal');
                        document.location = 'index.php?page=kategori&action=edit&id=" . $_POST['id'] . "';
                    </script>";
            }
        }
        break;
    case 'hapus':
        $query = mysqli_query($koneksi, "DELETE FROM kategori WHERE kode_kategori = '" . $_GET['id'] . "'");
        if ($query) {
            echo "<script>
                        document.location='index.php?page=kategori';
                    </script>";
        } else {
            echo "<script>
                        alert('Gagal');
                        document.location = 'index.php?page=kategori';
                    </script>";
        }
        break;
}
?>