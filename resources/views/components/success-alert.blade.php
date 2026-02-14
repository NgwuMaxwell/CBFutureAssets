<div>
    @if (Session::has('success'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-group alert-success alert-icon alert-dismissible fade show" role="alert">
                    <div class="alert-group-prepend">
                        <span class="alert-group-icon text-">
                            <i class="far fa-thumbs-up"></i>
                        </span>
                    </div>
                    <div class="alert-content">
                        {{ Session::get('success') }}
                    </div>
                   
                </div>
            </div>
        </div>
    @endif
</div>
