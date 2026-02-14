@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content  ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Manage clients Trades</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <x-error-alert />
                <div class="mb-5 row">

                    <div class="col-12 card shadow p-4 ">


                        <div class="container">
                            <h3>Create Trade for User</h3>

                            <form action="{{ route('admin.trades.store') }}" method="POST">
                                @csrf

                                <div class="form-group">

                                        <label for="user">Select User</label>
                                         <select name="user_id"   class="form-control" required>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>

                                      @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Asset Type</label>
                                    <select name="asset_type"  id="asset_type" class="form-control" required>

                                        <option value="crypto">Crypto</option>
                                        <option value="stock">Stock</option>
                                        <option value="forex">Forex</option>
                                    </select>
                                </div>


                                    <div class="form-group">
                                        <label>Asset Name</label>

                <div id="trade_pair1_container" style='text-align: left;'>
                <select name="asset_name" class="form-control" style='text-align: left;'>
                    <option value="USDT/BTC" data-icon='../includes/icons/bitcoin.png'>USDT/BTC</option>
                    <option value="USDT/ETH" data-icon='../includes/icons/eth.png'>USDT/ETH</option>
                    <option value="USDT/TRX" data-icon='../includes/icons/tron.png'>USDT/TRX</option>
                    <option value="USDT/SOL" data-icon='../includes/icons/Solana_logo.png'>USDT/SOL</option>
                    <option value="USDT/LTC" data-icon='../includes/icons/lite.png'>USDT/LTC</option>
                    <option value="USDT/BNB" data-icon='../includes/icons/bnb.png'>USDT/BNB</option>
                    <option value="USDT/LINK" data-icon='../includes/icons/link.png'>USDT/LINK</option>
                    <option value="USDT/FTT" data-icon='../includes/icons/ftt.png'>USDT/FTT</option>
                    <option value="USDT/SHIB" data-icon='../includes/icons/shib.png'>USDT/SHIB</option>
                    <option value="USDT/ETC" data-icon='../includes/icons/etc.png'>USDT/ETC</option>
                    <option value="USDT/TFUEL" data-icon='../includes/icons/tfuel.png'>USDT/TFUEL</option>
                    <option value="USDT/ADA" data-icon='../includes/icons/ada.png'>USDT/ADA</option>
                    <option value="USDT/VET" data-icon='../includes/icons/vet.png'>USDT/VET</option>
                </select>
                </div>


                <div id="trade_pair2_container" style='text-align: left; display: none'>
                <select name="asset_name" id="trade_pair_two" class="form-control">
                    <option value="FACEBOOK INC" data-icon='../includes/icons/facebook.png' >FACEBOOK INC</option>
                    <option value="BOEING CO" data-icon='../includes/icons/boeing.png' >BOEING CO</option>
                    <option value="APPLE INC" data-icon='../includes/icons/apple.png' >APPLE INC</option>
                    <option value="AMAZON COM INC" data-icon='../includes/icons/amazon.png' >AMAZON COM INC</option>
                    <option value="MICROSOFT CORP" data-icon='../includes/icons/microsoft.png' >MICROSOFT CORP</option>
                    <option value="NETFLIX INC" data-icon='../includes/icons/netflix.png' >NETFLIX INC</option>
                    <option value="MICRON TECHNOLOGY INC" data-icon='../includes/icons/mircon.png' >MICRON TECHNO...</option>
                    <option value="NVIDIA CORP" data-icon='../includes/icons/nvidia.png' >NVIDIA CORP</option>
                    <option value="CANOPY GROWTH INCORPORATION" data-icon='../includes/icons/canopy.png' >CANOPY GROW...</option>
                    <option value="TESLA INC" data-icon='../includes/icons/tesla.png' >TESLA INC</option>
                    <option value="TWITTER INC" data-icon='../includes/icons/twitter.png' >TWITTER INC</option>
                    <option value="SBERBANK RUSSIA" data-icon='../includes/icons/sberbank.png' >SBERBANK RUS...</option>
                    <option value="CRONOS GROUP INC" data-icon='../includes/icons/cronos.png' >CRONOS GROUP INC</option>
                    <option value="PENNYMAC FINCANCIAL SERVICES INC" data-icon='../includes/icons/pennymac.png' >PENNYMAC FINCA...</option>
                    <option value="PAN AMERICAN SILVER CORP" data-icon='../includes/icons/pan.png' >PAN AME...</option>
                    <option value="BANK OF AMERICAN CORPORATION" data-icon='../includes/icons/bank.png' >BANK OF AMERI...</option>
                    <option value="INTEL CORP" data-icon='../includes/icons/intel.png' >INTEL CORP</option>
                    <option value="RELIANCE INDS" data-icon='../includes/icons/reliance.png' >RELIANCE INDS</option>
                    <option value="ELECTRONIC ARTS INC" data-icon='../includes/icons/electronic.png' >ELECTRONIC AR...</option>
                    <option value="SAMSUNG LIFE" data-icon='../includes/icons/samsung.png' >SAMSUNG LIFE</option>
                    <option value="SHOPIFY INC" data-icon='../includes/icons/shopify.png' >SHOPIFY INC</option>
                    <option value="PAYPAL HONDINGS INC" data-icon='../includes/icons/paypal.png' >PAYPAL HONDINGS INC</option>
                </select>
                </div>

                <div id="trade_pair3_container" style='text-align: left;  display: none '>
                <select name="asset_name" id="trade_pair_three" class="form-control" >
                    <option value="GBPUSD" data-icon='../includes/icons/gbpusd.png'>GBPUSD, Pound vs US Dollar</option>
                    <option value="EURAUD" data-icon='../includes/icons/euraud.png'>EURAUD, Euro vs Australian Dollar</option>
                    <option value="EURCHF" data-icon='../includes/icons/eurchf.png'>EURCHF, Euro vs Swiss Franc</option>
                    <option value="EURGBP" data-icon='../includes/icons/eurgbp.png'>EURGBP, Euro vs Great Britain</option>
                    <option value="GBPCAD" data-icon='../includes/icons/gbpcad.png'>GBPCAD, Great Britain Pound vs Canadian Dollar</option>
                    <option value="NZDUSD" data-icon='../includes/icons/nzdusd.png'>NZDUSD, New Zealand vs US Dollar</option>
                    <option value="EURNZD" data-icon='../includes/icons/eurusd.png'>EURNZD, Euro vs New Zealand</option>
                    <option value="CADJPYm" data-icon='../includes/icons/cadjpym.png'>CADJPYm, Canadian Dollar vs Japanise Yen AUDJPYm, Australian Dollar vs Japanise Yen</option>
                    <option value="USDCHF" data-icon='../includes/icons/eurchf.png'>USDCHF, US Dollar vs Swiss Franc</option>
                    <option value="GBPAUD" data-icon='../includes/icons/gbpaud.png'>GBPAUD, Great Britain Pound vs Australian Dollar</option>
                    <option value="USDTRY" data-icon='../includes/icons/usdtry.png'>USDTRY, US Dollar vs Turkish New Lira</option>
                    <option value="USD vs THB" data-icon='../includes/icons/usdthb.png'>USD vs THB</option>
                    <option value="AUD vS USD" data-icon='../includes/icons/gbpaud.png'>AUD vS USD</option>
                    <option value="CAD vs JPY" data-icon='../includes/icons/cadjpym.png'>CAD vs JPY</option>
                    <option value="EURUSD" data-icon='../includes/icons/eurusd.png'>EURUSD, Euro vs US Dollar</option>
                    <option value="USDRUB" data-icon='../includes/icons/usdrub.png'>USDRUB, US Dollar vs Russian Ruble</option>
                    <option value="XAUUSD" data-icon='../includes/icons/xauusd.png'>XAUUSD, Gold vs US Dollar</option>
                    <option value="NZDJPY" data-icon='../includes/icons/cadjpym.png'> NZDJPY, New Zealand Dollar vs Japanise Yen</option>
                </select>
                </div>


                                    </div>


                                <div class="form-group">
                                    <label>Action</label>
                                    <select name="action" class="form-control" required>
                                        <option value="BUY">Buy</option>
                                        <option value="SELL">Sell</option>
                                    </select>
                                </div>


                                <div class="mb-4">
                                    <label class="block">Leverage:</label>

                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <input type="text" name="leverage" id="leverageValue" class="text-black text-center font-medium px-3 py-2 border border-gray-300 rounded w-20 bg-white" value="50x" readonly>

                                        <!-- Buttons - added spacing, hover effects, and better colors -->
                                        <button type="button" class="px-3 py-2 text-sm font-medium bg-gray-200 text-gray-800 rounded hover:bg-gray-300" onclick="setLeverage(5)">5x</button>
                                        <button type="button" class="px-3 py-2 text-sm font-medium bg-gray-200 text-gray-800 rounded hover:bg-gray-300" onclick="setLeverage(10)">10x</button>
                                        <button type="button" class="px-3 py-2 text-sm font-medium bg-gray-200 text-gray-800 rounded hover:bg-gray-300" onclick="setLeverage(25)">25x</button>
                                        <button type="button" class="px-3 py-2 text-sm font-medium bg-gray-200 text-gray-800 rounded hover:bg-gray-300" onclick="setLeverage(30)">30x</button>
                                        <button type="button" class="px-3 py-2 text-sm font-medium bg-gray-200 text-gray-800 rounded hover:bg-gray-300" onclick="setLeverage(40)">40x</button>
                                        <button type="button" class="px-3 py-2 text-sm font-medium bg-gray-200 text-gray-800 rounded hover:bg-gray-300" onclick="setLeverage(50)">50x</button>
                                        <button type="button" class="px-3 py-2 text-sm font-medium bg-gray-600 text-white rounded hover:bg-blue-700" onclick="setLeverage(60)">60x</button>
                                        <button type="button" class="px-3 py-2 text-sm font-medium bg-gray-200 text-gray-800 rounded hover:bg-gray-300" onclick="setLeverage(70)">70x</button>
                                        <button type="button" class="px-3 py-2 text-sm font-medium bg-gray-200 text-gray-800 rounded hover:bg-gray-300" onclick="setLeverage(80)">80x</button>
                                        <button type="button" class="px-3 py-2 text-sm font-medium bg-gray-200 text-gray-800 rounded hover:bg-gray-300" onclick="setLeverage(90)">90x</button>
                                        <button type="button" class="px-3 py-2 text-sm font-medium bg-gray-200 text-gray-800 rounded hover:bg-gray-300" onclick="setLeverage(100)">100x</button>
                                    </div>

                                    <!-- Range slider with improved design -->
                                    <input type="range" id="leverageSlider" min="1" max="100" value="50"
                                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-blue-600"
                                        oninput="updateLeverage()">

                                    <p class="text-xs text-gray-500 mt-1">Drag slider or click buttons to select leverage.</p>
                                </div>

                                <script>
                                    function updateLeverage() {
                                        const slider = document.getElementById('leverageSlider');
                                        const leverageValue = document.getElementById('leverageValue');
                                        leverageValue.value = slider.value + 'x';
                                    }

                                    function setLeverage(value) {
                                        document.getElementById('leverageSlider').value = value;
                                        document.getElementById('leverageValue').value = value + 'x';
                                    }
                                </script>

                                <div class="form-group">
                                    <label>Amount ($)</label>
                                    <input type="number" step="0.01" name="amount" class="form-control" required>
                                </div>
                                 <div class="form-group" style="display: flex; gap: 10px; align-items: center;">
                                    <div>
                                        <label for="take_profit">Take Profit :</label>
                                        <input type="number" step="any" name="take_profit"   class='form-control'value="0.00">
                                    </div>
                                    <div>
                                        <label for="stop_loss">Stop Loss :</label>
                                        <input type="number" step="any" name="stop_loss" class='form-control' value="0.00">
                                    </div>
                                </div>


                                <div class="form-group mb-2">
                                    <label>Duration </label>
                                    <select name="duration" id="duration" class="form-control" required>
                                        <option value="15">15 Minutes</option>
                                        <option value="30">30 Minutes</option>
                                        <option value="60">1 Hour (60 Minutes)</option>
                                        <option value="120">2 Hours (120 Minutes)</option>
                                        <option value="1440">1 Day (1440 Minutes)</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Create Trade</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>



            @endsection
