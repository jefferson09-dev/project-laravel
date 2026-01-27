@extends('startbootstrap.model')
@section('body')

           @include('startbootstrap.components.navbar') 
        <!--  -->
        <div id="layoutSidenav">
            @include('startbootstrap.components.sidemenu') 
            <!--  -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        @include('startbootstrap.components.cardsarea') 
                        <!--  -->
                        @include('startbootstrap.components.graphicarea')
                        <!--  -->
                        @include('startbootstrap.components.table')
                        <!--  -->
                    </div>
                </main>
                @include('startbootstrap.components.footer')
                <!--  -->
            </div>
        </div>
        
@endsection
