<x-layout>
    <table border="1" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Product</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productdetails as $customer)
                @foreach ($customer->products as $product)
                    <tr>
                        <td><a href="{{route('customer-info',$product->id)}}">{{ $customer->customer_name }}</a></td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</x-layout>
