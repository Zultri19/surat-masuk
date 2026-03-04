@extends('layouts.admin') {{-- sesuaikan layout kamu --}}

@section('content')

<div class="container mt-4">
    <h4>Edit Profile</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

   <div class="card p-4 shadow-sm">
        <form method="POST" 
              action="{{ route('profile.update') }}" 
              enctype="multipart/form-data">
            @csrf

            <div class="mb-3 text-center">
                <img src="{{ auth()->user()->photo 
                        ? asset('storage/profile/' . auth()->user()->photo) 
                        : asset('asset/img/default.png') }}"
                     width="120"
                     height="120"
                     class="rounded-circle border"
                     style="object-fit:cover;">
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text"
                       name="name"
                       value="{{ auth()->user()->name }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Foto</label>
                <input type="file"
                       name="photo"
                       class="form-control">
            </div>

            <button class="btn btn-primary">
                Update Profile
            </button>
        </form>
    </div>

    <!-- <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" 
                   value="{{ auth()->user()->name }}" 
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Foto Profile</label>
            <input type="file" name="photo" class="form-control" onchange="previewImage(event)">
        </div>

        {{-- Preview Foto --}}
        <div class="mb-3 text-center">
            <img id="preview" 
                 src="{{ auth()->user()->photo 
                        ? asset('storage/profile/' . auth()->user()->photo) 
                        : asset('asset/img/default.png') }}" 
                 width="150"
                 class="rounded-circle border"
                 style="object-fit:cover; height:150px;">
        </div>

        @error('photo')
            <div class="text-danger mb-3">
                {{ $message }}
            </div>
        @enderror

        <button class="btn btn-primary">Update Profile</button>
    </form> -->
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('preview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection