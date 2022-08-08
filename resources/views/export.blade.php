<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Instansi No.Laporan Polisi</th>
            <th>Kecamatan</th>
            <th>Alamat</th>
            <th>Jumlah Kecelakaan</th>
            <th>Tahun</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Korban</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td style="vertical-align: top">
                    {{ $loop->iteration }}
                </td>
                <td style="vertical-align: top">{{ $item->no_laporan }}</td>
                <td style="vertical-align: top">{{ $item->tematik->kecamatan }}</td>
                <td style="vertical-align: top">{{ $item->alamat }}</td>
                <td style="vertical-align: top">{{ $item->jumlah_kecelakaan }}</td>
                <td style="vertical-align: top">{{ $item->tanggal }}</td>
                <td style="vertical-align: top">{{ $item->long }}</td>
                <td style="vertical-align: top">{{ $item->lat }}</td>
                <td style="vertical-align: top">
                    @foreach ($item->korban as $korban)
                        <p>{{ $korban->nama }}, Umur {{ $korban->umur }} Tahun, Alamat {{ $korban->alamat }}</p>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
