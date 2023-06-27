@if (Session::has('sukses'))
  <div class="col-md-6">
    <div id="alert" class="alert alert-info" style="width:300px;right: 36px;top: 60px;cursor: auto;opacity: 10;position: fixed;z-index: 1060;display: block !important;transition: visibility 0s 2s, opacity 20s linear;">
        <div class="d-flex justify-content-between">
            <div><span class="fa fa-check"></span> <strong>Sukses</strong></div>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <hr class="message-inner-separator">
        <p>{{ Session::get('sukses') }}</p>
    </div>
  </div>

@elseif (Session::has('gagal'))
 <div class="col-md-6">
    <div id="alert" class="alert alert-danger" style="width:300px;right: 36px;top: 60px;cursor: auto;opacity: 10;position: fixed;z-index: 1060;display: block !important;transition: visibility 0s 2s, opacity 20s linear;">
        <div class="d-flex justify-content-between">
            <div><span class="fa fa-times"></span> <strong>Gagal</strong></div>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <hr class="message-inner-separator">
        <p>{{ Session::get('gagal') }}</p>
    </div>
  </div>

@endif