          <div class="col-12 col-xl-6">
            <div class="card p-4 h-100 rounded-2">
              <div class="c-head align-items-start">
                <div>
                  <h5 class="mb-1 fw-semibold">Our Community Members Earning</h5>
                  <div class="text-muted small">Total <b class="text-dark">16</b> Active Members</div>
                </div>
                <i class="bi bi-three-dots-vertical text-muted"></i>
              </div>
              <div class="row g-3 mt-2">
                <div class="col-4">
                  <div class="d-flex align-items-center gap-2"><span class="ic ic-lg" style="background:#8b5cf6"><i class="bi bi-person-fill"></i></span>
                    <div class="lh-sm">
                      <div class="small text-muted">Pending</div>
                      <div class="fs-5 fw-semibold">${{ Auth::user()->current_earning }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-flex align-items-center gap-2"><span class="ic ic-lg" style="background:#f5ac22"><i class="bi bi-person-fill"></i></span>
                    <div class="lh-sm">
                      <div class="small text-muted">Earned</div>
                      <div class="fs-5 fw-semibold">${{ Auth::user()->total_earning }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-flex align-items-center gap-2"><span class="ic ic-lg" style="background:#41c352"><i class="bi bi-person-fill"></i></span>
                    <div class="lh-sm">
                      <div class="small text-muted">Deposit</div>
                      <div class="fs-5 fw-semibold">${{ Auth::user()->current_deposit }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-6">
            <div class="card p-4 h-100 rounded-2">
              <div class="c-head align-items-start">
                <div>
                  <h5 class="mb-1 fw-semibold">Breaking News</h5>
                            @php $notices = App\Models\BreakingNotice::where('status','active')->get(); @endphp
                            @if($notices->count())
                            <div class="breaking-outer mt-2">
                              <div class="breaking-wrapper">
                                <div class="scroll-container">
                                  <div class="scroll-content">
                                    @foreach($notices as $notice)
                                      <span class="notice-item"> {{ $notice->description }}</span>
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endif
                        </div>
                      </div>
                  </div>
               </div>