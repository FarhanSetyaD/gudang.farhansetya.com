<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Estimasi Biaya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="" />
    <script src=""></script>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .kotak-luar {
        border: 1px solid #dddddd;
        padding: 20px 10px 10px 10px;
        margin-bottom: 20px;
    }

    .kotak-header {
        border: 1px solid #dddddd;
        background-color: #dddddd;
        padding-left: 10px;
    }
    .tabel-kanan{
        text-align: right;
    }
    .tabel-tengah{
        text-align: center;
    }
    .tabel-kiri{
        text-align:left;
    }
    .btn-close{
        float:right;
        background-color:white;
        padding:10px;   
        border:1px solid #dddddd;
        border-radius: 8px;
    }
    </style>

</head>

<body>
    <div class="kotak-header">
        <p><b>DETAILS - 999</b></p>
    </div>

    <div class="kotak-luar">
        <table style="width:100%">
            <caption>
                <h1>ESTIMATED PAY : Rp. 999.999</h1>
            </caption>
            <tr>
                <th class="tabel-kiri">NO</th>
                <th class="tabel-kiri">DESCRIPTION</th>
                <th>QTY</th>
                <th class="tabel-kanan">TARIFF RATE</th>
                <th class="tabel-kanan">AMOUNT</th>
            </tr>
            <tr>
                <td class="tabel-kiri">1</td>
                <td>PASS TRUCK</td>
                <td class="tabel-tengah">1</td>
                <td class="tabel-kanan">9,999</td>
                <td class="tabel-kanan">9,999</td>
            </tr>
            <tr>
                <td class="tabel-kiri">2</td>
                <td>TAX PPN</td>
                <td class="tabel-tengah">2</td>
                <td class="tabel-kanan">99,999</td>
                <td class="tabel-kanan">99,999</td>
            </tr>

        </table>
    </div>

    <button class="btn-close">Submit</button>
    <button class="btn-close">Close</button>
</body>

</html>