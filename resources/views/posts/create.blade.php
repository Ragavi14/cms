@extends('layouts.cms')
@extends('layouts.editor')


@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-12 text-right">
                <a href="{{ url('post') }}" class="btn btn-danger"> Back </a>
            </div>
        </div>

        <form action="{{url('save-post')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-sm-12 col-12 m-auto">

                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('failed'))
                    <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('failed') }}
                        </div>
                    @endif

                    <div class="card shadow">

                        <div class="card-header">
                            <h4 class="card-title"> CK Editor Example in Laravel 8 </h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label> Title </label>
                                <input type="text" class="form-control" name="title" placeholder="Enter the Title">
                            </div>
                            <div class="form-group">
                                <label> Description </label>
                                <textarea class="form-control editor" id="description" placeholder="Enter the Description" name="description"></textarea>
                            </div>
                        </div>

                        <div class="card-footer"> 
                            <button type="submit" class="btn btn-success"> Save </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

 <!-- Script -->
   
 <script type="text/javascript">

ClassicEditor
      .create( document.querySelector( '.editor' ),{ 
            ckfinder: {
                  uploadUrl: "{{route('uploadFile').'?_token='.csrf_token()}}",
            }
      } )
      .then( editor => {

            console.log( editor );

      } )
      .catch( error => {
            console.error( error );
      } );
</script>

@endsection

