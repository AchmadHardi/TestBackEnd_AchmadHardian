@extends('products.layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <form id="form">
                    <div class="mb-3">
                        <label for="type" class="form-label">Select Type</label>
                        <select class="form-select" id="type" name="type">
                            <option disabled selected>-- pilih tipe --</option>
                            <option value="1">Type 1</option>
                            <option value="2">Type 2</option>
                            <option value="3">Type 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Input Angka</label>
                        <input type="text" class="form-control" id="input" name="input" placeholder="Enter number">
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
                return;
            }

            document.getElementById('error').innerHTML = "";

            generateOutput();
        }

        function generateOutput() {
            let type = document.getElementById('type').value;
            let input = document.getElementById('input').value;
            let value = parseInt(input);
            let result = '';

            switch (type) {
                case '1':
                    for (let i = 0; i < value; i++) {
                        for (let j = 0; j <= i; j++) {
                            result += '* ';
                        }
                        result += '<br>';
                    }
                    break;
                case '2':
                    for (let i = 0; i < value; i++) {
                        for (let j = value; j > i; j--) {
                            result += '* ';
                        }
                        result += '<br>';
                    }
                    break;
                case '3':
                    for (let i = 0; i < value; i++) {
                        for (let j = 0; j < value - i - 1; j++) {
                            result += '&nbsp;&nbsp;';
                        }
                        for (let k = 0; k <= i; k++) {
                            result += '*&nbsp;';
                        }
                        result += '<br>';
                    }
                    break;
                default:
                    result = "Please select a type.";
            }
            document.getElementById('output').innerHTML = result;
        }
    </script>
@endsection
