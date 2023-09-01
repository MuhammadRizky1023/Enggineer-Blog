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
        .blog-header-logo {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif;
            font-size: 2.25rem;
        }

        .blog-header-logo:hover {
            text-decoration: none;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif;
        }

        .flex-auto {
            flex: 0 0 auto;
        }

        .h-250 { height: 250px; }
        @media (min-width: 768px) {
            .h-md-250 { height: 250px; }
        }

        /* Pagination */
        .blog-pagination {
            margin-bottom: 4rem;
        }

        /*
        * Blog posts
        */
        .blog-post {
            margin-bottom: 4rem;
        }
        .blog-post-meta {
            margin-bottom: 0.5rem;
            color: #727272;
        }

        .img-content {
            display: block;
            margin: 1.5rem auto;
            max-width: 100%;
            max-height: 400px; /* Perkecil ukuran tinggi gambar */
            height: auto;
        }

        .comment-card {
            margin: 1rem 0;
            border: none;
            box-shadow: none;
        }

        .comment-text {
            font-size: 14px;
        }
    </style>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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

    <div class="container">
        <article class="blog-post">
            <h2 class="display-4 link-body-emphasis mb-3">{{$post->title}}</h2>
            <p class="blog-post-meta">Tebuat pada {{$post->created_at}}</p>
            <img src="{{ asset($post->image) }}" class="img-fluid img-content" alt="Post Image">
            <p class="blog-post-meta">Category: {{$post->category}}</p>
            <p>{{$post->content}}</p>
            <small class="text-muted">{{$total_comments}} Comments</small>
            @foreach ($comments as $comment)
            <div class="card comment-card">
                <div class="card-body">
                    <p class="card-text comment-text">{{ $comment->comment }}</p>
                </div>
            </div>
            @endforeach
        </article>
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
