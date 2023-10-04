<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Form Edit Barang
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<button type="button" class="btn btn-sm btn-warning" onclick="location.href=('/barang/index')">
    <i class="fa fa-backward"></i> Kembali
</button>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<?= form_open_multipart('barang/updatedata') ?>
<?= session()->getFlashdata('error'); ?>
<?= session()->getFlashdata('sukses'); ?>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label">Kode Barang</label>
    <div class="col-sm-8">
        <input type="char" class="form-control" id="kodebarang" name="kodebarang" readonly value="<?= $kodebarang; ?>">
    </div>
</div>

<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label">Nama Barang</label>
    <div class="col-sm-8">
        <input type="varchar" class="form-control" id="namabarang" name="namabarang" value="<?= $namabarang; ?>">
    </div>
</div>

<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label">Pilih Kategori</label>
    <div class="col-sm-4">
        <select name="kategori" id="kategori" class="form-control">
            <?php foreach ($datakategori as $kat) : ?>
                <?php if ($kat['katid'] == $kategori) : ?>
                    <option selected value="<?= $kat['katid'] ?>"><?= $kat['katnama'] ?></option>

                <?php else : ?>

                    <option value="<?= $kat['katid'] ?>"><?= $kat['katnama'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label">Pilih Status</label>
    <div class="col-sm-4">
        <select name="status" id="status" class="form-control">
            <option selected value="">=Pilih=</option>
            <option value="Masuk">Masuk</option>
            <option value="Keluar">Keluar</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label">Catatan</label>
    <div class="col-sm-8">
        <input type="varchar" class="form-control" id="catatan" name="catatan" value="<?= $catatan; ?>">
    </div>
</div>

<div class=" form-group row">
    <label for="" class="col-sm-4 col-form-label">Gambar yang sudah ada</label>
    <div class="col-sm-4">
        <img src="<?= base_url() . '/' . $gambar ?>" class="img-thumbnail" style="width: 50%;" alt="Gambar Barang">
    </div>
</div>

<div class=" form-group row">
    <label for="" class="col-sm-4 col-form-label">Upload Gambar (<i>Jika Diganti...</i>)</label>
    <div class="col-sm-4">
        <input type="file" id="gambar" name="gambar">
    </div>
</div>

<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-4">
        <input type="submit" value="Simpan" class="btn btn-success">
    </div>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi'); ?>