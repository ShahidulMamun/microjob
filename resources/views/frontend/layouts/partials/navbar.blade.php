
<nav class="navbar navbar-expand-lg fixed-top bg-primary-subtle">
  @php 
  $setting = App\Models\WebsiteSetting::first();
  @endphp
    <div class="container">
      <a class="brand-logo" href="#">
        <span class="mark">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 12L12 4L20 12L12 20L4 12Z" fill="var(--brand-yellow-2)"/>
          </svg>
        </span>
          {{$setting->site_title}}
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
            <a class="nav-link" href="#categories">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#faq">Faq</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#share-&-earn">Share & Earn</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
              </li>
        </ul>
        <div class="d-flex gap-2 mt-3 mt-lg-0">
            <a class="btn btn-register" href="{{ route('register') }}" role="button">Register</a>
            <a class="btn btn-signin" href="{{ route('login') }}" role="button">Sign in</a>
        </div>
      </div>
    </div>
  </nav>
   