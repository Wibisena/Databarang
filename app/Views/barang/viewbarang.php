<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Manajemen Data Barang
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<button type="button" class="btn btn-sm btn-primary" onclick="location.href=('/barang/tambah')">
    <i class="fa fa-plus-circle"></i> Tambah barang
</button>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<?= session()->getFlashdata('error'); ?>
<?= session()->getFlashdata('sukses'); ?>
<table class="table table-striped table-bordered table-hover" style="width:100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
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
                <td><?= $row['brgkode']; ?></td>
                <td><?= $row['brgnama']; ?></td>
                <td><?= $row['id_penerima']; ?></td>
                <td><?= $row['brgstatus']; ?></td>
                <td><?= $row['brgcatatan']; ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-info" onclick="edit('<?= $row['brgkode'] ?>')">
                        <i class="fa fa-edit"></i>
                    </button>

                </td>
            </tr>

        <?php endforeach;  ?>
    </tbody>
</table>

<script>
    function edit(kode) {
        window.location.href = ('/barang/edit/' + kode);
    }
</script>

<?= $this->endSection('isi') ?>