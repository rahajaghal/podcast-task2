@extends('layouts.website')

@section('title', 'Choose Your Favorite Categories')

@push('styles')
<style>
    .categories-page {
        min-height: 75vh;
        display: flex;
        align-items: center;
        padding: 60px 0;
        background: #f8f9fa;
    }

    .categories-wrapper {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }

    .categories-header {
        text-align: center;
        margin-bottom: 45px;
    }

    .categories-icon {
        width: 75px;
        height: 75px;
        margin: 0 auto 20px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;
        background: #e8f1ff;
        color: #007bff;

        font-size: 32px;
    }

    .categories-header h1 {
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 12px;
        color: #212529;
    }

    .categories-header p {
        color: #6c757d;
        font-size: 18px;
        margin: 0 auto;
        max-width: 650px;
    }

    .categories-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    /*
     * Hide the real checkbox.
     * The label becomes our button.
     */
    .category-input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .category-button {
        min-height: 120px;
        padding: 25px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        background: white;
        border: 2px solid #e9ecef;
        border-radius: 16px;

        cursor: pointer;

        transition: all 0.25s ease;

        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    }

    .category-button:hover {
        transform: translateY(-4px);
        border-color: #007bff;
        box-shadow: 0 10px 25px rgba(0, 123, 255, 0.12);
    }

    .category-content {
        display: flex;
        align-items: center;
    }

    .category-icon {
        width: 55px;
        height: 55px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-right: 15px;

        border-radius: 13px;

        background: #f1f6ff;
        color: #007bff;

        font-size: 23px;

        transition: all 0.25s ease;
    }

    .category-name {
        font-size: 18px;
        font-weight: 600;
        color: #343a40;
    }

    .check-circle {
        width: 27px;
        height: 27px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 2px solid #ced4da;
        border-radius: 50%;

        color: transparent;

        transition: all 0.25s ease;
    }

    /*
     * SELECTED STATE
     */
    .category-input:checked + .category-button {
        background: #f5f9ff;
        border-color: #007bff;

        box-shadow: 0 8px 25px rgba(0, 123, 255, 0.12);
    }

    .category-input:checked + .category-button .category-icon {
        background: #007bff;
        color: white;
    }

    .category-input:checked + .category-button .check-circle {
        background: #007bff;
        border-color: #007bff;
        color: white;
    }

    /*
     * Bottom area
     */
    .save-area {
        margin-top: 35px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 20px 25px;

        background: white;
        border-radius: 16px;

        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    }

    .selected-text {
        color: #6c757d;
        font-size: 15px;
    }

    .selected-text strong {
        color: #007bff;
        font-size: 20px;
    }

    .save-button {
        border-radius: 10px;
        padding: 12px 30px;
        font-size: 16px;
        font-weight: 600;
    }

    /*
     * Tablet
     */
    @media (max-width: 991px) {
        .categories-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /*
     * Mobile
     */
    @media (max-width: 575px) {

        .categories-page {
            padding: 40px 15px;
        }

        .categories-header h1 {
            font-size: 30px;
        }

        .categories-header p {
            font-size: 16px;
        }

        .categories-grid {
            grid-template-columns: 1fr;
        }

        .save-area {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .save-button {
            width: 100%;
        }
    }
</style>
@endpush


@section('content')

<div class="categories-page">

    <div class="categories-wrapper">

        <!-- Header -->
        <div class="categories-header">

            <div class="categories-icon">
                <i class="fas fa-headphones"></i>
            </div>

            <h1>
                What do you love listening to?
            </h1>

            <p>
                Select your favorite podcast categories.
                We will use your choices to personalize your experience.
            </p>

        </div>


        <!-- Form -->
        <form
            method="POST"
            action="{{ route('categories.select') }}"
            id="categoriesForm"
        >

            @csrf


            <!-- Categories -->
            <div class="categories-grid">

                @foreach($categories as $category)

                    <div>

                        <input
                            type="checkbox"
                            class="category-input"
                            name="categoriesIds[]"
                            value="{{ $category->id }}"
                            id="category{{ $category->id }}"
                        >

                        <label
                            for="category{{ $category->id }}"
                            class="category-button"
                        >

                            <div class="category-content">

                                <div class="category-icon">
                                    <i class="fas fa-podcast"></i>
                                </div>

                                <span class="category-name">
                                    {{ $category->name }}
                                </span>

                            </div>


                            <div class="check-circle">
                                <i class="fas fa-check"></i>
                            </div>

                        </label>

                    </div>

                @endforeach

            </div>


            <!-- Save -->
            <div class="save-area">

                <div class="selected-text">

                    <strong id="selectedCount">0</strong>

                    categories selected

                </div>


                <button
                    type="submit"
                    class="btn btn-primary save-button"
                >

                    Save & Continue

                    <i class="fas fa-arrow-right ml-2"></i>

                </button>

            </div>

        </form>

    </div>

</div>

@endsection


@push('scripts')

<script>
    const checkboxes = document.querySelectorAll(
        '.category-input'
    );

    const selectedCount = document.getElementById(
        'selectedCount'
    );

    function updateSelectedCount() {

        const selected =
            document.querySelectorAll(
                '.category-input:checked'
            ).length;

        selectedCount.textContent = selected;
    }


    checkboxes.forEach(function (checkbox) {

        checkbox.addEventListener(
            'change',
            updateSelectedCount
        );

    });


    updateSelectedCount();


    /*
     * Prevent submitting without selecting
     * at least one category.
     */
    document.getElementById('categoriesForm')
        .addEventListener('submit', function (event) {

            const selected =
                document.querySelectorAll(
                    '.category-input:checked'
                ).length;

            if (selected === 0) {

                event.preventDefault();

                alert('Please select at least one category.');

            }

        });
</script>

@endpush

