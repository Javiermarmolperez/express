@extends('dashboardAdmin.dashboard')

@section('content')

<section>
    <main>
        <div class="container-fluid">
            <div class="card mb-4">
                <script type="text/javascript">
                    function changeColor(x)
                    {
                        if(x.style.background=="black")
                        {
                            x.style.background="#fff";
                        }else{
                            x.style.background="#449d44";
                        }
                        return false;
                    }
                </script>
                <style>
                    .btn-success {
                        color:black;
                        background-color: white;
                        border-color: #4cae4c;
                    }

                    .btn-success:hover {
                        color: black;
                        background-color: #449d44;
                        border-color: #398439;
                    }

                    .btn-success:active:hover {
                        color: #fff;
                        background-color: #398439;
                        border-color: #255625;
                    }
                    .btn-success:visited {
                        color: #fff;
                        background-color: red;
                        border-color: #255625;
                    }
                </style>

                <div>

                </div>
                <div class="card-body">



                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-dark">

                                <th>Producto</th>
                                <th>Peso</th>

                                </thead>
                                <tbody>
                                @foreach($arrayProducts as $product)
                                    <tr>

                                        <td  onclick = "changeColor(this);" id="mb" class="btn-success">{{$product[0]->name}}</td>
                                        <td>{{$product[2]}}{{$product[1]->name}}</td>

                                    </tr>
                                @endforeach
                                </tbody>

                               </table>
                        </div>

                </div>
            </div>
            <footer>
                <form method="POST" action="{{ route('pedidos.update',$code) }}"  role="form">

                    {{ csrf_field() }}

                    <input name="_method" type="hidden" value="PATCH">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <input type="submit"  value="Terminado" class="btn-lg btn-danger btn-block">

                            <a href="{{ route('pedidos.index') }}" style="text-align: center" class="btn-lg btn-info btn-block" >Atrás</a>

                        </div>
                    </div>
                </form>

            </footer>

        </div>
        </div>
    </main>

</section>
@endsection
