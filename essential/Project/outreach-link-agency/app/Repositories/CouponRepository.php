<?php

namespace App\Repositories;

use App\Models\Coupon;
use App\Models\ExploreSite;
use App\Repositories\Interfaces\CouponRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert;

class CouponRepository implements CouponRepositoryInterface
{
    public function couponAll()
    {
        return Coupon::orderBy('created_at', 'DESC')->get();
    }
    public function couponCreate()
    {
        return ExploreSite::all();
    }
    public function exploreData()
    {
        return ExploreSite::all();
    }
    public function requestValidate($request)
    {
        $request->validate([
            'couponId_generate'   => 'required',
            'discount_type'       => 'required',
            'explore_site'        => 'required',
            'price'               => 'required',
        ]);
    }
    public function storeData($request)
    {
        $this->requestValidate($request);
        $data = [
            'couponId_generate' => $request->get('couponId_generate'),
            'description' => $request->get('description'),
            'discount_type' => $request->get('discount_type'),
            'limit_to_one_use_per_customer' => $request->get('limit_to_one_use_per_customer'),
            'set_expiry_date' => $request->get('set_expiry_date'),
            'expiry_date' => $request->get('expiry_date'),
        ];

        $coupon_types = collect($request->input('price', []))

            ->reject(function ($value, $key) {
                return $key === 'All Services';
            })
            ->map(function ($price) {
                return ['price' => $price];
            });
        // dd($request->input('price'));
        if (in_array('All Services', $request->explore_site)) {
            $data['all_coupon_price'] = $request->price['All Services'];
        }
        $coupon = Coupon::create($data);
        $coupon->exploreSites()->sync($coupon_types);
        Alert::success('Congratulation', 'Coupon Create Successfully');
    }
    public function editData($id)
    {
        return Coupon::with('exploreSites')->where('id', $id)->first();
    }
    public function findById($id)
    {
        return Coupon::find($id);
    }
    public function updateData($request, $id)
    {
        // dd($request->all());
        $this->requestValidate($request);

        $coupon = $this->findById($id);

        $data = [
            'couponId_generate' => $request->get('couponId_generate'),
            'description' => $request->get('description'),
            'discount_type' => $request->get('discount_type'),
            'limit_to_one_use_per_customer' => $request->get('limit_to_one_use_per_customer'),
            'set_expiry_date' => $request->get('set_expiry_date'),
            'expiry_date' => $request->get('expiry_date'),
        ];

        if (in_array('All Services', $request->explore_site)) {
            $data['all_coupon_price'] = $request->price['All Services'];
        } else {
            $data['all_coupon_price'] = null;
        }

        $coupon->update($data);

        $coupon_types = collect($request->input('price', []))

            ->reject(function ($value, $key) {
                return $key === 'All Services';
            })
            ->map(function ($price) {
                return ['price' => $price];
            });

        $coupon->exploreSites()->sync($coupon_types);
        Alert::success(
            'Congratulation',
            'Coupon Update Successfully'
        );
    }
}
