
    <button class="top-side-toggle" id="mobileToggle" title="Toggle sidebar"><i class="bi bi-list"></i></button>
        <div class="ms-auto d-flex align-items-center gap-3">
               @php
               $notifications = App\Models\UserNotification::where('user_id', Auth::user()->id)
               ->where('status','pending')->orderBy('id','desc')->get();
              @endphp 
          <div class="dropdown bell-drop">
            <button class="bell" id="bellBtn" aria-expanded="false" aria-haspopup="true">
                <i class="bi bi-bell-fill"></i>
                 @if($notifications->count() > 0)
                <span class="badge rounded-pill">
                     {{ $notifications->count() }}
                </span>
                 @endif
                </button>
            
            <div class="dropdown-menu dropdown-menu-end bell-menu" id="bellMenu">
              <div class="bell-menu-head">
                  <span>Notifications</span>
                   @if($notifications->count() > 0)
                  <span class="bell-count">{{ $notifications->count() }}</span>
                   @endif
                  </div>
              <div class="bell-menu-scroll">
                     @forelse($notifications as $notification)
                <a href="javascript:void(0)" class="bell-item notification-item {{ $notification->status=='pending' ? 'bg-light' : '' }}"  
                data-id="{{ $notification->id }}"
                data-title="{{ $notification->title }}"
                data-message="{{ $notification->message }}"
                data-time="{{ $notification->created_at->diffForHumans() }}"
                data-bs-toggle="modal" data-bs-target="#notificationModal">
                    <span class="ic ic-sm ic-round" style="background:#8b5cf6">
                        <i class="bi bi-bell-fill"></i>
                        </span>
                  <div class="bell-txt">
                    <div class="bell-title">{{ Str::limit($notification->title, 35) }}</div>
                    <div class="bell-time">{{ $notification->created_at->diffForHumans() }}</div>
                  </div>
                </a>
                 @empty
                <p class="text-center">No notifications found</p>
                 @endforelse
              </div>
            </div>
          </div>
          <!--photo-->
          <!--<div class="vr d-none d-sm-block"></div>-->
          <div class="dropdown user-drop">
            <button class="user-btn" id="userMenuBtn" aria-expanded="false" aria-haspopup="true">
              <span class="fw-medium d-none d-sm-inline">{{ Auth::user()->name }}</span>
                @if(Auth::user()->photo)
              <span class="av">
               <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="avatar">
                </span>
                @else
               <p>Not Found</p>
              @endif
            </button>
            <div class="dropdown-menu dropdown-menu-end user-menu" id="userMenu">
              <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="bi bi-person-fill"></i>Profile</a>
              <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="bi bi-gear-wide-connected"></i>Settings</a>
              <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="bi bi-lock-fill"></i>Password</a>
              <div class="dropdown-divider"></div>
              <!--logout-->
              <a class="dropdown-item logout" href="{{ route('logout') }}" 
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="bi bi-box-arrow-right"></i>Logout</a>
               <form id="logout-form" method="POST" action="{{ route('logout') }}">@csrf</form>
            </div>
          </div>
        </div>
      </header>
      
      

        <!-- ══ NOTIFICATION MODAL ══ -->
        <div class="modal fade" id="notificationModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 id="notificationTitle" class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <p id="notificationMessage"></p>
                <small id="notificationTime" class="text-muted"></small>
              </div>
            </div>
          </div>
        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script>
/* offcanvas nav link click → close then navigate */
document.querySelectorAll('.oc-nav-link').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const url = this.getAttribute('href');
    const offcanvasEl = document.getElementById('rightMenu');
    const offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasEl);
    if (offcanvasInstance) {
      offcanvasEl.addEventListener('hidden.bs.offcanvas', function handler() {
        offcanvasEl.removeEventListener('hidden.bs.offcanvas', handler);
        window.location.href = url;
      });
      offcanvasInstance.hide();
    } else {
      window.location.href = url;
    }
  });
});
  item.addEventListener('click', function () {
    document.getElementById('notificationTitle').innerText   = this.dataset.title;
    document.getElementById('notificationMessage').innerText = this.dataset.message;
    document.getElementById('notificationTime').innerText    = this.dataset.time;
    fetch(`/user/notification/read/${this.dataset.id}`, {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
    }).then(r => r.json()).then(d => { if (d.success) this.classList.remove('bg-light'); });
  });
});
</script>
      
      
       <script>
    document.querySelectorAll('.pie').forEach(function(svg) {
      var data = JSON.parse(svg.dataset.pie),
        total = data.reduce(function(a, b) {
          return a + b[1];
        }, 0);
      var cx = 110,
        cy = 110,
        r = 100,
        start = -Math.PI / 2,
        ns = 'http://www.w3.org/2000/svg';
      data.forEach(function(d) {
        var ang = d[1] / total * Math.PI * 2,
          end = start + ang,
          large = ang > Math.PI ? 1 : 0;
        var p = document.createElementNS(ns, 'path');
        if (d[1] / total >= 0.999) {
          p.setAttribute('d', 'M ' + cx + ' ' + (cy - r) + ' A ' + r + ' ' + r + ' 0 1 1 ' + (cx - 0.01) + ' ' + (cy - r) + ' Z');
        } else {
          p.setAttribute('d', 'M ' + cx + ' ' + cy + ' L ' + (cx + r * Math.cos(start)) + ' ' + (cy + r * Math.sin(start)) +
            ' A ' + r + ' ' + r + ' 0 ' + large + ' 1 ' + (cx + r * Math.cos(end)) + ' ' + (cy + r * Math.sin(end)) + ' Z');
        }
        p.setAttribute('fill', d[2]);
        svg.appendChild(p);
        var mid = start + ang / 2,
          tx = cx + r * 0.62 * Math.cos(mid),
          ty = cy + r * 0.62 * Math.sin(mid);
        var t = document.createElementNS(ns, 'text');
        t.setAttribute('x', tx);
        t.setAttribute('y', ty);
        t.setAttribute('fill', '#fff');
        t.setAttribute('text-anchor', 'middle');
        t.setAttribute('dominant-baseline', 'middle');
        t.setAttribute('font-size', '14');
        t.setAttribute('font-weight', '700');
        t.textContent = Math.round(d[1] / total * 100) + '%';
        svg.appendChild(t);
        start = end;
      });
    });
    var ub = document.getElementById('userMenuBtn'),
      um = document.getElementById('userMenu');
    var bb = document.getElementById('bellBtn'),
      bm = document.getElementById('bellMenu');

    function closeAll() {
      if (um) {
        um.classList.remove('show');
        ub.setAttribute('aria-expanded', 'false');
      }
      if (bm) {
        bm.classList.remove('show');
        bb.setAttribute('aria-expanded', 'false');
      }
    }
    if (ub) {
      ub.addEventListener('click', function(e) {
        e.stopPropagation();
        var willOpen = !um.classList.contains('show');
        closeAll();
        if (willOpen) {
          um.classList.add('show');
          ub.setAttribute('aria-expanded', 'true');
        }
      });
      um.addEventListener('click', function(e) {
        e.stopPropagation();
      });
    }
    if (bb) {
      bb.addEventListener('click', function(e) {
        e.stopPropagation();
        var willOpen = !bm.classList.contains('show');
        closeAll();
        if (willOpen) {
          bm.classList.add('show');
          bb.setAttribute('aria-expanded', 'true');
        }
      });
      bm.addEventListener('click', function(e) {
        e.stopPropagation();
      });
    }
    document.addEventListener('click', closeAll);
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeAll();
      }
    });
    var mt = document.getElementById('mobileToggle'),
      st = document.getElementById('sideToggle'),
      bd = document.getElementById('backdrop');

    function toggleSidebar() {
      if (window.innerWidth < 992) {
        document.body.classList.toggle('side-open');
      } else {
        document.body.classList.toggle('mini');
      }
    }
    if (mt) mt.addEventListener('click', toggleSidebar);
    if (bd) bd.addEventListener('click', function() {
      document.body.classList.remove('side-open');
    });
    if (st) st.addEventListener('click', toggleSidebar);
  </script>
