<header class='mb-4'>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{ route('homepage') }}">SCHOOL SITE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('homepage') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('classrooms.index') }}">Classrooms</a> <!-- questo ci porta sulla route classrooms che utilizza il metodo index -->
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('classrooms.create') }}">New Classroom</a> <!-- questo ci porta sulla route classrooms che utilizza il metodo index -->
              </li>
          </ul>
        </div>
     </nav>
</header>


