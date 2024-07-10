@extends('layouts.main')

@section('main-section')

<style>
    .filter-box {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        justify-content: end;
        width: max-content;
        margin-bottom: 30px;
        /* margin-bottom: 20px; */
    }

    /* .filter-select {
        margin-left: 10px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #f7f7f7;
    }

    .filter-select:focus {
        outline: none;
    } */

    :root {
        --background-gradient: linear-gradient(178deg, #ffff33 10%, #3333ff);
        --gray: #34495e;
        --darkgray: #2c3e50;
    }

    select {
        /* Reset Select */
        appearance: none;
        outline: 10px red;
        border: 0;
        box-shadow: none;
        /* Personalize */
        flex: 1;
        padding: 0 1em;
        color: #fff;
        background-color: #2c3e50;
        background-image: none;
        cursor: pointer;
        
    }

    /* Remove IE arrow */
    select::-ms-expand {
        display: none;
    }

    /* Custom Select wrapper */
    .select {
        position: relative;
        display: flex;
        width: 20em;
        height: 3em;
        border-radius: .25em;
        overflow: hidden;
        margin-bottom: 30px;
    }

    /* Arrow */
    .select::after {
        content: '\25BC';
        position: absolute;
        top: 0;
        right: 0;
        padding: 1em;
        background-color: #34495e;
        transition: .25s all ease;
        pointer-events: none;
    }

    /* Transition */
    .select:hover::after {
        color: #f39c12;
    }
</style>

<!-- 
        - #NEW NOTES
      -->
<main>
    <article>
        <section class="new-product">



            <div class="container">
                <div class="select">
                    <!-- <h3>Filter By Course</h3> -->
                    <select name="filter" class="filter-select" id="filter">
                        <option value="">Filter By Course</option>
                        <option value="EEE1251">EEE1251</option>
                        <option value="CSE1200">CSE1200</option>
                        <option value="CSE1201">CSE1201</option>
                        <option value="CSE1202">CSE1202</option>
                        <option value="CSE1203">CSE1203</option>
                        <option value="CSE1204">CSE1204</option>
                        <option value="PHY1213">PHY1213</option>
                        <option value="MATH1213">MATH1213</option>
                    </select>
                </div>


                <!-- <div class="section-header-wrapper">

                    <h2 class="h2 section-title">Newest Items</h2>

                    <button class="btn btn-primary">View all</button>

                </div> -->

                <ul class="product-list" id="notes-list">



                    @foreach ($notes as $note)
                        @include('components.search-notes', ['note' => $note])
                    @endforeach

                </ul>
                <center>
                    <button class="btn btn-primary" style="margin: 15px 0px;" id="load-more-btn">Load More</button>
                </center>


            </div>


        </section>
    </article>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>



    $(document).ready(function () {
        // Filter
        $("#filter").on('change', function (e) {
            e.preventDefault();
            var search = $('#filter').val();
            console.log(search);

            $.ajax({
                url: "{{route('note.search')}}",
                type: "GET",
                data: { search: search },
                success: function (response) {
                    // console.log(response.html);
                    if (response.shtml != '') {
                        $('#notes-list').html(response.shtml);
                    } else {
                        $('#notes-list').html('<p>Not Found</p>');
                    }


                }
            });


        });


        // Pagination
        let page = 1;

        $('#load-more-btn').on('click', function () {
            page++;
            $.ajax({
                url: "{{ route('notes.loadMore') }}",
                type: 'GET',
                data: { page: page },
                success: function (response) {
                    $('#notes-list').append(response.html);
                    if (!response.hasMorePages) {
                        $('#load-more-btn').hide();
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });


    });


</script>







@endsection