@extends('layouts.admin.app')
@section('title', 'Edit User')
@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit User</h1>
                <p class="mb-0">Form untuk mengubah data pengguna.</p>
            </div>
            <div>
                <a href="{{ route('user.index') }}" class="btn btn-primary">
                    <i class="far fa-question-circle me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Form UPDATE + Upload Foto --}}
                    <form action="{{ route('user.update', $dataUser->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">

                                {{-- Nama --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $dataUser->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $dataUser->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                {{-- TAMBAHAN: Foto Profile --}}
                                <div class="mb-3 mt-4">
                                    <label class="form-label">Foto Profil</label>

                                    {{-- Preview Foto --}}
                                    <div class="mb-2">
                                        @if ($dataUser->profile_picture)
                                            <img id="previewImage"
                                                src="{{ asset('storage/' . $dataUser->profile_picture) }}" width="100"
                                                height="100" class="rounded-circle" style="object-fit: cover;">
                                        @else
                                            <img id="previewImage" src="https://via.placeholder.com/100" width="100"
                                                height="100" class="rounded-circle">
                                        @endif
                                    </div>

                                    {{-- Input Upload --}}
                                    <input type="file"
                                        class="form-control @error('profile_picture') is-invalid @enderror"
                                        name="profile_picture" id="profile_picture" accept="image/*"
                                        onchange="previewFile()">

                                    @error('profile_picture')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-lg-4 col-sm-6">

                                {{-- Password --}}
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password (Opsional)</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Isi jika ingin mengganti password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Konfirmasi Password --}}
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Ulangi password baru">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Submit --}}
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan!</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Preview Foto Script --}}
<script>
    function previewFile() {
        const file = document.getElementById("profile_picture").files[0];
        const preview = document.getElementById("previewImage");

        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    }
</script>
