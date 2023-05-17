<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\ExploreServiceOrder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentMethods extends Component
{
    public $data;
    public $discount = null;
    public $couponID = null;
    public $errorMessage;
    public $is_errorMessage = false;
    public $couponInput;
    public $country_list;
    public $paymentable_area;
    public $show_card = false;
    public $payment_method = 1;
    public $paymentable_type = null;
    public $countryId;

    public function showCard()
    {
        $this->show_card = !$this->show_card;
        dd('test');
        $this->emitUp('messageUpdated', $this->message);
    }

    public function updatedPaymentMethod()
    {
        if ($this->paymentable_type == 'explore_site_checkout') {
            $this->data->price = $this->data->grand_total;
        } elseif ($this->paymentable_type == 'word_content_checkout') {
            $this->data->price = $this->data->total_price;
        } elseif ($this->paymentable_type == 'package_checkout') {
            $this->data->price = $this->data->total_price;
        }
        $this->dispatchBrowserEvent('stripe', $this->payment_method);
        $this->dispatchBrowserEvent('stripeData', $this->data);
    }

    public function updatedCouponInput()
    {
        if ($this->paymentable_type == 'explore_site_checkout') {
            $this->data->price = $this->data->grand_total;
            $this->is_errorMessage = false;
        } elseif ($this->paymentable_type == 'word_content_checkout') {
            $this->data->price = $this->data->total_price;
        } elseif ($this->paymentable_type == 'package_checkout') {
            $this->data->price = $this->data->total_price;
        }
    }

    public function couponApply()
    {
        $this->is_errorMessage = false;
        $this->data->price = $this->data->total_price;
        $this->validate([
            'couponInput' => 'required'
        ]);

        $coupon = Coupon::with('exploreSites')
            ->where('couponId_generate', $this->couponInput)
            ->leftJoin('coupon_explore_site', 'coupon_explore_site.coupon_id', '=', 'coupons.id')
            ->select('coupons.*', 'coupon_explore_site.explore_site_id', 'coupon_explore_site.price')
            ->first();
        // This condition use for only single service coupon
        if (isset($coupon->exploreSites) && count($coupon->exploreSites)) {
            $exploreserviceorder = ExploreServiceOrder::where('user_id', Auth::id())->where('id', $this->data->id)->first();
            if ($coupon->exploreSites[0]->id == $exploreserviceorder->exploresite_id) {
                if (!is_null($coupon)) {
                    // use for coupon check
                    if (is_null($coupon->expiry_date)) {
                        // use for check limit to one use per customer
                        if (!is_null($coupon->limit_to_one_use_per_customer)) {
                            $exploreserviceorder = ExploreServiceOrder::where('user_id', Auth::id())->where('coupon_id', $coupon->id)->exists();
                            if ($exploreserviceorder) {
                                //use for error message showing
                                $this->is_errorMessage = true;
                                $this->errorMessage = 'You have already use this coupon';
                            } else {
                                // check equel fixed amount and percentage
                                if ($coupon->discount_type == 'Fixed Amount') {
                                    $total = $this->data->grand_total - $coupon->all_coupon_price;
                                    $this->data->price = $total;
                                } elseif ($coupon->discount_type == 'Percentage') {
                                    $percentage = ($this->data->grand_total * $coupon->all_coupon_price) / 100;
                                    $totalPercentage = $this->data->grand_total - $percentage;
                                    $this->data->price = $totalPercentage;
                                }
                            }
                        } else {
                            // check equel fixed amount and percentage
                            if ($coupon->discount_type == 'Fixed Amount') {
                                $total = $this->data->grand_total - $coupon->price;
                                $this->data->price = $total;
                                $this->discount = $coupon->price;
                                $this->couponID = $coupon->id;
                            } elseif ($coupon->discount_type == 'Percentage') {
                                $percentage = ($this->data->grand_total * $coupon->price) / 100;
                                $totalPercentage = $this->data->grand_total - $percentage;
                                $this->data->price = $totalPercentage;
                                $this->discount = $percentage;
                                $this->couponID = $coupon->id;
                            }
                        }
                    } else {
                        // use for check the expair date
                        $expairDate = Carbon::parse($coupon->expiry_date)->isPast(); // isPast() is used to detarminend if the date is past or not

                        if (!$expairDate) {
                            // check equel fixed amount and percentage
                            if (!is_null($coupon->limit_to_one_use_per_customer)) {
                                $exploreserviceorder = ExploreServiceOrder::where('user_id', Auth::id())->where('coupon_id', $coupon->id)->exists();
                                if ($exploreserviceorder) {
                                    //use for error message showing
                                    $this->is_errorMessage = true;
                                    $this->errorMessage = 'You have already use this coupon';
                                } else {
                                    // check equel fixed amount and percentage
                                    if ($coupon->discount_type == 'Fixed Amount') {
                                        $total = $this->data->grand_total - $coupon->price;
                                        $this->data->price = $total;
                                        $this->discount = $coupon->price;
                                        $this->couponID = $coupon->id;
                                    } elseif ($coupon->discount_type == 'Percentage') {
                                        $percentage = ($this->data->grand_total * $coupon->price) / 100;
                                        $totalPercentage = $this->data->grand_total - $percentage;
                                        $this->data->price = $totalPercentage;
                                        $this->discount = $percentage;
                                        $this->couponID = $coupon->id;
                                    }
                                }
                            } else {
                                // check equel fixed amount and percentage
                                if ($coupon->discount_type == 'Fixed Amount') {
                                    $total = $this->data->grand_total - $coupon->price;
                                    $this->data->price = $total;
                                    $this->discount = $coupon->price;
                                    $this->couponID = $coupon->id;
                                } elseif ($coupon->discount_type == 'Percentage') {
                                    $percentage = ($this->data->grand_total * $coupon->price) / 100;
                                    $totalPercentage = $this->data->grand_total - $percentage;
                                    $this->data->price = $totalPercentage;
                                    $this->discount = $percentage;
                                    $this->couponID = $coupon->id;
                                }
                            }
                        } else {
                            $this->is_errorMessage = true;
                            $this->errorMessage = 'This coupon is expaired';
                        }
                    }
                } else {
                    $this->is_errorMessage = true;
                    $this->errorMessage = 'Coupon did not match';
                }
            } else {
                $this->is_errorMessage = true;
                $this->errorMessage = 'This coupon is not valid for this service';
            }
        } else {
            if (!is_null($coupon)) {
                // use for coupon check
                if (is_null($coupon->expiry_date)) {
                    // use for check limit to one use per customer
                    if (!is_null($coupon->limit_to_one_use_per_customer)) {
                        $exploreserviceorder = ExploreServiceOrder::where('user_id', Auth::id())->where('coupon_id', $coupon->id)->exists();
                        if ($exploreserviceorder) {
                            //use for error message showing
                            $this->is_errorMessage = true;
                            $this->errorMessage = 'You have already use this coupon';
                        } else {
                            // check equel fixed amount and percentage
                            if ($coupon->discount_type == 'Fixed Amount') {
                                $total = $this->data->grand_total - $coupon->all_coupon_price;
                                $this->data->price = $total;
                                $this->discount = $coupon->all_coupon_price;
                                $this->couponID = $coupon->id;
                            } elseif ($coupon->discount_type == 'Percentage') {
                                $percentage = ($this->data->grand_total * $coupon->all_coupon_price) / 100;
                                $totalPercentage = $this->data->grand_total - $percentage;
                                $this->data->price = $totalPercentage;
                                $this->discount = $percentage;
                                $this->couponID = $coupon->id;
                            }
                        }
                    } else {
                        // check equel fixed amount and percentage
                        if ($coupon->discount_type == 'Fixed Amount') {
                            $total = $this->data->grand_total - $coupon->all_coupon_price;
                            $this->data->price = $total;
                            $this->discount = $coupon->all_coupon_price;
                            $this->couponID = $coupon->id;
                        } elseif ($coupon->discount_type == 'Percentage') {
                            $percentage = ($this->data->grand_total * $coupon->all_coupon_price) / 100;
                            $totalPercentage = $this->data->grand_total - $percentage;
                            $this->data->price = $totalPercentage;
                            $this->discount = $percentage;
                            $this->couponID = $coupon->id;
                        }
                    }
                } else {
                    // use for check the expair date
                    $expairDate = Carbon::parse($coupon->expiry_date)->isPast(); // isPast() is used to detarminend if the date is past or not

                    if (!$expairDate) {
                        // check equel fixed amount and percentage
                        if (!is_null($coupon->limit_to_one_use_per_customer)) {
                            $exploreserviceorder = ExploreServiceOrder::where('user_id', Auth::id())->where('coupon_id', $coupon->id)->exists();
                            if ($exploreserviceorder) {
                                //use for error message showing
                                $this->is_errorMessage = true;
                                $this->errorMessage = 'You have already use this coupon';
                            } else {
                                // check equel fixed amount and percentage
                                if ($coupon->discount_type == 'Fixed Amount') {
                                    $total = $this->data->grand_total - $coupon->all_coupon_price;
                                    $this->data->price = $total;
                                    $this->discount = $coupon->all_coupon_price;
                                    $this->couponID = $coupon->id;
                                } elseif ($coupon->discount_type == 'Percentage') {
                                    $percentage = ($this->data->grand_total * $coupon->all_coupon_price) / 100;
                                    $totalPercentage = $this->data->grand_total - $percentage;
                                    $this->data->price = $totalPercentage;
                                    $this->discount = $percentage;
                                    $this->couponID = $coupon->id;
                                }
                            }
                        } else {
                            // check equel fixed amount and percentage
                            if ($coupon->discount_type == 'Fixed Amount') {
                                $total = $this->data->grand_total - $coupon->all_coupon_price;
                                $this->data->price = $total;
                                $this->discount = $coupon->all_coupon_price;
                                $this->couponID = $coupon->id;
                            } elseif ($coupon->discount_type == 'Percentage') {
                                $percentage = ($this->data->grand_total * $coupon->all_coupon_price) / 100;
                                $totalPercentage = $this->data->grand_total - $percentage;
                                $this->data->price = $totalPercentage;
                                $this->discount = $percentage;
                                $this->couponID = $coupon->id;
                            }
                        }
                    } else {
                        $this->is_errorMessage = true;
                        $this->errorMessage = 'This coupon is expaired';
                    }
                }
            } else {
                $this->is_errorMessage = true;
                $this->errorMessage = 'Coupon did not match';
            }
        }
        $stripe_data = $this->data;
        $stripe_data->discount = $this->discount;
        $stripe_data->couponID = $this->couponID;
        $stripe_data->country_id = $this->countryId;
        $this->dispatchBrowserEvent('stripeData', $this->data);
        $this->couponInput = '';
    }

    public function updatedCountryId(){
        $stripe_data = $this->data;
        $stripe_data->discount = $this->discount;
        $stripe_data->couponID = $this->couponID;
        $stripe_data->country_id = $this->country_id;
        $this->dispatchBrowserEvent('stripeData', $this->data);
    }

    public function render()
    {
        return view('livewire.payment-methods', [
            'paymentable_type' => $this->paymentable_type,
            'is_errorMessage' => $this->is_errorMessage,
            'errorMessage' => $this->errorMessage,
            'couponID' => $this->couponID,
            'discount' => $this->discount,
        ]);
    }
}
