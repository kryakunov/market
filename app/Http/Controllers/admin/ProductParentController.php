<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductParentParent\StoreRequest;
use App\Http\Requests\Admin\ProductParentParent\UpdateRequest;
use App\Http\Resources\ProductParent\ProductParentResource;
use App\Models\ProductParent;
use App\Models\ProductParentParent;
use App\Services\ProductParentService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductParentController extends Controller
{


    public function index()
    {
        $productParents = ProductParent::all();
        $productParents = ProductParentResource::collection($productParents)->resolve();

        return Inertia('Admin/ProductParent/Index', compact('productParents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia('ProductParent/Admin/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\ProductParent\StoreRequest $request)
    {
        $data = $request->validated();
        $productParent = ProductParentService::store($data);
        return ProductParentResource::make($productParent)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductParent $productParent)
    {
        $productParent = ProductParentResource::make($productParent)->resolve();

        return Inertia('ProductParent/Admin/Show', compact('productParent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductParent $productParent)
    {
        $productParent = ProductParentResource::make($productParent)->resolve();

        return Inertia('ProductParent/Admin/Edit', compact('productParent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\ProductParent\UpdateRequest $request, ProductParent $productParent)
    {
        $data = $request->validated();
        $productParent = ProductParentService::update($productParent, $data);
        return ProductParentResource::make($productParent)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductParent $productParent)
    {
        $productParent->delete();

        return response()->json([
            'message' => 'success'
        ], Response::HTTP_OK);
    }
}
