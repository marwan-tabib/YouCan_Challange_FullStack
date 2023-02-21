<?php

namespace App\Http\Controllers;

use App\Http\Traits\ImageUploaderTrait;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ImageUploaderTrait;

    protected $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository;
    }

    public function index(Request $request)
    {
        return $this->repository->index($request->all());
    }

    public function create(Request $request)
    {
        $request = $request->all();
        $request['image'] = $this->uploadImage($request['image']);
        return $this->repository->create($request);
    }
}
