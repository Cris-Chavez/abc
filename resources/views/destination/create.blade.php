@extends('home')

@section('title','Crear Destino')


@section('content')
<div class="xp-contentbar">

    <!-- Start XP Row -->
    <div class="row"> 

        <div class="col-md-12 col-lg-12 col-xl-12">
           <!-- Header and Footer Card -->  
            <div class="card m-b-30">
                <h5 class="card-header">Creación de Destinos</h5>
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

                    <form action="{{ route('destination.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-3">
                                <label for="type">Tipo:</label>
                                <select class="form-control @error('type') is-invalid @enderror" name="type">
                                    <option disabled selected>Seleccione...</option>                                    
                                    <option value="Aeropuerto">Aeropuerto</option>
                                    <option value="Puerto">Puerto</option>                                    
                                </select>                         
                            </div>

                            <div class="col-md-5">                                                                    
                                <label for="name">Nombre:</label>
                                <div class="input-group mb-3">                                    
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nombre del destino" value="{{ old('name') }}">                                        
                                </div>
                            </div> 

                            <div class="form-group col-md-4">
                                <label for="type">País:</label>
                                <select class="form-control @error('country') is-invalid @enderror" name="country">
                                    <option disabled selected>Seleccione...</option>   
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->name }}">{{ $country->name  }}</option>                                        
                                    @endforeach                                                         
                                </select>                         
                            </div>                                 
                                                
                        </div>{{-- End row --}}

                        <hr />
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success">Agregar Destino</button> 
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
