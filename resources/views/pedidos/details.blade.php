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
                    <a style="padding-left: 150px" href="/pedidos">Volver</a>
                </div>

                <div>

                </div>
                <div class="card-body">


                            @foreach($allOrdersProducts as $pedido)
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-dark">

                                <th>Producto</th>
                                <th>Peso</th>

                                </thead>
                                <tbody>
                                @foreach($arrayProducts as $product)
                                    <tr>


                                        <td>{{$product[0]->name}}</td>
                                        <td>{{$product[1]->id}}{{$product[1]->name}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                               <!--<thead class="thead-light">
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>TaxPercent</th>
                                <th>EquivalencePercent</th>
                                <th>Tax</th>
                                <th>Equivalence</th>
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
                            </tbody>--->

                            </table>
                        </div>
                            @endforeach




                </div>
            </div>
            <footer>
                <form method="POST" action="{{ route('pedidos.update',$code) }}"  role="form">

                    {{ csrf_field() }}

                    <input name="_method" type="hidden" value="PATCH">

                    <div class="form-group">
                        <select name="name" class="form-control" id="name"  placeholder="Estado">
                            <option selected>Estado...</option>

                                <!--<option value="En proceso" >En proceso</option>-->
                                <option value="Terminado" >Terminado</option>

                        </select>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <input type="submit"  value="Actualizar" class="btn btn-success btn-block">

                            <a href="{{ route('pedidos.index') }}" class="btn btn-info btn-block" >Atrás</a>

                        </div>
                    </div>
                </form>

            </footer>

        </div>
        </div>
    </main>

</section>
@endsection
