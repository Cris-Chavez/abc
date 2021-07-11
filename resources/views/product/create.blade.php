@extends('home')

@section('title','Crear Producto')


@section('content')
<div class="xp-contentbar">

    <!-- Start XP Row -->
    <div class="row"> 

        <div class="col-md-12 col-lg-12 col-xl-12">
           <!-- Header and Footer Card -->  
            <div class="card m-b-30">
                <h5 class="card-header">Creación de Productos</h5>
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

                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">                                                                    
                                <label for="name">Nombre:</label>
                                <div class="input-group mb-3">                                    
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nombre del producto" value="{{ old('name') }}">                                        
                                </div>
                            </div> 

                            <div class="col-md-3">
                                <label for="presentation">Presentación:</label>
                                <select class="form-control @error('presentation') is-invalid @enderror" name="presentation">
                                    <option disabled selected>Seleccione...</option>                                    
                                    <option value="litro">Litro</option>
                                    <option value="12 onzas">12 onzas</option>                                    
                                    <option value="Galón">Galón</option>                                    
                                    <option value="Vaso">Vaso</option>                                    
                                </select>                         
                            </div>    

                            <div class="col-md-3">                                                                    
                                <label for="volume">Volumen:</label>
                                <div class="input-group mb-3">                                    
                                    <input type="number" class="form-control @error('volume') is-invalid @enderror" id="volume" name="volume" placeholder="Volumen" value="{{ old('volume') }}">                                        
                                    <label>mts3</label>
                                </div>
                            </div>

                        </div>{{-- End row --}}

                        <br>

                        <div class="row">                                
                            
                            <div class="col-md-4">                                                                    
                                <label for="quantity">Cantidad por caja:</label>
                                <div class="input-group mb-3">                                    
                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="Cantidad" value="{{ old('quantity') }}">                                                                            
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto</label>
                                    <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="avatar" id="avatar" accept="image/*">
                                        <label class="custom-file-label" for="exampleInputFile">Seleccione una imagen</label>
                                    </div>
                                    </div>
                                </div>
                                {{-- @error('role')
                                        <strong class="text-red">{{ $message }}</strong>                          
                                    @enderror  --}}
                            </div>
                           
                            <div class="col-md-4">
                                <div class="widget-user-image" style="text-align: center">
                                    <img class="rounded-circle mx-auto d-block" id="imagePreview" width="140" height="140" src="{{ asset('storage\img\product\no-product.png') }}" alt="User Avatar">
                                </div>

                            </div>

                        </div> {{-- End row --}}                           

                        <hr />
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success">Agregar Producto</button> 
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

    
@endsection

