@extends('dashboardAdmin.dashboard')

@section('content')

<section>
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Detalle pedido</h1>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                <li class="breadcrumb-item active">Pedidos</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Detalle pedido
                </div>
                <div class="card-body">


                            @foreach($allOrdersProducts as $pedido)
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                <th>Id</th>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Peso</th>

                                </thead>
                                <tbody>
                                @foreach($arrayProducts as $product)
                                    <tr>

                                        <td>{{$product[0]->id}}</td>
                                        <td>{{$product[0]->code}}</td>
                                        <td>{{$product[0]->name}}</td>
                                        <td>{{$product[1]->id}}{{$product[1]->name}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                               <thead class="thead-light">
                                <th>Quantity</th>
                                <th>precio</th>
                                <th>taxPercent</th>
                                <th>equivalencePercent</th>
                                <th>tax</th>
                                <th>equivalence</th>
                                <th>Subtotal</th>
                                <th>Total</th>
                               </thead>
                            <tbody>


                                <td>{{$pedido->quantity}}</td>
                                <td>{{$pedido->price}}</td>
                                <td>{{$pedido->taxPercent}}</td>
                                <td>{{$pedido->equivalencePercent}}</td>
                                <td>{{$pedido->tax}}</td>
                                <td>{{$pedido->equivalence}}</td>
                                <td>{{$pedido->subTotal}}</td>
                                <td>{{$pedido->total}}</td>
                            </tbody>

                            </table>
                        </div>
                            @endforeach




                </div>
            </div>

        </div>
        </div>
    </main>

</section>
@endsection
