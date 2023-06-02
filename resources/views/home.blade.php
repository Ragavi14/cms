@extends('layouts.cms')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            

              <div class="col-md-8">      
                  <h2> {{ __('Welcome   ') }} 
                      {{ Auth::user()->name }}  </h2>
              </div>
                  
                
                      
              
        </div>
    </div>
</div>
@endsection