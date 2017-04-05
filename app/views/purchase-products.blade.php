<h3>Productos</h3>
@if (count($data['details']))
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
        @foreach ($data['details'] as $detail)
            <tr>
                <td>{{ $detail->productname }}</td>
                <td>{{ $detail->brand }}</td>
                <td>{{ $detail->category }}</td>
                <td>Q. {{ number_format($detail->price, 2) }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>
                    {{ link_to('/edit-product/'.$detail->id,'Editar &#x270e;') }}
                    {{-- link_to('/delete-product/'.$detail->id,'Borrar &#x2718;') --}}
                </td>
            </tr>
        @endforeach
        <tbody>
    </table>
@else
    <p>No hay productos</p>
@endif

