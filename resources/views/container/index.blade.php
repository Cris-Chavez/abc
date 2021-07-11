@extends('home')

@section('title','Listado de contenedores')

@section('css')

<!-- Start CSS -->
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Responsive Datatable CSS -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    
    
@endsection

@section('content')
<div class="xp-contentbar">

    <!-- Start XP Row -->
    <div class="row"> 

        <div class="col-md-12 col-lg-12 col-xl-12">
           <!-- Header and Footer Card -->  
            <div class="card m-b-30">
                <h5 class="card-header">Listado de Contenedores</h5>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">No.</th>
                                <th>Destino</th>
                                <th>Producto</th>
                                <th>Proveedor</th>
                                <th>Cantidad</th>
                                <th>Fecha probable</th>
                                <th>Fecha de arribo</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($containers as $container)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $container->destination->name }}</td>
                                    <td>{{ $container->product->name }}</td>
                                    <td>{{ $container->provider->name }}</td>
                                    <td>{{ $container->quantity }}</td>
                                    <td>{{ $container->possible_date }}</td>
                                    <td>{{ $container->arrival_date }}</td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <!-- Header and Footer Card -->    
        </div>
         
    </div>
    <!-- End XP Row -->

</div>
    
@endsection

@section('js')

    <!-- Required Datatable JS -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Buttons Examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    
    <!-- Responsive Examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- End JS -->

    <script>
        $(function () {          
          $('#table').DataTable({
            
            responsive: true,
            autowith: false,

            "language":{
                "lengthMenu": "Mostrar _MENU_ datos por página",
                "zeroRecords": "Nada encontrado - Disculpa",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No existen datos",
                "infoFiltered": "(Filtrado de un total de _MAX_ datos totales)",
                "search": "Buscar:",
                "paginate":{
                    next : "Anterior",
                    previous: "Siguiente"
                }
            },
            dom: '<"row"<"col-md-6 text-left"B><"col-md-6 text-right"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            // dom: 'Bftip',
            "buttons": [
                {
                    extend: "excel",
                    text: '<i class="fa fa-file-excel-o"></i>',
                    className: "btn-success btn-sm mr-1",
                    exportOptions:{
                        columns: [0,1,2,3,4,5,6]
                    },
                    title: "Contenedores"
                },
                {
                    extend: "pdf",
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    className: "btn-danger btn-sm mr-1",
                    exportOptions:{
                        columns: [0,2,3,4,5,6]
                    },
                    messageTop: 'Listado de Contenedores',
                    title: "Contenedores"
                },           
                {
                    extend: "print",
                    text: '<i class="fa fa-print"></i>',
                    className: "btn-info btn-sm",
                    exportOptions:{
                        columns: [0,1,2,3,4,5,6]
                    }
                }
            ]
          });
        });
    </script>

    
@endsection