<input type="hidden" name="id" id="id">
<div class="form-group">
    <label for="nama" class="bmd-label-floating">Nama Barang</label>
    <input type="text" name="nama" id="nama" required class="form-control">
</div>
<div class="form-group">
    <label for="jumlah" class="bmd-label-floating">Stok</label>
    <input type="number" min="0" name="jumlah" id="jumlah" required class="form-control">
</div>
<div class="form-group">
    <select name="jenis_gudang" id="jenis_gudang" required class="selectpicker" data-style="select-with-transition" data-size="7">
        <option value="choose" disabled selected>Pilih Gudang</option>
        <option value="gudang atk">Gudang ATK</option>
        <option value="gudang kimia">Gudang Kimia</option>
        <option value="gudang dokumen">Gudang Dokumen</option>
    </select>
</div>