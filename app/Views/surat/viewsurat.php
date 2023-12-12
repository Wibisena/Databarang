<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Manajemen Data surat
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<button type="button" class="btn btn-sm btn-primary" onclick="location.href=('/surat/tambah')">
    <i class="fa fa-plus-circle"></i> Tambah surat
</button>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<?= session()->getFlashdata('error'); ?>
<?= session()->getFlashdata('sukses'); ?>
<table class="table table-striped table-bordered table-hover" style="width:100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Kode surat</th>
            <th>Nama surat</th>
            <th>Nama Penerima</th>
            <th>Status</th>
            <th>Catatan</th>
            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $nomor = 1;
        foreach ($tampildata->getResultArray() as $row) :
        ?>

            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $row['surat_kode']; ?></td>
                <td><?= $row['surat_nama']; ?></td>
                <td><?= $row['id_penerima']; ?></td>
                <td><?= $row['surat_status']; ?></td>
                <td><?= $row['surat_catatan']; ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-info" onclick="edit('<?= $row['surat_kode'] ?>')">
                        <i class="fa fa-edit"></i>
                    </button>

                    <form method="POST" action="/surat/hapus/<?= $row['surat_kode'] ?>" style="display:inline;" onsubmit="return hapus();">
                        <input type="hidden" value="DELETE" name="_method">

                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    </form>

                </td>
            </tr>

        <?php endforeach;  ?>
    </tbody>
</table>

<script>
    function edit(kode) {
        window.location.href = ('/surat/edit/' + kode);
    }

    function hapus(kode) {
        pesan = confirm('Yakin data surat ini dihapus ?');
        if (pesan) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?= $this->endSection('isi') ?>