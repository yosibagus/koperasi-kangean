<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            size: 140mm 190mm;
            margin: 0;
        }

        body {
            margin: 0;
            font-family: "Courier New", monospace;
            font-size: 11px;
        }

        .row {
            position: absolute;
            left: 0;
            width: 140mm;
        }

        .col-date {
            position: absolute;
            left: 1mm;
            width: 20mm;
        }

        .col-no {
            position: absolute;
            left: 20mm;
            width: 20mm;
        }

        .col-debet {
            position: absolute;
            left: 31mm;
            width: 30mm;
            text-align: left;
        }

        .col-kredit {
            position: absolute;
            left: 61mm;
            width: 30mm;
            text-align: left;
        }

        .col-saldo {
            position: absolute;
            left: 93mm;
            width: 30mm;
            text-align: left;
        }

        .col-teller {
            position: absolute;
            left: 124mm;
            width: 10mm;
            text-align: center;
        }

        .row-gap {
            height: 4.2mm;
            line-height: 4.2mm;
            padding: 0;
        }
    </style>
</head>

<body>

    @php
        // baris pertama cetak
        $currentRow = $rows[0]['row'];
    @endphp

    <table>
        <tbody>

            {{-- spasi awal sebelum baris pertama --}}
            @for ($i = 1; $i < $currentRow; $i++)
                <tr>
                    <td colspan="6" class="row-gap">&nbsp;</td>
                </tr>
            @endfor

            {{-- cetak setiap baris --}}
            @foreach ($rows as $item)
                <tr>
                    <td colspan="6" class="row-gap">&nbsp;</td>
                </tr>

                <div class="row">
                    <span class="col-date">{{ $item['data']->created_at->format('d/m/y') }}</span>
                    <span class="col-no">{{ $sandi }}</span>

                    <span class="col-debet">
                        {{ $item['data']->jenis === 'keluar' ? number_format($item['data']->jumlah, 0, ',', '.') : '' }}
                    </span>

                    <span class="col-kredit">
                        {{ $item['data']->jenis === 'masuk' ? number_format($item['data']->jumlah, 0, ',', '.') : '' }}
                    </span>

                    <span class="col-saldo">
                        {{ number_format($item['data']->saldo, 0, ',', '.') }}
                    </span>

                    <span class="col-teller">
                        {{ strtoupper(Auth::user()->name) }}
                    </span>
                </div>
            @endforeach

        </tbody>
    </table>

</body>

</html>
