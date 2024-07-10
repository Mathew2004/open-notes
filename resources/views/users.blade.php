@extends('layouts.main')

@push('title')
    {{$users->name}} | RUET NOTES
@endpush

@section('main-section')

<style>


/* Profile Card Container */
.profile-card {
  max-width: 400px;
  margin: 40px auto;
  padding: 20px;
  background-color: #111;
  border-radius: 10px;
  border: 2px solid #222;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Cover Photo */
.cover-photo {
  height: 150px;
  overflow: hidden;
  border-radius: 10px;
}

.cover-photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Profile Picture and Info Container */
.profile-info {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  margin-top: -50px;
}

/* Profile Picture */
.profile-picture {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  overflow: hidden;
  margin-bottom: 20px;
}

.profile-picture img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 50%;
}

/* User Information */
.user-info {
  text-align: center;
}

.username {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

.email {
  font-size: 18px;
  color: #aaa;
  margin-bottom: 20px;
}

.bio {
  font-size: 16px;
  color: #666;
}
</style>

<!-- Profile Card Container -->
<div class="profile-card">
  <!-- Cover Photo -->
  <div class="cover-photo">
    <img src="/assets/images/new-item-4.jpg" alt="Cover Photo">
  </div>
  
  <!-- Profile Picture and Info Container -->
  <div class="profile-info">
    <!-- Profile Picture -->
    <div class="profile-picture">
      <img src="{{$users->image}}" alt="Profile Picture">
    </div>
    
    <!-- User Information -->
    <div class="user-info">
      <h2 class="username">{{$users->name}}</h2>
      <p class="email">{{$users->email}}</p>
      <p class="bio">Series: {{$users->series}}</p>
      <p class="bio">Department: {{$users->department}}</p>
      <p class="bio">Roll: {{$users->roll}}</p>
    </div>
  </div>
</div>


<!-- 
        - #NEW NOTES
      -->
<main>

    <article>

        <section class="new-product">
            <div class="container">

                <div class="section-header-wrapper">

                    <h2 class="h2 section-title">{{$users->name}}'s Notes</h2>

                    <!-- <button class="btn btn-primary">View all</button> -->

                </div>

                <ul class="product-list">

                    <!-- Fetch Data from Notes -->
                     @if (count($notes) == 0)
                        <p>No Notes Available</p>
                        
                     @endif

                    @foreach ($notes as $note)

                        @include("components/search-notes")

                    @endforeach


                </ul>

            </div>
        </section>
    </article>
</main>


@endsection