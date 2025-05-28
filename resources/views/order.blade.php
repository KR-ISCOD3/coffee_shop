@extends('layouts.app')

@section('title','Order Page')

@section('content')

    <!-- Order Content -->
    <div class="px-4 mt-4">
        <div class="d-flex justify-content-between">

            <div class="col-7 bg-body border-end ">
                <div class="bg-body p-4">
                    <div class="d-flex">
                        <form action="" class="col-5 d-flex border">
                            <input type="text" placeholder="Search..."
                                class="form-control shadow-none rounded-0 border-0 py-2">
                            <button class="btn border-0">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="w-100" style="height: 700px;overflow-y: auto;">

                        <div class="row m-0 my-4">

                            @foreach ($drinks as $drink)
                                <div class="col-6 my-2">
                                    <div class="card rounded-0">
                                        <div class="card-image bg-secondary overflow-hidden" style="height: 250px;">
                                            <img src="{{ asset('uploads/' . $drink->image) }}" alt="{{ $drink->name }}" class="w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div>
                                                    <h3 class="m-0">{{ $drink->name }}</h3>
                                                    {{-- <p class="m-0 fs-5 text-pink-700">${{ number_format($drink->price, 2) }}</p> --}}
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <button
                                                     class="btn bg-primary text-light rounded-0 add-card me-2"
                                                     data-id="{{ $drink->id }}"
                                                     data-name="{{ $drink->name }}"
                                                     data-categoy="{{ $drink->category_id }}"
                                                     data-small_price="{{ $drink->small_price }}"
                                                     data-selected_size="small"
                                                     >
                                                        + Small Price
                                                    </button>
                                                    <button
                                                     class="btn bg-success text-light rounded-0 add-card"
                                                     data-id="{{ $drink->id }}"
                                                     data-name="{{ $drink->name }}"
                                                     data-categoy="{{ $drink->category_id }}"
                                                     {{-- data-small_price="{{ $drink->small_price }}" --}}
                                                     data-medium_price="{{ $drink->medium_price }}"
                                                     data-selected_size="medium">
                                                        + Medium Price
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-5 ps-3">
                <div class="bg-body p-4">
                    <h4>Cart</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="text-secondary">Name</td>
                                <td class="text-secondary">Size</td>
                                <td class="text-secondary">Price</td>
                                <td class="text-secondary">Qty</td>
                                <td class="text-secondary">Total</td>
                            </tr>
                        </thead>
                        <tbody id="cart-body">
                            {{-- <tr class="align-middle">
                                <td>Ice Latte</td>
                                <td class="col-3">
                                    <select name="" id="" class="form-select shadow-none border rounded-0">
                                        <option value="">small</option>
                                        <option value="">meduim</option>
                                    </select>
                                </td>
                                <td>$1.50</td>
                                <td class="col-2">
                                    <input type="number" name="" id="" class="form-control shadow-none border rounded-0" value="2">
                                </td>
                                <td>$3.00</td>
                            </tr>
                            <tr class="align-middle">
                                <td>Ice Latte</td>
                                <td class="col-3">
                                    <select name="" id="" class="form-select shadow-none border rounded-0">
                                        <option value="">small</option>
                                        <option value="">meduim</option>
                                    </select>
                                </td>
                                <td>$1.50</td>
                                <td class="col-2">
                                    <input type="number" name="" id="" class="form-control shadow-none border rounded-0" value="2">
                                </td>
                                <td>$3.00</td>
                            </tr> --}}
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="m-0">Total-Payment : $6.00</h5>

                        </div>
                        <div>
                            <button class="btn btn-dark"
                            >Proccess Order</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        let cart = [];

        $(document).ready(function () {
            // Add to Cart
            $('.add-card').on('click', function () {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const selected_size = $(this).data('selected_size');
                const small_price = parseFloat($(this).data('small_price') || 0);
                const medium_price = parseFloat($(this).data('medium_price') || 0);

                const existingItem = cart.find(item => item.id === id && item.selected_size === selected_size);

                const price = selected_size === 'medium' ? medium_price : small_price;

                if (existingItem) {
                    existingItem.qty += 1;
                    existingItem.total = (existingItem.qty * price).toFixed(2);
                } else {
                    cart.push({
                        id: id,
                        name: name,
                        small_price: small_price,
                        medium_price: medium_price,
                        selected_size: selected_size,
                        qty: 1,
                        total: price.toFixed(2)
                    });
                }

                renderCart();
            });

            // Render cart table
            function renderCart() {
                let cartTable = '';

                cart.forEach((item, index) => {
                    const price = item.selected_size === 'medium' ? item.medium_price : item.small_price;
                    const total = (item.qty * price).toFixed(2);
                    item.total = total;

                    cartTable += `
                        <tr class="align-middle">
                            <td>${item.name}</td>
                            <td class="col-4">
                                <input
                                    type="text"
                                    class="form-control shadow-none border rounded-0 " disabled
                                    data-index="${index}" value="${item.selected_size === 'small' ? 'small' : 'medium'}">
                            </td>
                            <td>$${price.toFixed(2)}</td>
                            <td class="col-2">
                                <input type="number" min="1" class="form-control shadow-none border rounded-0 qty-input col"
                                data-index="${index}" value="${item.qty}">
                            </td>
                            <td>$${total}</td>
                        </tr>
                    `;
                });

                $('#cart-body').html(cartTable);
                updateTotalDisplay();
            }

            // Size change
            $(document).on('change', '.size-select', function () {
                const index = $(this).data('index');
                const newSize = $(this).val();
                cart[index].selected_size = newSize;
                renderCart();
            });

            // Quantity change
            $(document).on('change', '.qty-input', function () {
                const index = $(this).data('index');
                const newQty = parseInt($(this).val()) || 1;
                cart[index].qty = newQty;
                renderCart();
            });

            // Update total payment display
            function updateTotalDisplay() {
                const total = cart.reduce((sum, item) => sum + parseFloat(item.total), 0);
                $('.m-0:contains("Total-Payment")').text(`Total-Payment : $${total.toFixed(2)}`);
            }
        });
    </script>


@endsection
