<h2>Clientes</h2>

@include('add-customer')

<h3>Listado</h3>
@if (count($data['customers']))
    <table>
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Opciones</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>E-mail</th>
            <th>NIT</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data['customers'] as $customer)
            <tr>
                <td>{{ $customer->customername }}</td>
                <td>
                    {{ link_to('/edit-customer/'.$customer->id,'Editar &#x270e;') }}
                    {{-- link_to('/delete-customer/'.$customer->id,'Borrar &#x2718;') --}}
                </td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->nit ? $customer->nit : 'C/F' }}</td>
                <td>
                    {{ link_to('/create-purchase/'.$customer->id,'Crear nueva compra &#x27a4;') }}
                </td>
            </tr>
        @endforeach
        <tbody>
    </table>
@else
    <p>No hay clientes</p>
@endif