@extends('dashboardAdmin.dashboard')

@section('content')

    <section>
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Lista de Tiendas</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                    <li class="breadcrumb-item active">Tiendas</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Tiendas
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                <th>Usuario</th>

                                <th>Tienda</th>

                                <th>Pedidos</th>


                                </thead>
                                <tbody>


                                    @forelse($tiendas as $tienda)


                                        <tr>


                                            <td>{{$tienda->id}}</td>
                                            <td>{{$tienda->name}}</td>
                                            <td>{{$tienda->pedidos_id}}</td>


                                            </td>

                                        </tr>
                                    @empty
                                        <div>
                                            <p>There were no comments available.</p>
                                        </div

                                    @endforelse


                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>

            </div>
            </div>
        </main>

    </section>
@endsection
