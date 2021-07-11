@extends('home')

@section('title','Catálogo')

@section('css')

<!-- Start CSS -->
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Responsive Datatable CSS -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- jstree CSS -->
    <link href="{{ asset('assets/plugins/jstree/jstree.min.css') }}" rel="stylesheet" type="text/css">
    
    
@endsection

@section('content')
<div class="xp-contentbar">

    <!-- Start XP Row -->
    <div class="row"> 

        <div class="col-md-12 col-lg-12 col-xl-12">
           <!-- Header and Footer Card -->  
            <div class="card m-b-30">
                <h5 class="card-header">Catálogo</h5>
                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Proveedor:</label>
                        <div class="col-md-4">
                            <select class="form-control @error('presentation') is-invalid @enderror" name="presentation" id="provider">
                                <option disabled selected>Seleccione...</option>
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>                                    
                                @endforeach                                                           
                            </select> 
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" onclick="find()">Listar</button> 
                        </div>
                        <input type="hidden" name="url" id="url" value="{{ route('product.search') }}">
                    </div>
                    <br>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">No.</th>
                                <th>sku</th>
                                <th>Nombre</th>
                                <th>Presentación</th>
                                <th>Volumen</th>
                                <th>Cantidad por caja</th>
                                <th>Precio</th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>                            
                        </table>                       
                        
                    </div>
                    
                    <div class="row">
                        <div class="mx-auto d-none" id="xp-ajax-tree"></div>
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

<script src="{{ asset('assets/plugins/jstree/jstree.min.js') }}"></script>
<script src="{{ asset('assets/js/init/jstree-init.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- End JS -->

    <script>

        function find(){
            
            let url = $('#url').val();
            let provider = $('#provider').val(); 
            $('#tbody').html();
            $('#xp-ajax-tree').removeClass('d-none');

            $.ajax({
                    url : url,
                    cache: false,
                    type: 'get',
                    dataType: 'json',
                    data: 'provider='+provider,
                    success: function(data)
                    {         
                    if (data.success)
                    {
                        $('#xp-ajax-tree').addClass('d-none');

                        $('#tbody').html(data.response);
                        // alert('ya llegamos');                        
                    }
                    else
                    {
                        alert('NO se han cargado los datos');
                    }
                    
                    // btn.text('Listar').attr('disabled', false);
                     },
                    error: function(d,m,r)
                    {
                    alert('ha ocurrido un error: '+r);   
                     }
                });

        }

    </script>
    
@endsection