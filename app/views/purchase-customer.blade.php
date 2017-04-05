<h3>Datos del cliente</h3>
<ul>
    <li><strong>Nombre:</strong> {{ $data['purchase']->customer->customername }}</li>
    <li><strong>Teléfonos:</strong> {{ $data['purchase']->customer->phone }}</li>
    <li><strong>Dirección:</strong> {{ $data['purchase']->customer->address }}</li>
    <li><strong>Email:</strong> {{ $data['purchase']->customer->email }}</li>
    <li><strong>NIT:</strong> {{ $data['purchase']->customer->nit ? $data['purchase']->customer->nit : 'C/F' }}</li>
</ul>


