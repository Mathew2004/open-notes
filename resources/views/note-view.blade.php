@extends('layouts.main')

@push('title')
    {{$notes->subject}} | RUET NOTES
@endpush

@section('main-section')

<style>
    .card {
        max-width: 800px;
        margin: 2rem auto;
        padding: 1rem;
        background-color: #161616;
        border: 1px solid #555;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .like_menu_bar {
        display: flex;
        justify-content: space-between;
    }

    .card-header {
        padding: 1rem;
        border-bottom: 1px solid #555;
    }

    .card-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-description {
        font-size: 16px;
        color: #999;
    }

    .pdf-viewer {
        padding: 1rem;
    }

    iframe {
        width: 100%;
        height: 600px;
        border: none;
    }
</style>

<main>
    <article>
        <div class="card">

            <div class="like_menu_bar">
                <div class="product-author">
                    <figure class="author-img">
                        <img src="{{\App\Models\User::where('google_id', $notes->user_id)->first()->image}}"
                            height="40px" width="40px" alt="">
                    </figure>

                    <div class="author-content">
                        <a href="{{url('/users' . '/' . \App\Models\User::where('google_id', $notes->user_id)->first()->id)}}"
                            class="author-username">
                            {{\App\Models\User::where('google_id', $notes->user_id)->first()->name}}
                        </a>
                        <p>{{publish_date($notes->created_at)}}</p>
                        <p><i class="ri-eye-line"></i> {{$notes->views}}</p>
                    </div>
                </div>
                <div class="">
                    <!-- <button class="product-card-menu">
                        <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button> -->
                    <button class="add-to-whishlist @if(Auth::check()){{$status}} @endif " id="like">
                        <ion-icon name="heart"></ion-icon>
                    </button>
                    <a style="color: yellow;text-decaration: #fff; cursor: pointer;" class="view-modal"> <span
                            id="like_count">{{$likes->count()}} Likes</span></a>

                </div>
            </div>



            <div class="card-header">



                <h2 class="card-title">{{$notes->subject}}</h2>
                <p class="card-description">{{$notes->desc}}
                </p>
            </div>
            <div class="pdf-viewer">
                @if ($notes->link)
                    <iframe src="{{$notes->link}}/preview"></iframe>
                @else
                    <iframe src="{{ url('/uploads/note/' . $notes->file)}}"></iframe>
                @endif
            </div>
        </div>

        <!-- Likers Modals -->
        @include('components/likes-modal')









    </article>

</main>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    $(document).ready(function () {
        $("#like").on("click", function () {
            var classAttr = $(this).attr('class');
            var classNames = classAttr.split(' ');
            var status = classNames[1];

            @if (!Auth::user())
                alert("Please login to like this note");
                location.href = "/login";
            @else
                $.ajax({
                    url: "/note/{{$notes->id}}/like",
                    type: 'GET',
                    data: {
                        status: status,
                        owner: {{$notes->user_id}},
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res) {
                        if (res.status == 'active') {
                            $("#like").addClass('active');

                            $('#like_count').text(res.likes + " Likes");
                        } else {
                            $("#like").removeClass('active');
                            $('#like_count').text(res.likes + " Likes");
                        }


                    }
                });
            @endif


        });
    });


    const viewBtn = document.querySelector(".view-modal"),
        popup = document.querySelector(".popup"),
        close = popup.querySelector(".close"),
        input = popup.querySelector("input"),
        copy = popup.querySelector("button"),
        field = input.parentElement;

    viewBtn.onclick = () => popup.classList.toggle("show");
    close.onclick = () => viewBtn.click();

</script>


@endsection