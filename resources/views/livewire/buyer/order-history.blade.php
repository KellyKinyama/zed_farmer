<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h1 class="mb-4">🛍️ My Order History</h1>
            <hr>

            @if ($orders->isEmpty())
                <div class="alert alert-info text-center" role="alert">
                    You haven't placed any orders yet. <a href="{{ route('product.index') }}" class="alert-link">Start Shopping!</a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover shadow-sm bg-white rounded-3">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col"># Order ID</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price Paid</th>
                                <th scope="col">Status</th>
                                <th scope="col">Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>
                                        <a href="{{ route('product.show', $order->product) }}" class="text-decoration-none text-primary">
                                            {{ $order->product->title ?? 'Product Deleted' }}
                                        </a>
                                    </td>
                                    <td>${{ number_format($order->total_paid, 2) }}</td>
                                    <td>
                                        <span class="badge {{ $order->status === 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>