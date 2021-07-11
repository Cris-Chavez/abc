@extends('home')

@section('title','Crear Contenedor')


@section('content')
<div class="xp-contentbar">

    <!-- Start XP Row -->
    <div class="row"> 

        <div class="col-md-12 col-lg-12 col-xl-12">
           <!-- Header and Footer Card -->  
            <div class="card m-b-30">
                <h5 class="card-header">Creación de Contenedores</h5>
                <div class="card-body">
                    @if ($errors->any())                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible">                                
                                    <h5><i class="fa fa-close"></i> ERROR! <small>Los campos marcados son obligatorios.</small></h5>
                                </div>
                            </div>
                        </div>                        
                    @endif

                    <form action="{{ route('container.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="destination">Destino:</label>
                                <select class="form-control @error('destination') is-invalid @enderror" name="destination">
                                    <option disabled selected>Seleccione...</option>                                    
                                    @foreach($destinations as $destination)
                                        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                    @endforeach                                                                       
                                </select>                         
                            </div> 

                            <input type="hidden" id="url" value="{{ route('container.getProviders') }}">

                            <div class="col-md-4">
                                <label for="product">Producto:</label>
                                <select class="form-control @error('product') is-invalid @enderror" name="product" id="product" onchange="select()">
                                    <option disabled selected>Seleccione...</option>                                    
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach                                                                       
                                </select>                         
                            </div>

                            <div class="col-md-4">
                                <label for="destination">Proveedor:</label>
                                <select class="form-control @error('provider') is-invalid @enderror" name="provider" id="provider" disabled>
                                    <option disabled selected>Seleccione...</option>                                                                                                                                               
                                </select>                         
                            </div>                           
                                                
                        </div>{{-- End row --}}
                        <br>

                        <div class="row">  
                            
                            <div class="col-md-3">
                                <label for="quantity">Cantidad:</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="Cantidad de productos" value="{{ old('quantity') }}">
                                </div>
                                </select>                         
                            </div>
                            
                            <div class="col-md-4">
                                <label for="email">Posible fecha de arribo:</label>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" id="possible_date" name="possible_date" value="{{ old('possible_date') }}">
                                </div>                              
                            </div>                     
                                                
                        </div>{{-- End row --}}

                        <hr />
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success">Agregar Contenedor</button> 
                        </div>{{-- End row --}}                                             
                    </form>


                </div>
            </div>
            <!-- Header and Footer Card -->    
        </div>
         
    </div>
    <!-- End XP Row -->

</div>
    
@endsection

@section('js')

<script>

    function select(){

        let url = $('#url').val();
        let product = $('#product').val();
        $('#provider').attr('disabled',true);
        $('#provider').html('');



        $.ajax({
                    url : url,
                    cache: false,
                    type: 'get',
                    dataType: 'json',
                    data: 'product='+product,
                    success: function(data)
                    {         
                    if (data.success)
                    {
                        $('#provider').html(data.response);
                        $('#provider').attr('disabled',false);
                        
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
