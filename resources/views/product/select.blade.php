@foreach ($products as $product)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $product->sku }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->presentation }}</td>
        <td>{{ $product->volumen }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->price }}</td>
    </tr>
    
@endforeach    