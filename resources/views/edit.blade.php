@extends('layouts.app')

@section('content')
<style>
    /* PAGE */
.edit-page{
    min-height:100vh;
    background:#14181c;

    display:flex;
    justify-content:center;
    align-items:center;
}

/* CONTAINER */
.edit-container{
    width:450px;
    background:#1c2228;

    padding:35px;

    border-radius:20px;

    color:white;

    box-shadow:0 0 40px rgba(0,0,0,0.4);
}

/* TITLE */
.edit-container h1{
    margin-bottom:30px;
}

/* AVATAR */
.avatar-section{
    display:flex;
    flex-direction:column;
    align-items:center;

    margin-bottom:30px;
}

.edit-avatar{
    width:120px;
    height:120px;

    border-radius:50%;
    object-fit:cover;

    margin-bottom:15px;

    border:3px solid #2c3440;
}

/* BUTTON */
.avatar-btn{
    background:#445566;
    padding:10px 15px;
    border-radius:8px;
    cursor:pointer;
}

/* INPUT GROUP */
.input-group{
    margin-bottom:20px;
}

.input-group label{
    display:block;
    margin-bottom:8px;
    color:#9ab;
}

.input-group input{
    width:100%;
    padding:12px;

    border:none;
    border-radius:10px;

    background:#2c3440;
    color:white;
}

/* SAVE BUTTON */
.save-btn{
    width:100%;
    padding:14px;

    border:none;
    border-radius:10px;

    background:#00b020;

    color:white;

    font-size:16px;

    cursor:pointer;
} </style>
<div class="edit-page">

    <form action="{{ route('update') }}"
          method="POST"
          enctype="multipart/form-data"
          class="edit-container">

        @csrf
        @method('PUT')

        <!-- TITLE -->
        <h1>Edit Profile</h1>

        <!-- AVATAR -->
        <div class="avatar-section">

            <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                 id="avatarPreview"
                 class="edit-avatar">

            <label for="avatarInput" class="avatar-btn">
                Change Photo
            </label>

            <input type="file"
                   name="avatar"
                   id="avatarInput"
                   hidden>

        </div>

        <!-- NAME -->
        <div class="input-group">
            <label>Name</label>

            <input type="text"
                   name="name"
                   value="{{ auth()->user()->name }}">
        </div>

        <!-- EMAIL -->
        <div class="input-group">
            <label>Email</label>

            <input type="email"
                   name="email"
                   value="{{ auth()->user()->email }}">
        </div>

        <!-- BUTTON -->
        <button type="submit" class="save-btn">
            Save Changes
        </button>

    </form>

</div>

<script>

document.getElementById("avatarInput").onchange = function(event){

    const reader = new FileReader();

    reader.onload = function(){

        document.getElementById("avatarPreview").src = reader.result;

    }

    reader.readAsDataURL(event.target.files[0]);

}

</script>

@endsection