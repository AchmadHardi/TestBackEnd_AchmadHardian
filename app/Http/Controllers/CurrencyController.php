<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function convert(Request $request)
    {
        $input = $request->input('number');

        if (!ctype_digit($input)) {
            return response()->json(['error' => 'Masukkan hanya angka.'], 400);
        }

        $formattedOutput = [
            'currency' => $this->toCurrency($input),
            'words' => $this->toWords($input) . ' rupiah'
        ];

        return response()->json($formattedOutput);
    }

    private function toCurrency($num)
    {
        return number_format($num, 0, ',', '.');
    }

    private function toWords($num)
    {
        $satuan = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"];
        $belasan = ["sepuluh", "sebelas", "dua belas", "tiga belas", "empat belas", "lima belas", "enam belas", "tujuh belas", "delapan belas", "sembilan belas"];
        $puluhan = ["", "", "dua puluh", "tiga puluh", "empat puluh", "lima puluh", "enam puluh", "tujuh puluh", "delapan puluh", "sembilan puluh"];
        $ribuan = ["", "ribu", "juta", "miliar", "triliun"];

        if ($num == 0) return "nol";

        $words = "";

        $i = 0;
        while ($num > 0) {
            $tempNum = $num % 1000;
            if ($tempNum != 0) {
                $part = "";
                if ($tempNum % 100 < 20 && $tempNum % 100 > 0) {
                    if ($tempNum % 100 < 10) {
                        $part = $satuan[$tempNum % 10];
                    } else {
                        $part = $belasan[$tempNum % 10];
                    }
                    $tempNum = (int)($tempNum / 100);
                } else {
                    $part = $satuan[$tempNum % 10];
                    $tempNum = (int)($tempNum / 10);

                    $part = $puluhan[$tempNum % 10] . ($part ? " " . $part : "");
                    $tempNum = (int)($tempNum / 10);
                }
                if ($tempNum > 0) {
                    $part = $satuan[$tempNum] . " ratus" . ($part ? " " . $part : "");
                }
                $words = $part . " " . $ribuan[$i] . " " . $words;
            }
            $num = (int)($num / 1000);
            $i++;
        }

        return $words.trim();
    }
}
