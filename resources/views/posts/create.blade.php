<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>engineering blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/eng.ico') }}" type="image/x-icon">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script>
        tinymce.init({
          selector: '#mycontent'
        });
      </script>
    <style>
          body {
            background-color: white
            position: relative;
            min-height: 100vh;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .container {
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">engineering blog</a>
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
                @if(Auth::check())
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
        <h1 class="mb-4">Buat Postingan Baru</h1>
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" id="category" name="category">
                    <option value="web developer">Web Developer</option>
                    <option value="web design">Web Design</option>
                    <option value="mobile developer">Mobile Developer</option>
                    <option value="mobile web">Mobile Web</option>
                    <option value="iot">IOT</option>
                    <option value="networking">Networking</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="mycontent" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
