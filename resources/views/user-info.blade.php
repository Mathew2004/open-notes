@extends('layouts.main')

@push('title')
    Add Profile Info
@endpush


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
        @if($edit)
            <h2>Update Profile Information</h2>
        @else
            <h2>Add Profile Information</h2>
        @endif

        <form action="{{url('/profile/update')}}" method="post" enctype="multipart/form-data"> @csrf
            <div class="form-group">
                <!-- // If Edit Query Then Add Name Option -->
                @if($edit)
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{$edit ? $user->name : old('name')}}" required>
                    </div>
                @endif


                <label for="" class="form-label">Department</label>
                <select name="department" id="" class="form-control">
                    <option value="{{$edit ? $user->department : old('department')}}">
                        {{$edit ? $user->department : 'Select Department'}}</option>

                    @php
                        $departments = ['CSE', 'EEE', 'ME', 'CE', 'ECE', 'ETE', 'MTE', 'MSE', 'URP', 'Che', 'GCE', 'IPE'];
                    @endphp

                    @foreach($departments as $department)
                        <option value="{{$department}}">{{$department}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Series</label>
                <select name="series" id="" value="{{old('series')}}">
                    <option value="{{$edit ? $user->series : old('series')}}">{{$edit ? $user->series : 'Select Series'}}
                    </option>
                    <option value="23">23</option>
                    <option value="22">22</option>
                    <option value="21">21</option>
                    <option value="20">20</option>
                    <option value="19">19</option>

                </select>
            </div>
            <p class="text-danger">
                @error('series')
                    {{$message}}
                @enderror
            </p>
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" name="roll" id="roll" value="{{$edit ? $user->roll : old('roll')}}" required>
            </div>

            <p class="text-danger">
                @error('roll')
                    {{$message}}
                @enderror
            </p>




            <button type="submit">Submit</button>
        </form>
    </div>

</div>






@endsection