<table class="table table-bordered table-striped">
    <tbody>
        <tr>
            <th style="width: 30%">Kode Tamu</th>
            <td><strong>{{ $kunjungan->kode_tamu }}</strong></td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ \Carbon\Carbon::parse($kunjungan->tanggal)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th style="width: 30%">Nama Tamu</th>
            <td>{{ $kunjungan->nama }}</td>
        </tr>
        <tr>
            <th>Email/No.Telp</th>
            <td>{{ $kunjungan->kontak }}</td>
        </tr>
        <tr>
            <th>Instansi</th>
            <td>{{ $kunjungan->instansi }}</td>
        </tr>
        <tr>
            <th>Keperluan</th>
            <td>{{ $kunjungan->keperluan }}</td>
        </tr>
        <tr>
            <th>Terakhir Diperbarui</th>
            <td>{{ $kunjungan->updated_at->timezone('Asia/Jakarta')->translatedFormat('d F Y, H:i') }} WIB</td>
        </tr>
    </tbody>
</table>