<div>
    <h1>Onze Sponsoren</h1>

    @if ($images ?? false)
        <div class="image-gallery">
            @foreach ($images->take(5) as $image)
                <div class="image-wrapper">
                    <img src="{{ asset('storage/'.$image->image_path) }}" class="img-fluid">
                    <p>{{ $image->name }}</p>
                    <p>{{ $image->description }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>No images found.</p>
    @endif

</div>
