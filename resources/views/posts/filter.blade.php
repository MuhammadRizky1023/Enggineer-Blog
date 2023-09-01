<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>engineering blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/eng.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            position: relative;
            min-height: 100vh;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .image-card {
            width: 100%;
            height: 225px;
        }
        .card-link {
            text-decoration: none;
            color: black;
        }

       .card-title {
            margin-top: 0;
            font-size: 1.25rem;
        }

        .social-icons {
            font-size: 20px;
        }
        .social-icon {
            color: white;
        }
        .footer-text {
            font-size: 14px;
        }


    .card-category {
            font-size: 0.875rem;
      }

</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <h1 class="mb-0">Engineering Blog</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('posts') }}">Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href="{{ url('profile') }}">Profile</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="color: white">
                @if(Auth::check()) <!-- Cek apakah pengguna telah login -->
                    <form class="form-inline" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>


<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Engineering Blog</h1>
    </div>


    <div class="filtering">
    @foreach($categories as $category)
        <h2>{{ $category }}</h2>
        <div class="row">
            @foreach($posts as $post)
                @if ($post->category === $category)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <a href="{{ url("post/{$post->slug}") }}" class="card-link">
                                <img src="{{ asset($post->image) }}" class="card-img-top image-card" alt="Post Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-category">{{ $post->category }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
    </div>
</div>

    <footer class="mt-5 pt-5 pb-3 text-center bg-black">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="social-icons">
                        <a href="https://github.com/MuhammadRizky1023" class="social-icon"><i class="fab fa-github"></i></a>
                        <a href="https://www.linkedin.com/in/muhammad-rizky-734150173/" class="social-icon"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.instagram.com/rizky_muhammad01234/" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="text-white">&copy; 2023 engineering blog. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
