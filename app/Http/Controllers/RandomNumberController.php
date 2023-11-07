<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RandomNumber;
use Illuminate\Support\Str;

class RandomNumberController extends Controller
{
    public function generate()
    {
        $randomValue = random_int(1, 1000);

        $randomNumber = new RandomNumber();
        $randomNumber->value = $randomValue;
        $randomNumber->save();

        return response()->json($randomNumber, 201);
    }

    public function retrieve($id)
    {
        $randomNumber = RandomNumber::find($id);

        if (!$randomNumber) {
            return response()->json(['message' => 'Generated number not found'], 404);
        }

        return response()->json($randomNumber);
    }
}
