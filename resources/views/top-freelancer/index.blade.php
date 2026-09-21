@extends('user.layouts.app')
@section('content')
    <header class="topbar">
        @include('user.layouts.partials.navbar') 
    </header>
  <aside class="sidebar" id="sidebar">
      @include('user.layouts.partials.sidebar')
  </aside>
      <div class="content">
             <div class="row g-4">
               @include('user.layouts.partials.braking_news')
               <div class="col-lg-12">
                   <div class="card">
                       <div class="card-body">
                        <div class="row">
                            <!--top freelancer-->
                            <div class="col-lg-6">
                                {{-- Header --}}
                              <div class="d-flex gap-2 mb-4">
                                <div class="fl-header-icon">
                                  <i class="fa fa-bolt"></i>
                                </div>
                                <div class="text-center">
                                  <h5 class="mb-0" style="color:#1a1a2e;">Top 20 Freelancers</h5>
                                  <small class="text-muted">Ranked by total earnings</small>
                                </div>
                              </div>
                                {{-- Top 3 Podium --}}
                              @if(count($topfreelancers) >= 3)
                              <div class="row g-3 mb-4">
                                {{-- 2nd Place --}}
                                <div class="col-4 col-md-3 d-flex">
                                  <div class="podium-card podium-2 text-center w-100">
                                    <div class="podium-rank">ðŸ¥ˆ 2nd</div>
                                    <div class="podium-avatar">{{ strtoupper(substr($topfreelancers[1]->name, 0, 1)) }}</div>
                                    <div class="podium-name">{{ \Illuminate\Support\Str::limit($topfreelancers[1]->name, 12) }}</div>
                                    <div class="podium-earn">${{ number_format($topfreelancers[1]->total_earning, 2) }}</div>
                                  </div>
                                </div>
                        
                                {{-- 1st Place --}}
                                <div class="col-4 col-md-3 d-flex">
                                  <div class="podium-card podium-1 text-center w-100">
                                    <div class="podium-crown"><i class="fa fa-crown"></i></div>
                                    <div class="podium-rank">ðŸ¥‡ 1st</div>
                                    <div class="podium-avatar avatar-gold">{{ strtoupper(substr($topfreelancers[0]->name, 0, 1)) }}</div>
                                    <div class="podium-name">{{ \Illuminate\Support\Str::limit($topfreelancers[0]->name, 12) }}</div>
                                    <div class="podium-earn">${{ number_format($topfreelancers[0]->total_earning, 2) }}</div>
                                  </div>
                                </div>
                        
                                {{-- 3rd Place --}}
                                <div class="col-4 col-md-3 d-flex">
                                  <div class="podium-card podium-3 text-center w-100">
                                    <div class="podium-rank">ðŸ¥‰ 3rd</div>
                                    <div class="podium-avatar">{{ strtoupper(substr($topfreelancers[2]->name, 0, 1)) }}</div>
                                    <div class="podium-name">{{ \Illuminate\Support\Str::limit($topfreelancers[2]->name, 12) }}</div>
                                    <div class="podium-earn">${{ number_format($topfreelancers[2]->total_earning, 2) }}</div>
                                  </div>
                                </div>
                              </div>
                              @endif
                            </div>
                            <!--table-->
                             <div class="col-lg-6">
                                <div class="d-flex gap-2 mb-4">
                                <div class="fl-header-icon">
                                 <i class="bi bi-list-task"></i>
                                </div>
                                <div class="text-center">
                                  <h5 class="mb-0" style="color:#1a1a2e;">Top Freelancers Earnings</h5>
                                </div>
                              </div>
                            <div class="table-responsive">
                            <table class="table">
                              <thead class="table-light">
                                <tr>
                                  <th width="50">#</th>
                                  <th>Freelancer</th>
                                  <th>Total Earned</th>
                                  <th>Joined</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($topfreelancers as $index => $freelancer)
                                <tr class="{{ $index < 3 ? 'top-row' : '' }}">
                                  <td>
                                    
                                      <span class="rank-badge bronze">{{ $index + 1 }}</span>
                              
                                  </td>
                                  <td>
                                    <div class="d-flex align-items-center gap-2">
                                      <div class="fl-avatar-sm {{ $index === 0 ? 'avatar-gold' : '' }}">
                                        {{ strtoupper(substr($freelancer->name, 0, 1)) }}
                                      </div>
                                      <span class="fw-semibold">{{ $freelancer->name }}</span>
                                    </div>
                                  </td>
                                  <td>
                                    <span class="earn-pill">${{ number_format($freelancer->total_earning, 2) }}</span>
                                  </td>
                                  <td class="text-muted small">{{ $freelancer->created_at->format('d M Y') }}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                            </div>
                             </div>
                        </div>
                       </div>
                   </div>
               </div>
               </div>
               </div>
               
<footer class="mt-5 footer-section">
  @include('user.layouts.partials.footer')
</footer>
<style>
/*  Header Icon  */
.fl-header-icon {
  width: 42px; height: 42px;
  border-radius: 12px;
  background: #41c352;
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-size: 18px;
  flex-shrink: 0;
}

/*Podium Cards*/
.podium-card {
  border-radius: 6px;
  padding: 16px 10px;
  position: relative;
  transition: transform .2s;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 160px;
}
.podium-card:hover { transform: translateY(-3px); }

.podium-1 {
  background: #F0F9FF;
  border: 1px solid #8b5cf6;
  box-shadow: 0 4px 18px rgba(255,193,7,.25);
}
.podium-2 {
  background: #F0F9FF;
  border: 1px solid #8b5cf6;
  box-shadow: 0 4px 12px rgba(0,0,0,.08);
}
.podium-3 {
  background: #F0F9FF;
  border: 1px solid #8b5cf6;
  box-shadow: 0 4px 12px rgba(253,126,20,.15);
}

.podium-crown {
  font-size: 18px; color: #ffc107;
  margin-bottom: 2px;
}
.podium-rank {
  font-size: 11px; font-weight: 700;
  color: #6c757d;
  margin-bottom: 8px;
}
.podium-avatar {
  width: 44px; height: 44px;
  border-radius: 50%;
  background: #dee2e6;
  color: #495057;
  font-weight: 700; font-size: 17px;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 8px;
}
.avatar-gold {
  background: linear-gradient(135deg, #ffc107, #fd7e14) !important;
  color: #fff !important;
  box-shadow: 0 2px 10px rgba(255,193,7,.4);
}
.podium-name {
  font-size: 12px; font-weight: 600;
  color: #1a1a2e; margin-bottom: 4px;
  white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
  width: 100%;
}
.podium-earn {
  font-size: 13px; font-weight: 700; color: #8b5cf6;
}

/* â”€â”€ Desktop Table â”€â”€ */
.fl-table { border-collapse: separate; border-spacing: 0 6px; }
.fl-table thead th {
  background: #f8f9fa;
  border: none;
  font-size: 12px; font-weight: 700;
  text-transform: uppercase; letter-spacing: .8px;
  color: #6c757d; padding: 12px 16px;
}
.fl-table thead th:first-child { border-radius: 10px 0 0 10px; }
.fl-table thead th:last-child  { border-radius: 0 10px 10px 0; }
.fl-table tbody tr td {
  background: #fff;
  border: none;
  padding: 12px 16px;
  vertical-align: middle;
}
.fl-table tbody tr td:first-child { border-radius: 10px 0 0 10px; }
.fl-table tbody tr td:last-child  { border-radius: 0 10px 10px 0; }
.fl-table tbody tr {
  box-shadow: 0 1px 6px rgba(0,0,0,.05);
  transition: box-shadow .2s;
}
.fl-table tbody tr:hover { box-shadow: 0 4px 16px rgba(0,0,0,.10); }
.fl-table tbody tr.top-row td { background: #f0faf4; }

/* â”€â”€ Rank Badges â”€â”€ */
.rank-badge {
  display: inline-flex; align-items: center; justify-content: center;
  width: 28px; height: 28px; border-radius: 50%;
  font-size: 12px; font-weight: 700; flex-shrink: 0;
}
.rank-badge.gold   { background: #FFD700; color: #fff; }
.rank-badge.silver { background: #41c352; color: #fff; }
.rank-badge.bronze { background: #8b5cf6; color: #fff; }

/* â”€â”€ Avatar SM â”€â”€ */
.fl-avatar-sm {
  width: 34px; height: 34px; border-radius: 50%;
  background: #e8f5ee; color: #198754;
  font-weight: 700; font-size: 14px;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}

/* â”€â”€ Earn Pill â”€â”€ */
.earn-pill {
  background: #8b5cf6;
  color: #fff;
  font-weight: 700; font-size: 13px;
  padding: 4px 12px; border-radius: 20px;
  white-space: nowrap;
  display: inline-block;
}

/* â”€â”€ Mobile Rows â”€â”€ */
.fl-mobile-row {
  padding: 12px 4px;
  border-bottom: 1px solid #f0f0f0;
}
.fl-mobile-row.fl-top3 {
  background: #f8fff9;
  border-radius: 10px;
  padding: 12px 10px;
  margin-bottom: 4px;
  border-bottom: none;
}
.fl-rank-num {
  width: 24px; text-align: center;
  font-size: 13px; color: #adb5bd; font-weight: 600;
  flex-shrink: 0;
}
</style>

@endsection