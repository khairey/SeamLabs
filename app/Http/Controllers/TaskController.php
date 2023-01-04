<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task1($start, $end)
    {
        $start=abs($start);
        $end=abs($end);
        $count=0;
        if (!is_numeric($start) || !is_numeric($end))
            return response()->json(['error' => 'Both inputs Must be Numaric'], 400);
        if ($end < $start)
            return response()->json(['error' => 'The start number will always be smaller than the end number.'], 400);
        for($i=$start;$i<=$end;$i++){
            if(!preg_match("(5)", $i)){
                $count++;
            }
        }
        return response()->json($count, 200); 
    }
}
