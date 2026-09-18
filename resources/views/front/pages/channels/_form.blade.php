<div class="card-body">

    {{-- Channel Name --}}
    <div class="form-group">

        <x-form.input
            id="name"
            name="name"
            type="text"
            placeholder="Enter Channel Name"
            label="Channel Name"
            :value="old('name', $channel->name ?? '')"
        />

    </div>


    {{-- Channel Image --}}
    <div class="form-group">

        <label for="image">
            Channel Image
        </label>

        <input
            id="image"
            name="image"
            type="file"
            class="form-control-file"
            accept="image/*"
        >

        @error('image')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror

        <small class="form-text text-muted">
            Upload a JPG, JPEG, PNG or WEBP image.
        </small>

    </div>


    {{-- Channel Description --}}
    <div class="form-group">

        <label for="description">
            Channel Description
        </label>

        <textarea
            id="description"
            name="description"
            rows="5"
            class="form-control"
            placeholder="Tell listeners about your podcast channel..."
        >{{ old('description', $channel->description ?? '') }}</textarea>

        @error('description')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror

    </div>

</div>
