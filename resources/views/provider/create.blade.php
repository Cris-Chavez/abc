@extends('home')

@section('title','Crear Proveedor')


@section('content')
<div class="xp-contentbar">

    <!-- Start XP Row -->
    <div class="row"> 

        <div class="col-md-12 col-lg-12 col-xl-12">
           <!-- Header and Footer Card -->  
            <div class="card m-b-30">
                <h5 class="card-header">Creación de Proveedor</h5>
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

                    <form action="{{ route('provider.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">                                                                    
                                <label for="firstName">Nombres:</label>
                                <div class="input-group mb-3">                                    
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nombre del proveedor" value="{{ old('name') }}">                                        
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <label for="email">Email:</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Correo electrónico del proveedor" value="{{ old('email') }}">
                                </div>                              
                            </div>                                    
                                                
                        </div>{{-- End row --}}

                        <div class="row">                        

                            <div class="col-md-6">
                                <label for="address">Dirección:</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Dirección del proveedor" value="{{ old('address') }}">
                                </div>                             
                            </div>

                            <div class="col-md-6">
                                <label for="phone">Teléfono:</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Teléfono del proveedor" value="{{ old('phone') }}">
                                </div>                             
                            </div>                       
                                                
                        </div>{{-- End row --}}


                        <hr />
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success">Agregar Proveedor</button> 
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
