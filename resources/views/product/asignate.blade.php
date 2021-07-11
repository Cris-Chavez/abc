@extends('home')

@section('title','Asignación de precios y proveedores')


@section('content')
<div class="xp-contentbar">

    <!-- Start XP Row -->
    <div class="row"> 

        <div class="col-md-12 col-lg-12 col-xl-12">
           <!-- Header and Footer Card -->  
            <div class="card m-b-30">
                <h5 class="card-header">Creación de Precios</h5>
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

                   
                        <div class="row">                             

                            <div class="col-md-6">
                                <label for="product">Producto:</label>
                                <select class="form-control @error('product') is-invalid @enderror" name="product" id="product">
                                    <option disabled selected>Seleccione...</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->sku.' - '.$product->name }}</option>
                                        
                                    @endforeach                                    
                                </select>                         
                            </div>   

                            <input type="hidden" id="url" value="{{ route('product.asignacion') }}">
                            
                            <div class="col-md-6">
                                <br>
                                <div class="input-group mb-3 pt-2">
                                    <button type="button" class="btn btn-primary" onclick="asignate()"><i class="fa fa-plus-circle"></i> Asignar</button> 
                                </div>
                            </div>                            

                        </div>{{-- End row --}}

                        <hr>

                        <div class="contenedor d-none">
                            <div class="row">      
                            
                                <div class="col-md-6">
                                    <label for="provider">Proveedor:</label>
                                    <select class="form-control @error('provider') is-invalid @enderror" name="provider">
                                        <option disabled selected>Seleccione...</option>
                                        @foreach ($providers as $provider)
                                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>                                        
                                        @endforeach                                    
                                    </select>                         
                                </div>
                                
                                <div class="col-md-3">                                                                    
                                    <label for="cost">Costo:</label>
                                    <div class="input-group mb-3">                                    
                                        <input type="number" class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost" placeholder="Cantidad" value="{{ old('cost') }}">                                                                            
                                    </div>
                                </div>
    
                                <div class="col-md-3">
                                    <br>
                                    <div class="input-group mb-3 pt-2">
                                        <button type="button" class="btn btn-primary" onclick="asignate()"><i class="fa fa-plus-circle"></i> Asignar</button> 
                                    </div>
                                </div>
    
                            </div> {{-- End row --}}

                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">No.</th>
                                            <th>Proveedor</th>
                                            <th>Costo</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbody">
                                        </tbody>
                                    </table>
                                </div>
                        
                                <hr />
                            </div>

                        </div>                        
                        
                        {{-- <div class="row">
                            <button type="submit" class="btn btn-success">Agregar Producto</button> 
                        </div>                                           
                    </form> --}}


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
        function readImage (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result); // Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
            }
            }

        $("#avatar").change(function () {
            // Código a ejecutar cuando se detecta un cambio de archivO
            readImage(this);    
        });
    </script>

    <script>

        function asignate(){

            $('#product').attr('disabled',true);
            $('.contenedor').removeClass('d-none');
            var url = $('#url').val();

            alert(url);

            $.ajax({
                    url : url,
                    cache: false,
                    success: function(data)
                    {         
                    if (data.success)
                    {
                        $('#tbody').html(data.response);
                        // alert(data.response);                        
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

