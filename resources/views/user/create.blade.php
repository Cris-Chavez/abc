@extends('home')

@section('title','Crear Usuario')


@section('content')
<div class="xp-contentbar">

    <!-- Start XP Row -->
    <div class="row"> 

        <div class="col-md-12 col-lg-12 col-xl-12">
           <!-- Header and Footer Card -->  
            <div class="card m-b-30">
                <h5 class="card-header">Creación de Usuario</h5>
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

                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6">                                                                    
                                <label for="firstName">Nombres:</label>
                                <div class="input-group mb-3">                                    
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nombres del usuario" value="{{ old('name') }}">                                        
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <label for="lastName">Apellidos:</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName" placeholder="Apellidos del usuario" value="{{ old('lastName') }}">
                                </div>                            
                            </div>                                    
                                                
                        </div>{{-- End row --}}

                        <div class="row">          
                            
                            <div class="col-md-4">
                                <label for="email">Email:</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Correo electrónico del usuario" value="{{ old('email') }}">
                                </div>                              
                            </div>

                            <div class="col-md-4">
                                <label for="dpi">DPI:</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('dpi') is-invalid @enderror" id="dpi" name="dpi" placeholder="DPI del usuario" value="{{ old('dpi') }}">
                                </div>                            
                            </div>

                            <div class="col-md-4">
                                <label for="phone">Teléfono:</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Teléfono del usuario" value="{{ old('phone') }}">
                                </div>                             
                            </div>                       
                                                
                        </div>{{-- End row --}}

                        <div class="row">

                            <div class="col-md-4">
                                <label for="address">Dirección:</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Dirección del usuario" value="{{ old('address') }}">
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
                                    <img class="rounded-circle mx-auto d-block" id="imagePreview" width="140" height="140" src="{{ asset('storage\img\avatar\no-photo.jpg') }}" alt="User Avatar">
                                </div>

                            </div>                    

                        </div>{{-- End row --}}

                        <hr />
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success">Agregar Empleado</button> 
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