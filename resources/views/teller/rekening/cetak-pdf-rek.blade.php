<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <style>
        @page {
            size: 140mm 290mm;
            margin: 0;
        }

        body {
            margin: 0;
            font-family: "Courier New", monospace;
            font-size: 11px;
        }

        /* =============================
           TEKS VERTIKAL (JIKA PERLU)
        ============================== */
        .vertical-left {
            position: absolute;
            left: 5mm;
            top: 40mm;
            transform: rotate(-90deg);
            font-weight: bold;
        }

        .vertical-bottom {
            position: absolute;
            left: 5mm;
            top: 220mm;
            transform: rotate(-90deg);
            font-weight: bold;
        }

        /* =============================
           DATA (TANPA LABEL)
        ============================== */
        .rekening {
            position: absolute;
            left: 35mm;
            top: 13mm;
        }

        .nama {
            position: absolute;
            left: 35mm;
            top: 21mm;
        }

        .alamat {
            position: absolute;
            left: 35mm;
            top: 28mm;
            width: 90mm;
        }

        .kodepos {
            position: absolute;
            left: 35mm;
            top: 35mm;
        }

        .telp {
            position: absolute;
            left: 35mm;
            top: 42mm;
        }
    </style>
</head>

<body>

    {{-- Optional teks vertikal --}}
    {{-- <div class="vertical-left">Disahkan Petugas</div> --}}

    {{-- DATA SAJA --}}
    <div class="rekening">{{ $rekening->no_rekening }}</div>
    <div class="nama">{{ strtoupper($rekening->nama_rekening) }}</div>
    <div class="alamat">{{ $rekening->alamat }}</div>
    <div class="kodepos">{{ $rekening->kode_pos }}</div>
    <div class="telp">{{ $rekening->telepon }}</div>

</body>

</html>
