<div class="row">
    <div class="col-12">
        <form method="post" action="{{ route('updatewebinfo') }}" id="appinfoform" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class=" form-row">
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Website Name</h5>
                    <input type="text" name="site_name" class="form-control " value="{{ $settings->site_name }}"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Website Title</h5>
                    <input type="text" name="site_title" class="form-control " value="{{ $settings->site_title }}"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Website Keywords</h5>
                    <input type="text" name="keywords" class="form-control " value="{{ $settings->keywords }}"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Website Url (https://yoursite.com)</h5>
                    <input type="text" placeholder="https://yoursite.com" name="site_address" class="form-control "
                        value="{{ $settings->site_address }}" required>
                </div>

                <div class="form-group col-md-12">
                    <h5 class="text-{{ $text }}">Website Description</h5>
                    <textarea name="description" class="form-control " rows="4">{{ $settings->description }}</textarea>
                </div>
            </div>

            <div class=" form-row">
                <div class="form-group col-md-12">
                    <h5 class="text-{{ $text }}">Announcement</h5>
                    <textarea name="update" class="form-control " rows="2">{{ $settings->newupdate }}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Welcome messages for new registered users</h5>
                    <textarea name="welcome_message" class="form-control " rows="2">{{ $settings->welcome_message }}</textarea>
                    <small class="text-{{ $text }}">This message will be displayed to users whose registration
                        date is less than or equal to 3 days</small>
                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">Send Trades Email</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="trade_message" value="on" class="selectgroup-input"
                                {{ $settings->trade_mode == 'on' ? 'checked' : '' }}>
                            <span class="selectgroup-button">On</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="trade_message"
                                {{ $settings->trade_mode != 'on' ? 'checked' : '' }} value="off"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Off</span>
                        </label>
                    </div>
                    <div>
                        <small class="">if turned off, Users will not receive email when trade is executed.</small>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">whatsapp number</h5>
                    <input name="whatsapp" class="form-control " type="text"
                        value="{{ $settings->whatsapp }}">
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">NFT Gas Fee (ETH)</h5>
                    <input name="gasfee" class="form-control" type="text"
                        value="{{ $settings->gasfee }}" pattern="^\d*(\.\d{0,8})?$"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                </div>





                <div class="form-group col-md-12">
                    <h5 class="text-{{ $text }}">Timezone</h5>
                    <select name="timezone" class="form-control  select2">
                        <option>{{ $settings->timezone }}</option>
                        @foreach ($timezones as $list)
                            <option value="{{ $list }}">{{ $list }}</option>
                        @endforeach
                    </select>
                    <div class="mt-4">
                        <h5 class="text-{{ $text }}">Installation Type</h5>
                        <select name="install_type" class="form-control ">
                            <option>{{ $settings->install_type }}</option>
                            <option>Main-Domain</option>
                            <option>Sub-Domain</option>
                            <option>Sub-Folder</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Logo (Recommended size; max width, 200px and max height
                        100px.)</h5>
                    <input name="logo" class="form-control " type="file">
                    <div class="text-center border p-2 mt-2 rounded-none">
                        <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt=""
                            class="w-25 img-fluid">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Favicon (Recommended size: max width, 32px and max
                        height 32px.)</h5>
                    <input name="favicon" class="form-control " type="file">
                    <div class="text-center border p-2 mt-2 rounded-none">
                        <img src="{{ asset('storage/app/public/' . $settings->favicon) }}" alt=""
                            class="w-25 img-fluid">
                    </div>
                </div>
            </div>
            <div class="mt-3 form-row">
                <div class="col-12">
                    <input type="submit" class="px-5 btn btn-primary btn-lg" value="Update">
                </div>

            </div>

        </form>
    </div>
</div>
