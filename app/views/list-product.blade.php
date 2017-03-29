<h2>Productos</h2>

@if ($data['user']->usertype == 1)
    @include('add-product')
@endif

<h3>Listado</h3>
@if (count($data['products']))
    <table>
        <thead>
        <tr>
            <th>Producto</th>
            <th>Marca</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data['products'] as $product)
            <tr>
                <td>{{ $product->productname }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->category }}</td>
                <td>Q. {{ number_format($product->price, 2) }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    {{ link_to('/edit-product/'.$product->id,'Editar &#x270e;') }}
                    {{-- link_to('/delete-product/'.$product->id,'Borrar &#x2718;') --}}
                </td>
            </tr>
        @endforeach
        <tbody>
    </table>
@else
    <p>No hay productos</p>
@endif