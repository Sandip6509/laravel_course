<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Dealer;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function oneToone()
    {
        $data = Brand::with('dealers')->get()->toArray();

        echo "<pre>";
        print_r($data);
        exit;

        return true;
    }

    public function One2One()
    {
        $data = Dealer::with('brands')->get()->toArray();

        echo "<pre>";
        print_r($data);
        exit;

        return true;
    }

    public function One2Many()
    {
        $data = Brand::with('dealers')->get()->toArray();

        echo "<pre>";
        print_r($data);
        exit;

        return true;
    }

    public function belongsToManyBrands()
    {
        $data = Brand::with('belongsToManyDealers')->get()->toArray();

        echo "<pre>";
        print_r($data);
        exit;

        return true;
    }

    public function belongsToManyDealers()
    {
        $data = Dealer::with('belongsToManyBrands')->get()->toArray();

        echo "<pre>";
        print_r($data);
        exit;

        return true;
    }

    public function OneToOnePolymorphic(Request $request)
    {
        $cars = Car::with('image')->first()->toArray();
        $customer = Customer::with('image')->first()->toArray();
        echo '<pre>';
        print_r([$cars,$customer]);
        echo exit;
    }

    public function OneToManyPolymorphic(Request $request)
    {
        $cars = Car::with('images')->first()->toArray();
        $customer = Customer::with('images')->first()->toArray();
        echo '<pre>';
        print_r([$cars,$customer]);
        echo exit;
    }

    public function ManyToManyPolymorphic(Request $request)
    {
        $cars = Car::with('tags')->first()->toArray();
        $customer = Customer::with('tags')->first()->toArray();
        echo '<pre>';
        print_r([$cars,$customer]);
        echo exit;
    }
}
