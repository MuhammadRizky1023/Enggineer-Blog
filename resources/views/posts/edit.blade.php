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
        <h1>Edit Post</h1>
        <form method="POST" action="{{ route('post.update', $post->slug) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="mycontent" rows="5">{{ $post->content }}</textarea>
            </div>


            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                    <option value="web developer" {{ $post->category === 'web developer' ? 'selected' : '' }}>Web Developer</option>
                    <option value="web design" {{ $post->category === 'web design' ? 'selected' : '' }}>Web Design</option>
                    <option value="mobile developer" {{ $post->category === 'mobile developer' ? 'selected' : '' }}>Mobile Developer</option>
                    <option value="mobile app" {{ $post->category === 'mobile web' ? 'selected' : '' }}>Mobile App</option>
                    <option value="iot" {{ $post->category === 'iot' ? 'selected' : '' }}>IoT</option>
                    <option value="networking" {{ $post->category === 'networking' ? 'selected' : '' }}>Networking</option>
                    <option value="networking" {{ $post->category === 'others' ? 'selected' : '' }}>Others</option>
                </select>
            </div>
            @if ($post->image)
            <div class="form-group">
                <label for="current-image" class="form-label">Current Image</label><br>
                <img src="{{ asset($post->image) }}" alt="Current Image" style="max-width: 300px">
            </div>
            @endif
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($post->image)
                    <small class="form-text text-muted">No selected file</small>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
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
</body>
</html>
