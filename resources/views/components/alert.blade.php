<div>
 @if(Auth::user()->taxtype=='on')
  <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-group alert-danger alert-icon  fade show" role="alert">
                    <div class="alert-group-prepend">
                        <span class="alert-group-icon text-">
                            <i class="far fa-thumbs-down"></i>
                        </span>
                    </div>
                    <div class="alert-content">
                        <p>You are required to pay Tax fee of {{ $settings->currency }}{{ number_format(Auth::user()->taxamount, 2, '.', ',') }}. </p>
                        <p> Contact support on {{$settings->contact_email}}</p>
                    </div> 
                    
            </div>
        </div>
    @endif
</div>
</div>