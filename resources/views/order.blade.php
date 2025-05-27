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
                                            <div class="navbar align-items-center">
                                                <div>
                                                    <h3 class="m-0">{{ $drink->name }}</h3>
                                                    {{-- <p class="m-0 fs-5 text-pink-700">${{ number_format($drink->price, 2) }}</p> --}}
                                                </div>
                                                <div>
                                                    <button class="btn bg-pink-700 text-light rounded-0">+ Add To Cart</button>
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
                        <tbody>
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
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="m-0">Total-Payment : $6.00</h5>

                        </div>
                        <div>
                            <button class="btn btn-dark">Proccess Order</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
