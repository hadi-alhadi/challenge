<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiscountsController extends Controller
{
    public function index(Request $request)
    {
        if (!Storage::disk('local')->exists('discounts.json')) {
            return response()->json(['error' => 'File not found'], 404);
        }

        $json = Storage::disk('local')->get('discounts.json');
        $discounts = json_decode($json, true);

        $name = $request->query('name');
        $discountPercentage = $request->query('discount_percentage');

        $discounts = $this->filterDiscounts($discounts, $name, $discountPercentage);

        return response()->json(array_values($discounts));
    }

    private function filterDiscounts($discounts, $name, $discountPercentage)
    {
        if (!is_null($name)) {
            $discounts = array_filter($discounts, function ($discount) use ($name) {
                return false !== stripos($discount['name'], $name);
            });
        }

        if (!is_null($discountPercentage)) {
            $discounts = array_filter($discounts, function ($discount) use ($discountPercentage) {
                return $discount['discount_percentage'] == $discountPercentage;
            });
        }

        return $discounts;
    }
}
