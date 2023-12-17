@if ($products)
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="responsivetableCheck">
                            <label class="form-check-label" for="responsivetableCheck"></label>
                        </div>
                    </th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="responsivetableCheck01">
                                <label class="form-check-label" for="responsivetableCheck01"></label>
                            </div>
                        </th>

                        <td>{{ $product->name }}</td>
                        <td>
                            {{ $product->price }}
                        </td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-md btn-primary">Edit</a>
                            <a href="{{ route('product.sell', $product->id) }}"
                                class="btn btn-md btn-secondary">sell</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <!-- end table -->
    </div>
@elseif ($sales)
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="responsivetableCheck">
                            <label class="form-check-label" for="responsivetableCheck"></label>
                        </div>
                    </th>
                    <th scope="col">Sale Date</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="responsivetableCheck01">
                                <label class="form-check-label" for="responsivetableCheck01"></label>
                            </div>
                        </th>

                        <td>{{ $sale->sale_date }}</td>
                        <td>
                            {{ $sale->name }}
                        </td>
                        <td>{{ $sale->quantity_sold }}</td>
                        <td>{{ $sale->total_amount }}</td>
                        <td>
                            {{-- <a href="{{ route('product.edit', $product->id) }}" class="btn btn-md btn-primary">Edit</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <!-- end table -->
    </div>

@endif
