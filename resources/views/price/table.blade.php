@foreach ($prices as $price)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $price->provider->name }}</td>
        <td>{{ $price->price }}</td>
    </tr>    
@endforeach
