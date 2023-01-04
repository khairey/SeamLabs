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
        for ($na = -1; $na < 500000; $na++) {
            $alph = $this->generateAlphabet($na);
            $alphabet[] = $alph;
            if ($inputString == $alph) {
                return response()->json(array_key_last($alphabet), 200);
            }
        }
    }

    function divisable($num)
    {

        if ($num % 2 == 0) {
            $diff = $num / 2;
            $num = max($diff, 2);
            return $num;
        }

        if ($num % 3 == 0) {
            $diff = $num / 3;
            $num = max($diff, 3);
            return $num;
        }
        if ($num % 4 == 0) {
            $diff = $num / 4;
            $num = max($diff, 4);
            return $num;
        }

        if ($num % 5 == 0) {
            $diff = $num / 5;
            $num = max($diff, 5);
            return $num;
        }

        if ($num % 6 == 0) {
            $diff = $num / 6;
            $num = max($diff, 6);
            return $num;
        }

        if ($num % 7 == 0) {
            $diff = $num / 7;
            $num = max($diff, 7);
            return $num;
        }
        return $num;
    }
    public function task3()
    {
        $results = array();
        $arr = array(3, 4);
        foreach ($arr as $num) {
            $steps = 0;
            while ($num !=   0) {
                $oldnum = $num;
                $num = $this->divisable($num);
                if ($oldnum != $num) {
                    $steps++;
                } else {
                    $num--;
                    $steps++;
                }
            }

            $results[] = $steps;
        }
        return response()->json($results, 200);
    }
}
