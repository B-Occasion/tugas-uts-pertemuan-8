@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <div class="row">
                    @if (count ($galleries)>0)
                    @foreach ($galleries as $gallery)
                        <div class="col-sm-2">
                            <div>
                                <a class="example-image-link" href="{{asset('storage/posts_image/'.$gallery->picture)}}" data-lightbox="roadtrip"
                                    data-title="{{$gallery->description}}">
                                    <img class="example-image img-fluid mb-2" src="{{asset('storage/posts_image/'.$gallery->picture)}}" alt="image-1"/>
                                </a>
                                <div class="button_container">
                                    <form action="{{ route('gallery.destroy', $gallery->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" type="submit" style="width: 100%">Delete?</button>
                                    </form>
                                        <a href="{{ route('gallery.edit', $gallery->id) }}"><button style="width: 100%">Edit?</button></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <h3>Data tidak ada</h3>
                    @endif
                    <div class="d-flex">
                        {{ $galleries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
