<h2>Clientes</h2>

@include('add-customer')

<h3>Listado</h3>
@if (count($data['customers']))
    <table>
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>E-mail</th>
            <th>NIT</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data['customers'] as $customer)
            <tr>
                <td>{{ $customer->customername }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->nit }}</td>
                <td>
                    {{ link_to('/edit-customer/'.$customer->id,'Editar &#x270e;') }}
                    {{-- link_to('/delete-customer/'.$customer->id,'Borrar &#x2718;') --}}
                </td>
            </tr>
        @endforeach
        <tbody>
    </table>
@else
    <p>No hay clientes</p>
@endif