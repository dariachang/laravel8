<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //$data = DB::table('products')->get();
        //+20
        DB::table('cart_items')->where('id',1)->increment('quantity', 20);
        //-1
        DB::table('cart_items')->where('id',1)->decrement('quantity');
        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->getData();
        $newData = $request->all();
        $data->push(collect($newData));
        return response($data);
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
        //
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
        $form = $request->all();
        $data = $this->getData();
        $selectedData = $data->where('id', $id)->first();
        $selectedData = $selectedData->merge(collect($form));
        dump($selectedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->getData();
        $data = $data->filter(function($product) use ($id) {
            return $product['id'] != $id;
        });
        return response($data->values());
    }

    public function getData()
    {
        return collect([
            collect([
                'id' => '0',
                'title' => '測試產品一',
                'content' => '這是很棒的商品',
                'price' => 50
            ]),
            collect([
                'id' => '1',
                'title' => '測試產品二',
                'content' => '這是有點棒的商品',
                'price' => 30
            ])
        ]);
    }
}
