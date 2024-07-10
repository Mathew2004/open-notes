@extends('layouts.main')

@section('main-section')


  <main>

    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero">
        <div class="container">

          <div class="hero-content">

            <h1 class="h1 hero-title">Discover digital art sell your specific <span>OPEN NOTES</span></h1>

            <p class="hero-text">
              Partner with one of the world’s largest retailers to showcase your brand and products.
            </p>

            <div class="btn-group">
              <button class="btn btn-primary">Explore more</button>

              <button class="btn btn-secondary">Create now</button>
            </div>

          </div>

          <figure class="hero-banner">
            <img src="./assets/images/notes.svg" alt="nft art">
          </figure>

        </div>
      </section>





      <!-- 
        - #NEW NOTES
      -->

      <section class="new-product">
        <div class="container">

          <div class="section-header-wrapper">

            <h2 class="h2 section-title">Newest Notes</h2>

            <a href="/notes" class="btn btn-primary">View all</a>

          </div>

          <ul class="product-list">

            <!-- Fetch Data from Notes -->
             
            @foreach ($notes as $note )
            
              @include("components/search-notes")

            @endforeach


          </ul>

        </div>
      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="about">
        <div class="container">

          <h2 class="h2 about-title">Create and Share your Notes</h2>

          <ol class="about-list">

            <li class="about-item">
              <div class="about-card">

                <div class="card-number">01</div>

                <div class="card-icon">
                  <img src="./assets/images/single-create-sell-item-1.png" alt="wallet icon">
                </div>

                <h3 class="h3 about-card-title">Login To your Account</h3>

                <p class="about-card-text">
                  There are many variations of passagi Ipsum available but the majorty have eration in some form, by
                  injected
                </p>

              </div>
            </li>

            <li class="about-item">
              <div class="about-card">

                <div class="card-number">02</div>

                <div class="card-icon">
                  <img src="./assets/images/single-create-sell-item-2.png" alt="collection icon">
                </div>

                <h3 class="h3 about-card-title">Update Your Profile</h3>

                <p class="about-card-text">
                  There are many variations of passagi Ipsum available but the majorty have eration in some form, by
                  injected
                </p>

              </div>
            </li>

            <li class="about-item">
              <div class="about-card">

                <div class="card-number">03</div>

                <div class="card-icon">
                  <img src="./assets/images/single-create-sell-item-3.png" alt="folder icon">
                </div>

                <h3 class="h3 about-card-title">Add Your Notes</h3>

                <p class="about-card-text">
                  There are many variations of passagi Ipsum available but the majorty have eration in some form, by
                  injected
                </p>

              </div>
            </li>

            <li class="about-item">
              <div class="about-card">

                <div class="card-number">04</div>

                <div class="card-icon">
                  <img src="./assets/images/single-create-sell-item-4.png" alt="diamond icon">
                </div>

                <h3 class="h3 about-card-title">Share your Notes</h3>

                <p class="about-card-text">
                  There are many variations of passagi Ipsum available but the majorty have eration in some form, by
                  injected
                </p>

              </div>
            </li>

          </ol>

        </div>
      </section>





      <!-- 
        - #EXPLORE PRODUCT
      -->

      <!-- <section class="explore-product">
        <div class="container">

          <div class="section-header-wrapper">

            <h2 class="h2 section-title">Explore Product</h2>

            <button class="btn btn-primary">Explore</button>

          </div>

          <ul class="product-list">

            <li class="product-item">

              <div class="product-card" tabindex="0">

                <figure class="product-banner">

                  <img src="./assets/images/explore-product-1.jpg" alt="Dimond riding a blue body art">

                  <div class="product-actions">
                    <button class="product-card-menu">
                      <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button>

                    <button class="add-to-whishlist" data-whishlist-btn>
                      <ion-icon name="heart"></ion-icon>
                    </button>
                  </div>

                  <button class="place-bid-btn">Place bid</button>

                </figure>

                <div class="product-content">

                  <a href="#" class="h4 product-title">Dimond riding a blue body art</a>

                  <div class="product-meta">

                    <div class="product-author">

                      <figure class="author-img">
                        <img src="./assets/images/bidding-user.png" alt="Jack Reacher">
                      </figure>

                      <div class="author-content">
                        <h4 class="h5 author-title">Jack R</h4>

                        <a href="#" class="author-username">@jackr</a>
                      </div>

                    </div>

                    <div class="product-price">
                      <data value="0.568">0.568ETH</data>

                      <p class="label">Current Bid</p>
                    </div>

                  </div>

                  <div class="product-footer">
                    <p class="total-bid">12+ Place Bid.</p>

                    <button class="tag">New</button>
                  </div>

                </div>

              </div>

            </li>

            <li class="product-item">

              <div class="product-card" tabindex="0">

                <figure class="product-banner">

                  <img src="./assets/images/explore-product-2.jpg" alt="Dimond riding a blue body art">

                  <div class="product-actions">
                    <button class="product-card-menu">
                      <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button>

                    <button class="add-to-whishlist" data-whishlist-btn>
                      <ion-icon name="heart"></ion-icon>
                    </button>
                  </div>

                  <button class="place-bid-btn">Place bid</button>

                </figure>

                <div class="product-content">

                  <a href="#" class="h4 product-title">Dimond riding a blue body art</a>

                  <div class="product-meta">

                    <div class="product-author">

                      <figure class="author-img">
                        <img src="./assets/images/bidding-user.png" alt="Jack Reacher">
                      </figure>

                      <div class="author-content">
                        <h4 class="h5 author-title">Jack R</h4>

                        <a href="#" class="author-username">@jackr</a>
                      </div>

                    </div>

                    <div class="product-price">
                      <data value="0.568">0.568ETH</data>

                      <p class="label">Current Bid</p>
                    </div>

                  </div>

                  <div class="product-footer">
                    <p class="total-bid">12+ Place Bid.</p>

                    <button class="tag">New</button>
                  </div>

                </div>

              </div>

            </li>

            <li class="product-item">

              <div class="product-card" tabindex="0">

                <figure class="product-banner">

                  <img src="./assets/images/explore-product-3.jpg" alt="Dimond riding a blue body art">

                  <div class="product-actions">
                    <button class="product-card-menu">
                      <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button>

                    <button class="add-to-whishlist" data-whishlist-btn>
                      <ion-icon name="heart"></ion-icon>
                    </button>
                  </div>

                  <button class="place-bid-btn">Place bid</button>

                </figure>

                <div class="product-content">

                  <a href="#" class="h4 product-title">Dimond riding a blue body art</a>

                  <div class="product-meta">

                    <div class="product-author">

                      <figure class="author-img">
                        <img src="./assets/images/bidding-user.png" alt="Jack Reacher">
                      </figure>

                      <div class="author-content">
                        <h4 class="h5 author-title">Jack R</h4>

                        <a href="#" class="author-username">@jackr</a>
                      </div>

                    </div>

                    <div class="product-price">
                      <data value="0.568">0.568ETH</data>

                      <p class="label">Current Bid</p>
                    </div>

                  </div>

                  <div class="product-footer">
                    <p class="total-bid">12+ Place Bid.</p>

                    <button class="tag">New</button>
                  </div>

                </div>

              </div>

            </li>

            <li class="product-item">

              <div class="product-card" tabindex="0">

                <figure class="product-banner">

                  <img src="./assets/images/explore-product-4.jpg" alt="Dimond riding a blue body art">

                  <div class="product-actions">
                    <button class="product-card-menu">
                      <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button>

                    <button class="add-to-whishlist" data-whishlist-btn>
                      <ion-icon name="heart"></ion-icon>
                    </button>
                  </div>

                  <button class="place-bid-btn">Place bid</button>

                </figure>

                <div class="product-content">

                  <a href="#" class="h4 product-title">Dimond riding a blue body art</a>

                  <div class="product-meta">

                    <div class="product-author">

                      <figure class="author-img">
                        <img src="./assets/images/bidding-user.png" alt="Jack Reacher">
                      </figure>

                      <div class="author-content">
                        <h4 class="h5 author-title">Jack R</h4>

                        <a href="#" class="author-username">@jackr</a>
                      </div>

                    </div>

                    <div class="product-price">
                      <data value="0.568">0.568ETH</data>

                      <p class="label">Current Bid</p>
                    </div>

                  </div>

                  <div class="product-footer">
                    <p class="total-bid">12+ Place Bid.</p>

                    <button class="tag">New</button>
                  </div>

                </div>

              </div>

            </li>

            <li class="product-item">

              <div class="product-card" tabindex="0">

                <figure class="product-banner">

                  <img src="./assets/images/explore-product-5.jpg" alt="Dimond riding a blue body art">

                  <div class="product-actions">
                    <button class="product-card-menu">
                      <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button>

                    <button class="add-to-whishlist" data-whishlist-btn>
                      <ion-icon name="heart"></ion-icon>
                    </button>
                  </div>

                  <button class="place-bid-btn">Place bid</button>

                </figure>

                <div class="product-content">

                  <a href="#" class="h4 product-title">Dimond riding a blue body art</a>

                  <div class="product-meta">

                    <div class="product-author">

                      <figure class="author-img">
                        <img src="./assets/images/bidding-user.png" alt="Jack Reacher">
                      </figure>

                      <div class="author-content">
                        <h4 class="h5 author-title">Jack R</h4>

                        <a href="#" class="author-username">@jackr</a>
                      </div>

                    </div>

                    <div class="product-price">
                      <data value="0.568">0.568ETH</data>

                      <p class="label">Current Bid</p>
                    </div>

                  </div>

                  <div class="product-footer">
                    <p class="total-bid">12+ Place Bid.</p>

                    <button class="tag">New</button>
                  </div>

                </div>

              </div>

            </li>

            <li class="product-item">

              <div class="product-card" tabindex="0">

                <figure class="product-banner">

                  <img src="./assets/images/explore-product-6.jpg" alt="Dimond riding a blue body art">

                  <div class="product-actions">
                    <button class="product-card-menu">
                      <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button>

                    <button class="add-to-whishlist" data-whishlist-btn>
                      <ion-icon name="heart"></ion-icon>
                    </button>
                  </div>

                  <button class="place-bid-btn">Place bid</button>

                </figure>

                <div class="product-content">

                  <a href="#" class="h4 product-title">Dimond riding a blue body art</a>

                  <div class="product-meta">

                    <div class="product-author">

                      <figure class="author-img">
                        <img src="./assets/images/bidding-user.png" alt="Jack Reacher">
                      </figure>

                      <div class="author-content">
                        <h4 class="h5 author-title">Jack R</h4>

                        <a href="#" class="author-username">@jackr</a>
                      </div>

                    </div>

                    <div class="product-price">
                      <data value="0.568">0.568ETH</data>

                      <p class="label">Current Bid</p>
                    </div>

                  </div>

                  <div class="product-footer">
                    <p class="total-bid">12+ Place Bid.</p>

                    <button class="tag">New</button>
                  </div>

                </div>

              </div>

            </li>

            <li class="product-item">

              <div class="product-card" tabindex="0">

                <figure class="product-banner">

                  <img src="./assets/images/explore-product-7.jpg" alt="Dimond riding a blue body art">

                  <div class="product-actions">
                    <button class="product-card-menu">
                      <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button>

                    <button class="add-to-whishlist" data-whishlist-btn>
                      <ion-icon name="heart"></ion-icon>
                    </button>
                  </div>

                  <button class="place-bid-btn">Place bid</button>

                </figure>

                <div class="product-content">

                  <a href="#" class="h4 product-title">Dimond riding a blue body art</a>

                  <div class="product-meta">

                    <div class="product-author">

                      <figure class="author-img">
                        <img src="./assets/images/bidding-user.png" alt="Jack Reacher">
                      </figure>

                      <div class="author-content">
                        <h4 class="h5 author-title">Jack R</h4>

                        <a href="#" class="author-username">@jackr</a>
                      </div>

                    </div>

                    <div class="product-price">
                      <data value="0.568">0.568ETH</data>

                      <p class="label">Current Bid</p>
                    </div>

                  </div>

                  <div class="product-footer">
                    <p class="total-bid">12+ Place Bid.</p>

                    <button class="tag">New</button>
                  </div>

                </div>

              </div>

            </li>

            <li class="product-item">

              <div class="product-card" tabindex="0">

                <figure class="product-banner">

                  <img src="./assets/images/explore-product-8.jpg" alt="Dimond riding a blue body art">

                  <div class="product-actions">
                    <button class="product-card-menu">
                      <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </button>

                    <button class="add-to-whishlist" data-whishlist-btn>
                      <ion-icon name="heart"></ion-icon>
                    </button>
                  </div>

                  <button class="place-bid-btn">Place bid</button>

                </figure>

                <div class="product-content">

                  <a href="#" class="h4 product-title">Dimond riding a blue body art</a>

                  <div class="product-meta">

                    <div class="product-author">

                      <figure class="author-img">
                        <img src="./assets/images/bidding-user.png" alt="Jack Reacher">
                      </figure>

                      <div class="author-content">
                        <h4 class="h5 author-title">Jack R</h4>

                        <a href="#" class="author-username">@jackr</a>
                      </div>

                    </div>

                    <div class="product-price">
                      <data value="0.568">0.568ETH</data>

                      <p class="label">Current Bid</p>
                    </div>

                  </div>

                  <div class="product-footer">
                    <p class="total-bid">12+ Place Bid.</p>

                    <button class="tag">New</button>
                  </div>

                </div>

              </div>

            </li>

          </ul>

        </div>
      </section> -->





      <!-- 
        - #TOP Note Writers
      -->

      <section class="top-seller">
        <div class="container">

          <h2 class="h2 top-seller-title">
            Top Contributor in <span>30</span> days
            <ion-icon name="chevron-down"></ion-icon>
          </h2>

          <ol class="top-seller-list">

          @php
            $i = 1;
          @endphp

          @foreach ($top_contributors as $contri)
          
            <li class="top-seller-item">
              <a href="{{url('users/').'/'.$contri->id}}" class="top-seller-card">

                <div class="card-number">{{$i++}}</div>

                <figure class="card-avatar">
                  <img src="{{$contri->image}}" style="border-radius: 50%; height:70px; width:70px" alt="{{$contri->name}}">

                  <div class="avatar-badge">
                    <ion-icon name="checkmark-outline"></ion-icon>
                  </div>
                </figure>

                <div class="card-content">
                  <h3 class="h5 card-title">{{$contri->name}}</h3>

                  <i class="ri-star-line" style="color: #FAC400 "></i>  <data value="{{$contri->points}}">{{$contri->points}}</data>
                </div>

              </a>
            </li>
          @endforeach
            

          </ol>

        </div>
      </section>

    </article>

  </main>

@endsection



