@csrf
<div class="row mb-3">
    <div class="col-md-6">
        <x-form-input label="Kode Tamu" name="kode_tamu" :value="$kunjungan->kode_tamu ?? 'Auto Generate'" readonly />
    </div>
    <div class="col-md-6">
        <x-form-input type="date" label="Tanggal" name="tanggal" :value="date('Y-m-d')" />
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <x-form-input label="Nama Tamu" name="nama" :value="$kunjungan->nama" />
    </div>

    <div class="col-md-6">
        <x-form-input label="Email/No.Telp" name="kontak" :value="$kunjungan->kontak" placeholder="Masukkan email atau nomor telepon" />
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
    <x-form-input label="Instansi" name="instansi" :value="$kunjungan->instansi" />
</div>

    <div class="col-md-6">
        <x-form-input label="Keperluan" name="keperluan" :value="$kunjungan->keperluan" />
    </div>
</div>


<div class="mt-4">
    <x-primary-button1 type="submit">
        {{ isset($update) ? __('Update') : __('Simpan') }}
    </x-primary-button1>
    <x-tombol-kembali :href="route('kunjungan.index')" />
</div>