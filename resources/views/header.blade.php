<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid ">
    <div class="collapse navbar-collapse d-flex mb-3">
      <h4><a class="nav-link text text-primary p-2" href="{{route('posts.index')}}">Not Facebook</a></h4>
      <div class="ms-3 navbar-nav p-2">
        <a class="nav-link" href="{{route('posts.index')}}">All posts</a>
      </div>
      @auth
      <div class="ms-3 navbar-nav p-2">
        <a class="nav-link" href="{{route('posts.show')}}">My posts</a>
      </div>
      <div class="ms-3 navbar-nav ms-auto p-2 ">
        <a class="nav-link active" href="#">{{auth()->user()->name}}</a>
        <a class="nav-link badge rounded-pill text-bg-danger fs-6 p-3" href="{{route('login.logout')}}">Log out</a>
      </div>
      @endauth
      @guest
      <div class="ms-3 navbar-nav ms-auto p-2">
        <a class="nav-link badge rounded-pill text-bg-primary fs-6 p-3" href="{{route('login.form')}}">Log in</a>
      </div>
      @endguest
    </div>
  </div>
</nav>