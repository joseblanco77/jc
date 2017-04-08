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
            <!-- th>Opciones</th -->
        </tr>
        </thead>
        <tbody>
        <?php $total = 0; ?>
        @foreach ($data['details'] as $detail)
            <?php $total = $total + ($detail->price * $detail->quantity); ?>
            <tr>
                <td>{{ $detail->productname }}</td>
                <td>{{ $detail->brand }}</td>
                <td>{{ $detail->category }}</td>
                <td style="text-align: right;">Q. {{ number_format($detail->price, 2) }}</td>
                <td>{{ $detail->quantity }}</td>
                <!-- td>
                    {{ link_to('/edit-product/'.$detail->id,'Editar &#x270e;') }}
                    {{-- link_to('/delete-product/'.$detail->id,'Borrar &#x2718;') --}}
                </td -->
            </tr>
        @endforeach
        <tr>
            <td colspan="3">Total</td>
            <td style="text-align: right;">Q. {{ number_format($total, 2) }}</td>
            <td></td>
        </tr>
        <tbody>
    </table>
@else
    <p>No hay productos</p>
@endif

