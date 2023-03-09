
<div class="row">
    <div class="col-sm">
        <div class="table-wrap">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead >
                    <tr>
                        <th>IP</th>
                        <th>Porcentaje Sunset</th>
                        <th>codigo</th>
                        <th>descuento</th>
                        <th>Fecha Registro </th>
                        <th>Imagen </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($usuarios_descuentos as $key => $descuento)
                        <tr>
                            <td>{{ $descuento->ip_user }} </td>
                            <td>{{ $descuento->porcentaje_sunset }} </td>
                            <td>{{ $descuento->codigo}} </td>
                            <td>{{ $descuento->descuento}} </td>
                            <td>{{ $descuento->fecha_registro}} </td>
                            {{-- <td>{{ asset('images/'.$descuento->image) }}</td> --}}
                            <td><a href="/images/{{ $descuento->image }}" target="_blank">Ver im&aacute;gen</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted"><span>No se encontraron resultados</span></td>
                        </tr>
                    @endforelse

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5">{{ $usuarios_descuentos->links() }}</td>
                        <td><span>Total: </span> <b>{{ $usuarios_descuentos->total() }}</b></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
