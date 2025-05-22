@extends('layouts.app')

@section('title','Home Page')

@section('content')
    {{-- <p>Welcome, {{ Auth::user()->role }}. You are a cashier.</p> --}}
    <!-- Analysis Card -->
    {{-- @endif --}}
    <div class="p-3">
        <div class="row m-0">
            <div class="col-3  p-2">
                <div class="navbar py-3 bg-light px-4">
                    <div>
                        <h1>954</h1>
                        <p class="m-0 text-secondary fs-5">New Order</p>
                    </div>
                    <i class="bi bi-backpack-fill text-pink-700" style="font-size: 50px;"></i>
                </div>
            </div>

            <div class="col-3  p-2">
                <div class="navbar py-3 bg-light px-4">
                    <div>
                        <h1>1,954</h1>
                        <p class="m-0 text-secondary fs-5">Total Orders</p>
                    </div>
                    <i class="bi bi-cart-fill text-pink-700" style="font-size: 50px;"></i>
                </div>
            </div>

            <div class="col-3  p-2">
                <div class="navbar py-3 bg-light px-4">
                    <div>
                        <h1>50</h1>
                        <p class="m-0 text-secondary fs-5">Latest Drinks</p>
                    </div>
                    <i class="bi bi-plus-square-fill text-pink-700" style="font-size: 50px;"></i>
                </div>
            </div>

            <div class="col-3  p-2">
                <div class="navbar py-3 bg-light px-4">
                    <div>
                        <h1>154</h1>
                        <p class="m-0 text-secondary fs-5">Drinks</p>
                    </div>
                    <i class="bi bi-cup-fill text-pink-700" style="font-size: 50px;"></i>
                </div>
            </div>

        </div>
    </div>

    <!-- Table Order -->
    <div class="px-4">
        <div class="bg-body p-4">
            <div class="d-flex justify-content-between">
                <h3 class="m-0">Recent Orders</h3>
                <button class="btn btn-success">Export Excel</button>
            </div>
            <div style="height: 550px; overflow-y: auto;">
                <table class="table mt-4">
                    <thead>
                        <tr class="text-center ">
                        <td class="text-secondary fw-medium">OrderID</td>
                        <td class="text-secondary fw-medium">Drink / Size</td>
                        <td class="text-secondary fw-medium">Sugar %</td>
                        <td class="text-secondary fw-medium">Payment$</td>
                        <td class="text-secondary fw-medium">Order_date</td>
                        <td class="text-secondary fw-medium">Cashier</td>
                        <td class="text-secondary fw-medium">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-middle text-center ">
                        <td>1</td>
                        <td>
                            Ice Lette / <span class="text-primary">small</span>
                        <td>70%</td>
                        <td>15.00$</td>
                        <td>
                            <span class="px-3 bg-secondary-subtle rounded-2">27/04/2025</span>
                        </td>
                        <td>2</td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#modalorderdelete" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- modal delete order -->
    <div class="modal fade " id="modalorderdelete" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body">
                    <form action="">
                        <input type="hidden" name="iddelete" id="iddelete">
                        <h2 class="text-center">Are you want delete?</h2>
                        <div class="modal-footer mt-2 border-0 justify-content-center">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-danger">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

