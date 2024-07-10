@extends('layouts.main')

@push('title')
    Add Notes
@endpush

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>



@section('main-section')

<style>
    /* body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f5f5f5;
        margin: 0;
        font-family: Arial, sans-serif;
    } */

    .form-container {
        background: #fff;
        padding: 2rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 100%;
        max-width: 400px;
        margin: 10px 0px;

    }

    h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #333;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: #555;
    }

    input[type="text"],
    input[type="email"],
    input[type="file"],
    select {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="file"] {
        padding: 0;
    }

    button {
        width: 100%;
        padding: 0.75rem;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    #image-container {
        text-align: center;
    }

    #selected-image {
        border: 1px solid #ddd;
        padding: 5px;
        border-radius: 5px;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        /* margin: 10px 0px; */
    }
</style>

<div class="container">


       
        <div class="form-container">
            <h2>Add Notes</h2>

            <form action="{{url('/add-note')}}" method="post" enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label for="name">Subject</label>
                    <select id="subject" name="subject" required>
                        <option value="">Select Course</option>
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
                <p class="text-danger">
                    @error('subject')
                        {{$message}}
                    @enderror
                </p>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" name="desc" id="desc" required>
                </div>

                <p class="text-danger">
                    @error('desc')
                        {{$message}}
                    @enderror
                </p>
            

                <p style="display: flex; justify-content:space-between;">
                    <button class="btn btn-primary mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#file"
                        aria-expanded="false" aria-controls="collapseExample">
                        Upload PDF
                    </button>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#link"
                        aria-expanded="false" aria-controls="collapseExample">
                        Upload Link
                    </button>
                </p>
                <div class="collapse" id="link">
                    <div class="form-group">
                        <label for="file">Upload Link</label>
                        <input type="text" id="" name="link">
                    </div>
                </div>
                <div class="collapse" id="file">
                    <div class="form-group">
                        <label for="file">Upload File</label>
                        <input type="file" name="file">
                    </div>
                </div>

                <p class="text-danger">
                    @error('link')
                        {{$message}}
                    @enderror
                </p>
                <p class="text-danger">
                    @error('file')
                        {{$message}}
                    @enderror
                </p>



                <div class="form-group">
                    <label for="thumnail">Thumnail</label>
                    <select id="thumb-select" name="thumb" required>
                        <option value="">Select Thumnail</option>
                        <option value="/assets/thumbs/4.png">CSE1200</option>
                        <option value="/assets/thumbs/5.png">CSE1201</option>
                        <option value="/assets/thumbs/6.png">CSE1202</option>
                        <option value="/assets/thumbs/7.png">CSE1203</option>
                        <option value="/assets/thumbs/8.png">CSE1204</option>
                        <option value="/assets/thumbs/1.png">EEE1251</option>
                        <option value="/assets/thumbs/2.png">PHY1213</option>
                        <option value="/assets/thumbs/3.png">MATH1213</option>
                    
                        
                    </select>
                    @error('thumb')
                    @enderror
                </div>
                <div id="image-container" style="margin-top: 20px;">
                    <img id="selected-image" src="" alt="Selected Thumbnail" style="display: none; max-width: 100%;">
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>






</div>




<script>
    document.getElementById('thumb-select').addEventListener('change', function () {
        const selectedValue = this.value;
        const imgElement = document.getElementById('selected-image');

        if (selectedValue) {
            imgElement.src = selectedValue;
            imgElement.style.display = 'block';
        } else {
            imgElement.style.display = 'none';
        }
    });

</script>




@endsection