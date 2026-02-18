
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">University</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('books.index') }}">My Courses</a>
        </li>
        @can('view' , Auth::user())
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('users.students.show') }}">Students</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('users.teachers.show') }}">Teachers</a>
            </li>
        @endcan
        <li class="nav-item">
            <a href="{{ route('log.logout') }}" class="nav-link active" aria-current="page">Logout</a>
        </li>
  </div>
</nav>

