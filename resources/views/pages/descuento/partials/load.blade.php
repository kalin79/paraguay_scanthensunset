
<div class="row">
    <div class="col-sm">
        <div class="table-wrap">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead >
                    <tr>
                        <th></th>
                        <th>Código</th>
                        <th>Descuento</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($descuentos as $key => $descuento)
                        <tr>
                            <td>{{ $key +1 }} </td>
                            <td>{{ $descuento->codigo }} </td>
                            <td>{{ $descuento->descuento}} </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted"><span>No se encontraron resultados</span></td>
                        </tr>
                    @endforelse

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2">{{ $descuentos->links() }}</td>
                        <td><span>Total: </span> <b>{{ $descuentos->total() }}</b></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
