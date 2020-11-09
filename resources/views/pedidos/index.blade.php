@extends('dashboardAdmin.dashboard')

@section('content')

<section>
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                <li class="breadcrumb-item active">Pedidos</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Tabla de pedidos
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>

                            <th>Ver</th>
                            <th>Cliente</th>
                            <th>Observaciones</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Estado del pedido</th>





                            </thead>

                            <tbody>

                            @foreach($pedidos as $pedido)
                                @if ($pedido->name != 'ejemplo' AND $pedido->status != 'Terminado')

                                    <td><a href="/pedidos/{{$pedido->code}}" target="_self" class="btn-descargar" ><i class="fas fa-download"></i><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                    <td>{{$pedido->name}}</td>
                                    <td>{{$pedido->observations}}</td>
                                    <td>{{$pedido->address}}</td>
                                    <td>{{substr($pedido->phoneNumber,-9)}}</td>
                                    <td>{{$pedido->status}}</td>


                                @endif

                            </tbody>
                                @endforeach


                        </table>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </main>

</section>
@endsection
