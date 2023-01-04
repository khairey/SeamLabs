<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task1($start, $end)
    {
        $start = abs($start);
        $end = abs($end);
        $count = 0;
        if (!is_numeric($start) || !is_numeric($end))
            return response()->json(['error' => 'Both inputs Must be Numaric'], 400);
        if ($end < $start)
            return response()->json(['error' => 'The start number will always be smaller than the end number.'], 400);
        for ($i = $start; $i <= $end; $i++) {
            if (!preg_match("(5)", $i)) {
                $count++;
            }
        }
        return response()->json($count, 200);
    }
    function generateAlphabet($na)
    {
        $sa = "";
        while ($na >= 0) {
            $sa = chr($na % 26 + 65) . $sa;
            $na = floor($na / 26) - 1;
        }
        return $sa;
    }
    public function task2($inputString)
    {
        if (!ctype_alpha($inputString))
            return response()->json(['error' => 'Both inputs Must be Alphabetic '], 400);
        $alphabet = array();
        for ($na = -1; $na < 500000 ; $na++) {
            $alph = $this->generateAlphabet($na);
            $alphabet[] = $alph;
            if ($inputString == $alph) {
                return response()->json(array_key_last($alphabet), 200);
            }
        }
    }
}
