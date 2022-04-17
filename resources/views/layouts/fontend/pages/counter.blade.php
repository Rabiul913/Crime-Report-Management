
@if (Auth::check())
<div class="container">
    <div class="row">
        <div class="four col-md-4">
            <div class="counter-box colored"> <i class="fa fa-solid fa-users"></i> <span class="counter">3</span>
                <p>Total Complaints</p>
            </div>
        </div>
        <div class="four col-md-4">
            <div class="counter-box"> <i class="fa fa-solid fa-gas-pump"></i><span class="counter">2</span>
                <p>Running Complaints</p>
            </div>
        </div>
        <div class="four col-md-4">
            <div class="counter-box"> <i class="fa fa-shopping-cart"></i> <span class="counter">1</span>
                <p>Rejected Complaints</p>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row">
        <div class="four col-md-4">
            <div class="counter-box colored"> <i class="fa fa-solid fa-users"></i> <span class="counter">2147</span>
                <p>Complaints</p>
            </div>
        </div>
        <div class="four col-md-4">
            <div class="counter-box"> <i class="fa fa-solid fa-gas-pump"></i><span class="counter">3275</span>
                <p>Police Station</p>
            </div>
        </div>
        <div class="four col-md-4">
            <div class="counter-box"> <i class="fa fa-shopping-cart"></i> <span class="counter">289</span>
                <p>Investigation Officer</p>
            </div>
        </div>
    </div>
</div>
@endif


