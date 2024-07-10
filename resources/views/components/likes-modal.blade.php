<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    ::selection {
        color: #fff;
        background: #ff4b4b;
    }

    /* .view-modal, */
    .popup {
        position: absolute;
        left: 50%;
    }
/* 
    button {
        outline: none;
        cursor: pointer;
        font-weight: 500;
        border-radius: 4px;
        border: 2px solid transparent;
        transition: background 0.1s linear, border-color 0.1s linear, color 0.1s linear;
    }

    .view-modal {
        top: 50%;
        color: #ff4b4b;
        font-size: 18px;
        padding: 10px 25px;
        background: #fff;
        transform: translate(-50%, -50%);
    } */

    .popup {
        background: #000;
        border: 1px solid #ddd;
        padding: 25px;
        border-radius: 15px;
        top: -150%;
        max-width: 380px;
        width: 100%;
        opacity: 0;
        pointer-events: none;
        box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
        transform: translate(-50%, -50%) scale(1.2);
        transition: top 0s 0.2s ease-in-out,
            opacity 0.2s 0s ease-in-out,
            transform 0.2s 0s ease-in-out;
    }

    .popup.show {
        top: 50%;
        opacity: 1;
        pointer-events: auto;
        transform: translate(-50%, -50%) scale(1);
        transition: top 0s 0s ease-in-out,
            opacity 0.2s 0s ease-in-out,
            transform 0.2s 0s ease-in-out;

    }

    .popup :is(header, .icons, .field) {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-direction: column;
    }
    .popup :is(.icons) {
        display: flex;
        align-items: center;
        justify-content: space-between;
        
    }

    .popup header {
        padding-bottom: 15px;
        border-bottom: 1px solid #ebedf9;
    }

    header span {
        font-size: 21px;
        font-weight: 600;
    }

    header .close,
    .icons a {
        display: flex;
        align-items: center;
        border-radius: 50%;
        justify-content: space-between;
        transition: all 0.3s ease-in-out;
    }

    header .close,
    .icons img {
        height: 60px;
        width: 60px;
        border-radius: 50%;
    }

    header .close {
        color: #878787;
        font-size: 17px;
        /* background: #f2f3fb; */
        height: 33px;
        width: 33px;
        cursor: pointer;
    }

    header .close:hover {
        background: #ebedf9;
    }

    .popup .content {
        margin: 20px 0;
    }

    .popup .icons {
        margin: 15px 0 20px 0;
    }

    .content p {
        font-size: 16px;
    }

    .content .icons a {
        height: 50px;
        width: 59%;
        font-size: 20px;
        text-decoration: none;
        /* border: 1px solid transparent; */
        margin: 10px;
        color:#fff;
    }

    .icons a i {
        transition: transform 0.3s ease-in-out;
    }

    .content .field {
        margin: 12px 0 -5px 0;
        height: 45px;
        border-radius: 4px;
        padding: 0 5px;
        border: 1px solid #e1e1e1;
        display: none;
    }

    .field.active {
        border-color: #ff4b4b;
    }

    .field i {
        width: 50px;
        font-size: 18px;
        text-align: center;
    }

    .field.active i {
        color: #ff4b4b;
    }

    .field input {
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        font-size: 15px;
    }

    .field button {
        color: #fff;
        padding: 5px 18px;
        background: #ff4b4b;
    }

    .field button:hover {
        background: #ff2a2a;
    }
</style>

<div class="popup">
    <header>
        <!-- <span>Share Modal</span> -->
        <div class="close"><i class="ri-close-circle-fill" style="font-size:32px;"></i></div>
    </header>
    <div class="content">
        <p>Reactions </p>
        <ul class="icons">
            @foreach ($likes as $lu)
                @php 
                    $user = \App\Models\User::where('google_id', $lu->user_id)->first();
                @endphp

                <a href="#">
                    <div class="img">
                        <img src="{{$user->image}}" alt="">
                    </div>

                    <p>{{$user->name}}</p>
                </a>
            @endforeach

        </ul>
        
        <div class="field">
            <i class="url-icon uil uil-link"></i>
            <input type="text" readonly value="example.com/share-link">
            <button>Copy</button>
        </div>
    </div>
</div>