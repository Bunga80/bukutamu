<x-table-list>
    <x-slot name="header">
        <tr>
            <th style="width: 3%; text-align: center;">#</th>
            <th style="width: 10%; white-space: nowrap;">Kode Tamu</th>
            <th style="width: 10%; white-space: nowrap;">Tanggal</th>
            <th style="width: 13%;">Nama Tamu</th>
            <th style="width: 18%;">Email/No.Telp</th>
            <th style="width: 13%;">Instansi</th>
            <th style="width: 16%;">Keperluan</th>
            <th style="width: 6%; text-align: center;">Aksi</th>
        </tr>
    </x-slot>
    
    @forelse ($kunjungans as $index => $kunjungan)
        <tr>
            <td style="text-align: center;">{{ $kunjungans->firstItem() + $index }}</td>
            <td style="white-space: nowrap;"><strong>{{ $kunjungan->kode_tamu }}</strong></td>
            <td style="white-space: nowrap;">{{ \Carbon\Carbon::parse($kunjungan->tanggal)->format('d-m-Y') }}</td>
            <td>{{ $kunjungan->nama }}</td>
            <td style="word-break: break-word;">{{ $kunjungan->kontak }}</td>
            <td>{{ $kunjungan->instansi }}</td>
            <td style="word-wrap: break-word;">{{ $kunjungan->keperluan }}</td>
            <td style="text-align: center;">
                <div class="d-flex gap-1 justify-content-center">
                    @can('manage kunjungan')
                        <x-tombol-aksi href="{{ route('kunjungan.show', $kunjungan->id) }}" type="show" />
                        <x-tombol-aksi href="{{ route('kunjungan.edit', $kunjungan->id) }}" type="edit" />
                    @endcan

                    @can('delete kunjungan')
                        <x-tombol-aksi href="{{ route('kunjungan.destroy', $kunjungan->id) }}" type="delete" />
                    @endcan
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="9" class="text-center">
                <div class="alert alert-danger mb-0">
                    Data Kunjungan belum tersedia.
                </div>
            </td>
        </tr>
    @endforelse
</x-table-list>