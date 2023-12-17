@extends('layout.master')

@section('title', 'Add Product')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Store</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Store</a></li>
                                    <li class="breadcrumb-item active">Edit Product</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong> {{ session('success') }} </strong>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong> {{ session('error') }} </strong>
                    </div>
                @endif

                <form id="createproduct-form" autocomplete="off" class="needs-validation"
                    action="{{ route('product.update', $product->id) }} " method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Edit Product</h5>
                                </div>
                                <!-- end card header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="name">Product
                                                            Name</label>
                                                        <input type="text" class="form-control"
                                                            id="manufacturer-name-input" name="name"
                                                            value="{{ $product->name }}" placeholder="Enter product name">
                                                        @error('name')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="quantity">Stocks</label>
                                                        <input type="number" class="form-control" id="stocks-input"
                                                            step="any" name="quantity" value="{{ $product->quantity }}"
                                                            disabled>
                                                        @error('quantity')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="price">Price</label>
                                                        <div class="input-group has-validation mb-3">
                                                            <span class="input-group-text" id="product-price-addon">$</span>
                                                            <input type="number" class="form-control" step=".01"
                                                                id="product-price-input" placeholder="Enter price"
                                                                aria-label="Price" aria-describedby="product-price-addon"
                                                                name="price" value="{{ $product->price }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <!-- end tab-pane -->

                                        <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="meta-title-input">Meta
                                                            title</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter meta title" id="meta-title-input">
                                                    </div>
                                                </div>
                                                <!-- end col -->

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="meta-keywords-input">Meta
                                                            Keywords</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter meta keywords" id="meta-keywords-input">
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->

                                            <div>
                                                <label class="form-label" for="meta-description-input">Meta
                                                    Description</label>
                                                <textarea class="form-control" id="meta-description-input" placeholder="Enter meta description" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- end tab pane -->
                                    </div>
                                    <!-- end tab content -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                            <div class="text-end mb-3">
                                <button type="submit" class="btn btn-primary w-sm">Submit</button>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                </form>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content --
    @endSection
