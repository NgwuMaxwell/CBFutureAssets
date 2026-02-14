<div class="row mgt5">

    <!-- Total Trades -->
    <div class="col-4 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="activity-block  success">
            <div class="media">
                <div class="media-body">
                    <h5 class="font-weight-bold">
                        <span class="">{{ $totalTrades }}</span>
                    </h5>
                    <p>Total Trades</p>
                </div>
                <i class="fa fa-chart-line"></i>
            </div>
            <div class="row">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%;">
                        <span class="trackerball"></span>
                    </div>
                </div>
            </div>
            <i style="margin-top:-12px;" class="bg-icon text-center fa fa-chart-line"></i>
        </div>
    </div>

    <!-- Open Trades -->
    <div class="col-4 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="activity-block  success">
            <div class="media">
                <div class="media-body">
                    <h5 class="font-weight-bold">
                        <span class="">{{ $openTrades }}</span>
                    </h5>
                    <p>Open Trades</p>
                </div>
                <i class="fa fa-folder-open"></i>
            </div>
            <div class="row">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%;">
                        <span class="trackerball"></span>
                    </div>
                </div>
            </div>
            <i style="margin-top:-12px;" class="bg-icon text-center fa fa-folder-open"></i>
        </div>
    </div>

    <!-- Closed Trades -->
    <div class="col-4 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="activity-block  success">
            <div class="media">
                <div class="media-body">
                    <h5 class="font-weight-bold">
                        <span class="">{{ $closedTrades }}</span>
                    </h5>
                    <p>Closed Trades</p>
                </div>
                <i class="fa fa-folder"></i>
            </div>
            <div class="row">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%;">
                        <span class="trackerball"></span>
                    </div>
                </div>
            </div>
            <i style="margin-top:-12px;" class="bg-icon text-center fa fa-folder"></i>
        </div>
    </div>

    <!-- Total Profit/Loss -->
    {{-- <div class="col-4 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="activity-block  success">
            <div class="media">
                <div class="media-body">
                    <h5 class="font-weight-bold">
                        <span class="">{{ $settings->currency }}{{ number_format($totalProfit + $totalLoss, 2) }}</span>
                    </h5>
                    <p>Total Profit/Loss</p>
                </div>
                <i class="fa fa-dollar-sign"></i>
            </div>
            <div class="row">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%;">
                        <span class="trackerball"></span>
                    </div>
                </div>
            </div>
            <i style="margin-top:-12px;" class="bg-icon text-center fa fa-dollar-sign"></i>
        </div>
    </div> --}}


    <!-- Win/Loss Ratio -->
    <div class="col-4 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="activity-block  success">
            <div class="media">
                <div class="media-body">
                    <h5 class="font-weight-bold">
                        <span class="">{{ $winLossRatio }}</span>
                    </h5>
                    <p>Win/Loss Ratio</p>
                </div>
                <i class="fa fa-trophy"></i>
            </div>
            <div class="row">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%;">
                        <span class="trackerball"></span>
                    </div>
                </div>
            </div>
            <i style="margin-top:-12px;" class="bg-icon text-center fa fa-trophy"></i>
        </div>
    </div>

</div>
