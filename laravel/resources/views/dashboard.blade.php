@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7" >
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
               
                    <div class="card-header  border-0" >
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('To find playmates') }}</h3>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="card-body" >              
                        <div class="mt-10"  style="background-image: url(../clan/img/worldmap_freya.jpg); 
                        background-size: cover;
                        background-position: center topo;
                        opacity: 0.7;">
                        <h6 class="heading-small  mb-4">{{ __('Sobre') }}</h6>
                        <h1>Trabalho Final de Web</h1>
                        <h2>"Clan"  </h2>
                        <br>  <br>  <br>  <br>
                        </div>

                        <div class="pl-lg-4">

                            <div class="">
                            <p > <font color="black"> Trabalho foi focado em fazer uma plataforma para que pessoas que jogão online, independente de qual, tem como emcontrar pessoas conhecidas que ja jogaram antes juntas em um mesmo clan.
                            </font></p>
                            <p>A intenção é que clans com maior número de membros tenham onde seus jogadores colocarem oque estão jogando atualmente, essa necessidade se faz que uma vez que uma pessoa migra de um jogo para outro se torna dificl ter o paradeiro dela essa ferramenta tem exatamente este objetivo</p>
                            </div>                             
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      

    </div>
            
         @auth
         @include('layouts.footers.auth')
         @else
         {{-- @include('layouts.footers.guest') --}}
         @endauth   
      
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush