<nav class="nv-op navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <nav class="navbar bg-light">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/ybm.png') }}" onclick="window.location.href='/welcome'" alt="Bootstrap" style="width:150px !important;">
              </a>
            </div>
          </nav>
      <button class="navbar-toggler m-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="d-flex justify-content-end m-3">
      <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item d-inline">
                    <h2 onclick="window.location.href= '/page-user'" class="fa fa-id-card-clip p-2 text-dark" style="background-color: rgba(190, 185, 185, 0.705); border-radius: 8px;"></h2>
                    <h2 onclick="window.location.href= '/page-mahasantri'" class="fa fa-users p-2 text-dark" style="background-color: rgba(190, 185, 185, 0.705); border-radius: 8px;"></h2>
                    <h2 onclick="window.location.href= '/page-outing'" class="fa fa-file-pen p-2 text-dark" style="background-color: rgba(190, 185, 185, 0.705); border-radius: 8px;"></h2>
                    <h2 onclick="window.location.href= '/page-logging'" class="fa fa-calendar-check p-2 text-dark" style="background-color: rgba(190, 185, 185, 0.705); border-radius: 8px;"></h2>
                </li>
            </ul>
        </div>
      </div>
    </div>
  </nav>
