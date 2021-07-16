<nav class="navbar navbar-expand-lg navbar-light nav fixed-top">
  <div class="container">
    <a class="navbar-brand text-white" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" href="/"><h5>Sistem Informasi B</h5></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/komik">Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/orang">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/pages/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/pages/contact">Contact</a>
                </li>
            <!-- Tombol Login -->
            <?php if (logged_in()) : ?>
                <a class="nav-link btn btn-sm btn-primary text-white" style="border-radius: 15%;" href="/logout"><b>Logout</b></a>
            <?php else : ?>
                <a class="nav-link btn btn-sm btn-primary text-white" style="border-radius: 15%;" href="/login"><b>Login</b></a>
            <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>