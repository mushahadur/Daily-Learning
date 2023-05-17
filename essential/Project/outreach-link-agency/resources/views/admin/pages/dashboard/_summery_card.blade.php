<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card" style="border-left: 3px solid #1e7e34;">
            <div class="card-body py-4">
                <div class="float-end mt-1"
                    style="position:relative;background:#0062cc17;height:60px;width:60px;line-height:60px;line-height:60px;text-align:center;color:#1e7e34;font-size:28px;border-radius:50px;">
                    <i class="bx bx-credit-card"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 mt-1" style="font-weight: 800;">TOTAL REVENUE</h6>
                    <h4 class="mb-0 mt-2 text-success"> $ <span data-plugin="counterup">{{ $totalRevenew ?? '00' }}</span></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card" style="border-left: 3px solid #0062cc;">
            <div class="card-body py-4">
                <div class="float-end mt-1"
                    style="position:relative;background:#0062cc17;height:60px;width:60px;line-height:60px;line-height:60px;text-align:center;color:#0062cc;font-size:28px;border-radius:50px;">
                    <i class="bx bxs-user"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 mt-1" style="font-weight: 800;">TOTAL USERS</h6>
                    <h4 class="mb-0 mt-2 text-info"><span data-plugin="counterup">{{ $users ?? '00' }}</span></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card" style="border-left: 3px solid #1e7e34;">
            <div class="card-body py-4">
                <div class="float-end mt-1"
                    style="position:relative;background:#0062cc17;height:60px;width:60px;line-height:60px;line-height:60px;text-align:center;color:#1e7e34;font-size:28px;border-radius:50px;">
                    <i class="bx bxs-user-rectangle"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 mt-1" style="font-weight: 800;">PAID CUSTOMER</h6>
                    <h4 class="mb-0 mt-2 text-success"><span data-plugin="counterup">{{ $paidCustomer ?? '00' }}</span></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card" style="border-left: 3px solid #f46a6a;">
            <div class="card-body py-4">
                <div class="float-end mt-1"
                    style="position:relative;background:#2273d926;height:60px;width:60px;line-height:60px;line-height:60px;text-align:center;color:#2273d9;font-size:28px;border-radius:50px;">
                    <i class="dripicons-shopping-bag"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 mt-1" style="font-weight: 800;">SITE ORDERS</h6>
                    <h4 class="mb-0 mt-2 text-danger"><span data-plugin="counterup">{{ $siteOrder ?? '00' }}</span></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card" style="border-left: 3px solid #f46a6a;">
            <div class="card-body py-4">
                <div class="float-end mt-1"
                    style="position:relative;background:#2273d926;height:60px;width:60px;line-height:60px;line-height:60px;text-align:center;color:#2273d9;font-size:28px;border-radius:50px;">
                    <i class="dripicons-shopping-bag"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 mt-1" style="font-weight: 800;">PACKAGE ORDERS</h6>
                    <h4 class="mb-0 mt-2 text-danger"><span data-plugin="counterup">{{ $packageOrder ?? '00' }}</span></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card" style="border-left: 3px solid #f46a6a;">
            <div class="card-body py-4">
                <div class="float-end mt-1"
                    style="position:relative;background:#2273d926;height:60px;width:60px;line-height:60px;line-height:60px;text-align:center;color:#2273d9;font-size:28px;border-radius:50px;">
                    <i class="dripicons-shopping-bag"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 mt-1" style="font-weight: 800;">CONTENT ORDERS</h6>
                    <h4 class="mb-0 mt-2 text-danger"><span data-plugin="counterup">{{ $contentOrder ?? '00' }}</span></h4>
                </div>
            </div>
        </div>
    </div>
</div>
