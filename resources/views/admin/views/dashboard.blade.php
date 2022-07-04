<div class="container">
    <h3>Dashboard</h3>
    <div class="row mt-2 justify-content-center">
        <div class="col-lg-4 col-md-6 mt-3">
            <div class="card bg-primary text-white border-0 shadow">
                <div class="card-body">
                    <h5><i class="fas fa-ad"></i>&nbsp;Total Advertisement:&nbsp;
                        @if(isset($ads))
                            {{ count($ads) }}
                        @else
                            0
                        @endif
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-3">
            <div class="card bg-success text-white border-0 shadow">
                <div class="card-body">
                    <h5><i class="fas fa-file-alt"></i>&nbsp;Total Ad Forms:&nbsp;
                        @if(isset($categories))
                            {{ count($categories) }}
                        @else
                            0
                        @endif
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-3">
            <div class="card bg-warning text-white border-0 shadow">
                <div class="card-body">
                    <h5><i class="fas fa-user-lock"></i>&nbsp;Total Registered Users:&nbsp;
                        @if(isset($users))
                            {{ count($users) }}
                        @else
                            0
                        @endif
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-3">
            <div class="card bg-info text-white border-0 shadow">
                <div class="card-body">
                    <h5><i class="fas fa-child"></i>&nbsp;Total Guest Users:&nbsp;
                        @if(isset($guests))
                            {{ count($guests) }}
                        @else
                            0
                        @endif
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-3">
            <div class="card bg-primary text-white border-0 shadow">
                <div class="card-body">
                    <h5><i class="fas fa-coins"></i>&nbsp;Total Payments:&nbsp;
                        @if(isset($payments))
                            {{ 'Rs.'.number_format($payments).'/=' }}
                        @else
                            No Payment
                        @endif
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
