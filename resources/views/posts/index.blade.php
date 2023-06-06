@extends('layouts.cms')
@extends('layouts.editor')


@section('content')

      <div class="container mt-4">
        <div class="row">
            <div class="col-xl-8" style="text-align: center;">
                <h3 class="text-right"> Post </h3>
            </div>

            <div class="col-xl-4 text-right">
                <a href="{{url('create-post')}}" class="btn btn-primary"> Add Post </a>
            </div>
        </div>

        @if(count($posts) > 0)
          <div class="table-responsive mt-4">
            <table class="table">
                <thead>
                <tr>
                        <th> Id </th>
                        <th> Title </th>
                        <th> Decription </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post) 
                        <tr>
                            <td> {{ $post->id }} </td>
                            <td> {{ $post->title }} </td>
                            <td class="ck-content"> {!! html_entity_decode($post->description) !!} </td>
                            <td> <form action="{{ route('destroy-post',$post->id) }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form> 
                                                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>

          {{ $posts->links() }}
        @endif
      </div>   
      
      <style>
    .ck-content img {
        max-width: 150px; /* Maximum width for the displayed image */
        max-height: 150px; /* Maximum height for the displayed image */
    }
</style>

@endsection