@extends('layouts.cms')


@section('content')

<div class="container" style="padding: 50px;">
    
                        <div class="row" style="text-align: right;">
                            <div  style="font-size: larger;">
                               
                            </div>
                        </div>  
        <div class="row col-md-12"> 
        
     
            @if($posts)

                @foreach($posts as $post)
                    
             
        
                <div class="col-md-4">
                    
                    <div class="card-product">      
                       <div class="title">
                           <b> {{ $post->title }} </b>  
                        </div>
                        <div class="ck-content">
                            {!! html_entity_decode($post->description) !!} 
                        </div>
                        <br>                 
                                                                     
                    </div>
                </div>
            

                @endforeach


            @endif
        </div>
    </div>
</div>          

<style>
    .ck-content img {
        max-width: 300px; /* Maximum width for the displayed image */
        max-height: 350px; /* Maximum height for the displayed image */
    }
</style>
@endsection