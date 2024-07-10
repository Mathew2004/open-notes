 <!-- Fetch Data from Notes -->



<li class="product-item">

    <div class="product-card" tabindex="0">

        <figure class="product-banner">

            <img src="{{$note->thumbnail}}" alt="Dimond riding a blue body art">

            <div class="product-actions">
                <button class="product-card-menu">
                    <ion-icon name="ellipsis-horizontal"></ion-icon>
                </button>

                <button class="add-to-whishlist" data-whishlist-btn>
                    <ion-icon name="heart"></ion-icon>
                </button>
            </div>

            <a href="{{url('/note' . '/' . $note->id)}}" class="place-bid-btn">View</a>

        </figure>

        <div class="product-content">

            <a href="{{url('/note' . '/' . $note->id)}}" class="h4 product-title">{{$note->subject}}</a>

            <div class="product-meta">

                <div class="product-author">

                    <figure class="author-img">
                        <img src="{{\App\Models\User::where('google_id', $note->user_id)->first()->image}}"
                            height="40px" width="40px" alt="">
                    </figure>

                    <div class="author-content">
                        <a href="{{url('/users' . '/' . \App\Models\User::where('google_id', $note->user_id)->first()->id)}}"
                            class="author-username">
                            {{\App\Models\User::where('google_id', $note->user_id)->first()->name}}
                        </a>
                    </div>

                </div>

                <!-- <div class="product-price">
  <data value="0.568">0.568ETH</data>

  <p class="label">Current Bid</p>
</div> -->

            </div>

            <div class="product-footer">
                <p class="total-bid">{{$note->likes}} Likes</p>

                @if (newNotes($note->created_at))
                    <button class="tag">New</button>
                @endif
                
                
                @if(popular_badge($note->views))
                    <button class="tag" style="background: #ff035a; color:#fff">Popular</button>
                @endif
                 
            </div>

        </div>

    </div>

</li>

