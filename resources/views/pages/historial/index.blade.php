@extends('layouts.app')
@section('content')

    <div class="app-page-title app-page-title-simple">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>
                    <div class="page-title-head center-elem">
                        <span class="d-inline-block pr-2">
                            <i class="fa fa-users opacity-6"></i>
                        </span>
                        <span class="d-inline-block">Historial Imagenes</span>
                    </div>
                    <div class="page-title-subheading opacity-10">
                        <nav class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">

                                <li class="breadcrumb-item">
                                    <a>Imagenes</a>
                                </li>
                                <li class="active breadcrumb-item" aria-current="page">
                                    Listado
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body p-0">
            <div id="table-content">

                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Valor Sunset</th>
                                        <th>fecha proceso</th>
                                        <th>imagen</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($historial_data as $historial)
                                        <tr>
                                            <td>{{ $historial->id }}</td>
                                            <td>{{ $historial->porcentaje_sunset }}</td>

                                            <td>{{ $historial->created_at }}</td>

                                            {{-- <td>{{ asset('images/'.$historial->image) }}</td> --}}
                                            <td><a href="/images/{{ $historial->image }}" target="blank">Ver imagen</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="4">{{ $historial_data->links()}}</td>
                                        <td><span>Total: </span> <b>{{ $historial_data->total() }}</b></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
        </div>
    </div>




@endsection

@push('scripts')


    <!-- Validations JS -->
    @include('scripts-group.jquery-validation')
@endpush
