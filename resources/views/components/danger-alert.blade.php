<div>
    @if (Session::has('message'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-group alert-danger alert-icon alert-dismissible fade show" role="alert">
                    <div class="alert-group-prepend">
                        <span class="alert-group-icon text-">
                            <i class="far fa-thumbs-down"></i>
                        </span>
                    </div>
                    <div class="alert-content">
                        {{ Session::get('message') }}
                    </div>
                    
                </div>
            </div>
        </div>
    @endif
</div>
<div>
  