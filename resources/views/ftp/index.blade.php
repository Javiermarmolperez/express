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
                            @forelse($arrayAllOrders as $file)

                            <list>
                                <li>
                                   {{basename($file)}}
                                </li>
                            </list>
                            @empty
                                <div>
                                    <p>There were no comments available.</p>
                                </div

                            @endforelse




                        </table>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </main>

</section>
@endsection
