<!-- User Dashboard Statistics card -->
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card" style="border-left: 3px solid #ffc107;">
            <div class="card-body py-4">
                <div class="float-end mt-1"
                    style="position:relative;background:#ffc1071a;height:60px;width:60px;line-height:60px;line-height:60px;text-align:center;color:#ffc107;font-size:28px;border-radius:50px;">
                    <i class="dripicons-shopping-bag"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 mt-2" style="font-weight: 800;">ACTIVE ORDERS</h6>
                    <h4 class="mb-1 mt-2 text-warning"> <span
                            data-plugin="counterup">{{ $service_active_orders }}</span></h4>
                </div>
            </div>
        </div>
    </div> <!-- end col-->
    <div class="col-md-6 col-xl-3">

        <div class="card" style="border-left: 3px solid #0062cc;">
            <div class="card-body py-4">
                <div class="float-end mt-1"
                    style="position:relative;background:#0062cc17;height:60px;width:60px;line-height:60px;line-height:60px;text-align:center;color:#0062cc;font-size:28px;border-radius:50px;">
                    <i class="dripicons-shopping-bag"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 mt-2" style="font-weight: 800;">COMPLETED ORDERS</h6>
                    <h4 class="mb-1 mt-2 text-primary"> <span
                            data-plugin="counterup">{{ $service_complete_orders }}</span></h4>
                </div>
            </div>
        </div>
    </div> <!-- end col-->
    <div class="col-md-6 col-xl-3">
        <div class="card" style="border-left: 3px solid #1e7e34;">
            <div class="card-body py-4">
                <div class="float-end mt-1"
                    style="position:relative;background:#1e7e341c;height:60px;width:60px;line-height:60px;line-height:60px;text-align:center;color:#1e7e34;font-size:28px;border-radius:50px;">
                    <i class="fas fa-wallet"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 mt-2" style="font-weight: 800;">WALLET BALANCE</h6>
                    <h4 class="mb-1 mt-2 text-success">$ <span
                            data-plugin="counterup">{{ $current_balance ?? 00.0 }}</span>
                    </h4>
                </div>
            </div>
        </div>
    </div> <!-- end col-->
    <div class="col-md-6 col-xl-3">
        <div class="card" style="border-left: 3px solid #1e7e34;">
            <div class="card-body py-4">
                <div class="float-end mt-1"
                    style="position:relative;background:#1e7e341c;height:60px;width:60px;line-height:60px;line-height:60px;text-align:center;color:#1e7e34;font-size:28px;border-radius:50px;">
                    <i class="uil-dollar-sign"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 mt-2" style="font-weight: 800;">WALLET LIFETIME SPENDING</h6>
                    <h4 class="mb-1 mt-2 text-success">$ <span data-plugin="counterup">{{ $spending ?? 00.0 }}</span>
                    </h4>
                </div>
            </div>
        </div>
    </div> <!-- end col-->
</div>
<!-- User Dashboard Statics card -->
