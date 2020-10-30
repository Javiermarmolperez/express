@extends('dashboardAdmin.dashboard')

@section('content')

<section>
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Lista de Pedidos</h1>

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
                            <th></th>
                            <th></th>
                            <th>Tienda</th>
                            <th>Código</th>
                            <th>Fecha pedido</th>
                            <th>Observaciones</th>
                            <th>fromApp</th>
                            <th>ID punto de envío</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Estado del pedido</th>
                            <th>Ver</th>




                            </thead>

                            <tbody>
                            @foreach($pedidos as $pedido)

                            <td><td>
                            <td>{{$pedido->name}}</td>
                            <td>{{$pedido->code}}</td>
                            <td>{{$pedido->orderDate}}</td>
                            <td>{{$pedido->observations}}</td>
                            <td>{{$pedido->fromApp}}</td>
                            <td>{{$pedido->deliveryPointId}}</td>
                            <td>{{$pedido->address}}</td>
                            <td>{{$pedido->phoneNumber}}</td>
                            <td>{{$pedido->status}}</td>
                            <td><a href="/pedidos/{{$pedido->code}}" class="btn-descargar" target="_blank"><i class="fas fa-download"></i><span class="glyphicon glyphicon-eye-open"></span></a></td>




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
