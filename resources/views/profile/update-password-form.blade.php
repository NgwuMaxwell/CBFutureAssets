<form method="POST" action="{{route('updateuserpass')}}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="mb-3 col-md-6">
            <label class="">Old Password</label>
            <input type="password" name="current_password" class="form-control " required>
        </div>
        <div class="mb-3 col-md-6">
            <label class="">New Password</label>
            <input type="password" name="password" class="form-control " required>
        </div>
        <div class="mb-3 col-md-6">
            <label class="">Confirm New Password</label>
            <input type="password" name="password_confirmation" class=" form-control" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Password</button>
</form>
<div class="mt-4">
    <a href="{{ route('twofa') }}" class="text-decoration-none">{{ __('Advance Account Settings') }} <i class="fas fa-arrow-right"></i> </a>
</div>

<div class="row">
                <div class="col-lg offset-lg-3">
                    <div class="alert alert-light mw-450px" role="alert">
                        <h4 class="mb-3">Password requirements:</h4>
                        <ul class="p-3 mb-0">
                            <li>Minimum 8 characters long - the more, the better</li>
                            <li>At least one lowercase character</li>
                            <li>At least one uppercase character</li>
                            <li>At least one number, symbol.</li>
                        </ul>
                    </div>
                </div>
            </div> <!-- / .row -->