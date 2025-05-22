<aside class="col-2 p-0">
    <div class="col-2 bg-pink-700 d-flex flex-column p-3 position-fixed" style="height: 100vh;">

      <!-- Logo -->
      <div class="d-flex align-items-center border-bottom pb-2">
        <img src="{{asset('logo.png')}}" alt="" width="60px">
        <h3 class="mb-0 font-nationalpark fw-bold text-light ms-2">P-COFFEE</h3>
      </div>

      <!-- Menu -->
      <menu class="font-nationalpark p-0 flex-grow-1 mt-3">
        <ul class="list-unstyled">
            @if (Auth::user()->role === 'admin')
                <li class="hover-bg p-2 rounded-3 transition my-2">
                    <a href="{{ route('dashboard.admin') }}" class="text-decoration-none fs-4 text-light transition">
                        <i class="bi bi-house-door-fill"></i> <span class="fw-medium">Dashboard</span>
                    </a>
                </li>
                <li class="hover-bg p-2 rounded-3 transition my-2">
                    <a href="{{ route('order.admin') }}" class="text-decoration-none fs-4 text-light transition">
                        <i class="bi bi-house-door-fill"></i> <span class="fw-medium">Order</span>
                    </a>
                </li>
                <li class="hover-bg p-2 rounded-3 trasition my-2">
                    <a href="{{route('drinks.admin')}}" class="text-decoration-none fs-4 text-light trasition">
                    <i class="bi bi-cup-fill"></i> <span class="fw-medium">Drinks</span>
                    </a>
                </li>
            @elseif (Auth::user()->role === 'cashier')
                <li class="hover-bg p-2 rounded-3 transition my-2">
                    <a href="{{ route('dashboard.cashier') }}" class="text-decoration-none fs-4 text-light transition">
                        <i class="bi bi-house-door-fill"></i> <span class="fw-medium">Dashboard</span>
                    </a>
                </li>
                <li class="hover-bg p-2 rounded-3 transition my-2">
                    <a href="{{ route('order.cashier') }}" class="text-decoration-none fs-4 text-light transition">
                        <i class="bi bi-house-door-fill"></i> <span class="fw-medium">Order</span>
                    </a>
                </li>
            @endif

        </ul>
      </menu>

      <!-- Logout at the bottom -->
      <li class="list-unstyled p-2 rounded-3 my-2 bg-danger mt-auto" style="cursor: pointer;">
        <a href="" class="text-decoration-none fs-4 text-light">
          <i class="bi bi-box-arrow-left"></i> <span class="fw-medium">Logout</span>
        </a>
      </li>

    </div>
</aside>
