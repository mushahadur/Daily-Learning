<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\ExploreSite;
use App\Repositories\Interfaces\CouponRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CouponContrroller extends Controller
{
    private $couponRepository;

    public function __construct(CouponRepositoryInterface $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    public function index()
    {
        $coupon = $this->couponRepository->couponAll();
        return view('admin.pages.coupon.coupon-list', compact('coupon'));
    }

    public function create()
    {
        $exploresite = $this->couponRepository->couponCreate();
        return view('admin.pages.coupon.coupon-create', compact('exploresite'));
    }

    public function exploreSiteJsonData()
    {
        $exploresitejsondata = $this->couponRepository->exploreData();
        return response()->json(['exploresitejsondata' => $exploresitejsondata]);
    }

    public function store(Request $request)
    {
        $this->couponRepository->requestValidate($request);
        $this->couponRepository->storeData($request);

        return redirect('admin/coupon');
    }

    public function edit($id)
    {
        $coupon = $this->couponRepository->editData($id);
        $exploresite = $this->couponRepository->exploreData();
        return view('admin.pages.coupon.coupon-edit', compact('coupon', 'exploresite'));
    }

    public function update(Request $request, $id)
    {
        $this->couponRepository->requestValidate($request);
        $this->couponRepository->updateData($request, $id);

        return redirect('admin/coupon');
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        Alert::success('Congratulation', 'Coupon Delete Successfully');
        return redirect('admin/coupon');
    }
}
