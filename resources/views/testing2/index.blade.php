@extends('products.layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <form id="form">
                    <div class="mb-3">
                        <label for="input" class="form-label">Input Angka</label>
                        <input type="text" class="form-control" id="input" name="input" placeholder="Masukan angka lalu tekat submit contoh:9834201" maxlength="8">
                        <div id="error" class="text-danger"></div>
                    </div>

                    <button type="button" class="btn btn-primary mt-3" onclick="validateAndGenerateOutput()">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="output-container">
                    <h3>Output</h3>
                    <div id="output"></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .output-container {
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>

    <script>

        function validateAndGenerateOutput() {
            let input = document.getElementById('input').value;

            if (!/^\d+$/.test(input)) {
                document.getElementById('error').innerHTML = "Masukkan hanya angka.";
                document.getElementById('output').innerHTML = "";
                return;
            }

            document.getElementById('error').innerHTML = "";
            generateOutput();
        }

        function generateOutput() {
            let input = document.getElementById('input').value;
            let formattedOutput = '';

            formattedOutput += " " + toCurrency(input) + "<br>";

            formattedOutput += "Terbilang:<br>" + toWords(input) + " rupiah";
            document.getElementById('output').innerHTML = formattedOutput;
        }

        function toCurrency(num) {
            return parseInt(num).toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).replace('IDR', '').trim();
        }
        function toWords(num) {
            const satuan = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"];
            const belasan = ["sepuluh", "sebelas", "dua belas", "tiga belas", "empat belas", "lima belas", "enam belas", "tujuh belas", "delapan belas", "sembilan belas"];
            const puluhan = ["", "", "dua puluh", "tiga puluh", "empat puluh", "lima puluh", "enam puluh", "tujuh puluh", "delapan puluh", "sembilan puluh"];
            const ribuan = ["", "ribu", "juta", "miliar", "triliun"];

            if (num == 0) return "nol";

            let words = "";

            let i = 0;
            while (num > 0) {
                let tempNum = num % 1000;
                if (tempNum != 0) {
                    let part = "";
                    if (tempNum % 100 < 20 && tempNum % 100 > 0) {
                        if (tempNum % 100 < 10) {
                            part = satuan[tempNum % 10];
                        } else {
                            part = belasan[tempNum % 10];
                        }
                        tempNum = Math.floor(tempNum / 100);
                    } else {
                        part = satuan[tempNum % 10];
                        tempNum = Math.floor(tempNum / 10);

                        part = puluhan[tempNum % 10] + (part ? " " + part : "");
                        tempNum = Math.floor(tempNum / 10);
                    }
                    if (tempNum > 0) {
                        part = satuan[tempNum] + " ratus" + (part ? " " + part : "");
                    }
                    words = part + " " + ribuan[i] + " " + words;
                }
                num = Math.floor(num / 1000);
                i++;
            }

            return words.trim();
        }
    </script>
@endsection
