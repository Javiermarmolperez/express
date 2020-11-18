@extends('dashboardAdmin.dashboard')

@section('content')

<section>
    <main>
        <div class="container-fluid">
            <a style="margin-bottom: 20px" type="button" class="btn-lg btn-success btn-block" href="/ftp">
                Actualizar pedidos
            </a>
            @foreach($pedidos as $pedido)
                @if ($pedido->name != 'ejemplo' AND $pedido->status != 'Terminado')
            <a class="card mb-4"  href="/pedidos/{{$pedido->code}}" target="_self">
                <div class="card-body col">
                    <div class="row">
                        <div class="col">
                            <p>{{$pedido->name}}</p>
                        </div>
                        <div class="col">
                            <p>{{substr($pedido->phoneNumber,-9)}}</p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <p>{{$pedido->address}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p>{{$pedido->observations}}</p>
                        </div>
                    </div>


                    </div>
                </a>
                @endif
            @endforeach
            </div>
        </div>
        </div>
    </main>
</section>
@endsection
