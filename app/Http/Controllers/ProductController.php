<?php

namespace App\Http\Controllers;

use App\Category;
use App\InsuranceClass;
use App\Insurer;
use App\Product;
use App\Tariff;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        // $motorPrivate = InsuranceClass::where("value", env("MOTOR_PRIVATE", "600"))->first();

        // $products = [];

        // foreach ($motorPrivate->children as $child) {
        //     array_push($products, ...$child->products);
        // }

        return view('products')->with(["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insurers = Insurer::all();
        $categories = Category::all();

        return view('new-product')->with(["insurers" => $insurers, "categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:products|max:255',
            'description' => 'string|nullable|max:255',
            'insurer_id' => 'required|exists:App\Insurer,id',
            'category_id' => 'required|exists:App\Category,id',
            'price' => 'required|numeric',
        ]);

        $insurer = Insurer::find($data["insurer_id"]);
        $category = Category::find($data["category_id"]);

        $insuranceClass = $category->insuranceClass;

        $product = new Product;
        $product->name = $data["name"];
        $product->description = $data["description"];
        $product->has_ipf = $request->has("has_ipf");

        $product->insurer()->associate($insurer);
        $product->category()->associate($category);
        $product->insuranceClass()->associate($insuranceClass);

        // dd($product);

        $product->save();

        // Tariff
        $product->tariffs()->attach(Tariff::firstOrCreate([
            "name" => $data["name"],
            "value" => $data["price"],
            "is_percentage" => $request->has("is_percentage")
        ]));

        return redirect()->route("products");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit-products');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
