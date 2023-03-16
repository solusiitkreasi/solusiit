<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\Seo;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Seo;

    public function __construct()
    {
        $this->keywords = ['morita','st morita'];
        $this->default_logo = asset('frontend/images/logo.png');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brand_id = $request->get('brand');
        $category_id = $request->get('category');

        $this->meta('Produk Kami', 'Official website St Morita', $this->keywords, $this->default_logo);

        return view('frontend.index.products.index', [
            'brand_id' => $brand_id,
            'category_id' => $category_id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $this->meta("Detail Produk", 'Official website St Morita', $this->keywords, $this->default_logo);

        return view('frontend.index.products.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {}
}
