<div class="card-body">

    {{-- =========================
         Podcast Title
    ========================== --}}

    <div class="form-group">

        <x-form.input
            id="title"
            name="title"
            type="text"
            placeholder="Enter Podcast Title"
            label="Podcast Title"
            :value="old('title')"
        />

    </div>


    {{-- =========================
         Category
    ========================== --}}

    <div class="form-group">

        <label for="category_id">
            Category
        </label>

        <select
            id="category_id"
            name="category_id"
            class="form-control"
        >

            <option value="">
                Select Category
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>

            @endforeach

        </select>


        @error('category_id')

            <small class="text-danger">
                {{ $message }}
            </small>

        @enderror

    </div>


    {{-- =========================
         Tags
    ========================== --}}

    <div class="form-group">

        <label>
            Tags
        </label>

        <div class="tags-container">

            @foreach($tags as $tag)

                <label class="tag-option">

                    <input
                        type="checkbox"
                        name="tags[]"
                        value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                    >

                    <span class="tag-button">
                        {{ $tag->name }}
                    </span>

                </label>

            @endforeach

        </div>


        @error('tags')

            <small class="text-danger">
                {{ $message }}
            </small>

        @enderror


        @error('tags.*')

            <small class="text-danger">
                {{ $message }}
            </small>

        @enderror

    </div>


    {{-- =========================
         Podcast Audio
    ========================== --}}

    <div class="form-group mb-0">

        <label for="podcast">
            Podcast Audio
        </label>

        <input
            id="podcast"
            name="podcast"
            type="file"
            class="form-control-file"
            accept="audio/*"
        >


        @error('podcast')

            <small class="text-danger">
                {{ $message }}
            </small>

        @enderror


        <small class="form-text text-muted">
            Upload your podcast audio file.
        </small>

    </div>

</div>


@push('styles')

<style>

    /* =========================
       Tags
    ========================== */

    .tags-container {
        display: flex;

        flex-wrap: wrap;

        gap: 9px;

        margin-top: 8px;
    }


    .tag-option {
        margin: 0;

        cursor: pointer;
    }


    .tag-option input {
        display: none;
    }


    .tag-button {
        display: inline-block;

        padding: 7px 14px;

        border-radius: 20px;

        border: 1px solid #ddd6fe;

        background: #faf9ff;

        color: #6d28d9;

        font-size: 13px;

        font-weight: 600;

        transition:
            all 0.2s ease;
    }


    .tag-button:hover {
        border-color: #8b5cf6;

        background: #f3efff;

        transform: translateY(-1px);
    }


    /* Selected Tag */

    .tag-option input:checked + .tag-button {
        color: #ffffff;

        border-color: #6d28d9;

        background:
            linear-gradient(
                135deg,
                #6d28d9,
                #8b5cf6
            );

        box-shadow:
            0 4px 10px rgba(109, 40, 217, 0.20);
    }

</style>

@endpush