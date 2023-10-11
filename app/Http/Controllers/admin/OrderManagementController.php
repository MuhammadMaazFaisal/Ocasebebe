<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Configuration;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Order;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;



class OrderManagementController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::all();

        return view('admin_dashboard.orderManagement.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->with('order_product.video', 'order_product.color_id', 'order_product.product', 'order_address.country', 'order_address.state', 'order_address.city')->withSum('order_product', 'quantity')->first();

        if (!$order) {
            return redirect()->route('user.order_list')->with("message_error", "Order not found!");
        }


        $total_price = 0;
        if ($order) {
            foreach ($order->order_product as $product) {
                $_quantity = $product->quantity;
                $_sub_total = $product->discounted_price ? $_quantity * $product->discounted_price : $_quantity * $product->price;
                $total_price += $_sub_total;
            }
        }


        return view('admin_dashboard.orderManagement.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // update work home
    public function order_status(Request $request, $id)
    {

        $order = Order::find($id);
        $order->order_status = $request->order_status;
        $order->comment = $request->comment;


        if ($order->order_status == 1) {
            $order->processing_at = Carbon::now();
        }

        if ($order->order_status == 2) {
            $order->shipped_at = Carbon::now();
            $order->tracking_link = $request->tracking_link;
            $order->order_tracking_id = $request->tracking_id;
        }

        if ($order->order_status == 3) {
            $order->delivered_at = Carbon::now();
        }
        if ($order->order_status == 4) {
            $order->cancelled_at = Carbon::now();
        }
        if ($order->order_status == 5) {
            $order->hold_at = Carbon::now();
        }
        $order->save();

        // update work 16
        $refund_status = BillingInfo::where('order_id', $order->id)->get();
        $count_cancel_order = count($refund_status);

        $order_notes  = new OrderNote();
        $order_notes->order_id = $order->id;
        $order_notes->order_comment = $request->comment;
        $order_notes->order_notes_status = $request->order_status;
        $order_notes->status_changed_time = Carbon::now();
        $order_notes->save();

        // update wok 16
        $shipping_address = UserAddress::where(
            'user_id',
            $order->user_id
        )->where(
            'shipping_active_address',
            1
        )->first();
        $billing_address = UserAddress::where(
            'user_id',
            $order->user_id
        )->where(
            'billing_active_address',
            2
        )->first();
        if ($order) {

            // if (!empty($request->comment)) {
            $user = User::find($order->user_id);
            $send_mail_user = $user->email;
            // return $user;

            $data = $user;
            $tracking = !empty($request->tracking_link) ? $request->tracking_link : '';
            $comment = !empty($request->comment) ? $request->comment : '';
            Mail::send(
                'frontend.emails.order-status',
                [
                    'data' => $data, 'order' => $order, 'comment' => $comment,
                    'tracking' => $tracking, 'refund_status' => $refund_status, 'count_cancel_order' => $count_cancel_order,
                    'shipping_address' => $shipping_address, 'billing_address' => $billing_address, 'send_mail_user' =>
                    $send_mail_user
                ],
                function ($message)
                use ($send_mail_user) {
                    $message->to($send_mail_user, 'Order Status')->subject('Order Status');
                }
            );
            // }

            return back()->with('order_status', 'Order status has been changed.');
        } else {
            return back()->with('order_status_error', 'Oops! something went wrong.');
        }
    }



    public function invoice_index(Request $request, $id)
    {
        $order = Order::where('id', $id)->with('order_product.color_id', 'order_product.product', 'order_address.country', 'order_address.state', 'order_address.city')->withSum('order_product', 'quantity')->first();
        // return $order;
        // update work 31
        foreach ($order->purchased_items as $data) {
            $cancel_data =  $data->where('order_id', $order->id)->whereIn('admin_product_approval_status', [1, 2])->sum('total');
        }

        $shipping = UserAddress::where('user_id', $order->user_id)->where('shipping_active_address', 1)->first();
        $billing = UserAddress::where('user_id', $order->user_id)->where('billing_active_address', 2)->first();

        // if(count($order->purchased_items) > 0){
        //     $shipping = '';
        //     $billing = '';
        //     foreach($order->purchased_items as $item){

        //         if($item->id == $id){
        //             $shipping = json_decode($item->shipping_address);
        //             $billing = json_decode($item->billing_address);
        //         }
        //     }
        // }

        return view('admin_dashboard.orderManagement.invoice', get_defined_vars());


        // $order = Order::where('id',$id)->with('user','billing_address','shipping_address')->has('purchased_items','!=','')->first();
        // $invoices = Order::where('id',$id)->with('user','purchased_items','billing_address','shipping_address')->has('purchased_items','!=','')->first();

    }


    public function cancelstatus(Request $request, $id)
    {

        $this->validate($request, [
            'admin_cancel_reason' => 'required',
        ]);


        $cancel_status = BillingInfo::where('order_id', $id)->where('product_request_status', 2)->get();
        foreach ($cancel_status as $cancel) {
            $cancel->admin_product_approval_status = 1;
            $cancel->admin_cancel_reason = $request->admin_cancel_reason;
            $cancel->save();
        }


        $cancel_status = BillingInfo::where('order_id', $id)->where('product_request_status', 2)->with('product', 'variations', 'user')->get();
        $count_cancel_order  = count($cancel_status);
        foreach ($cancel_status as $cancel_product) {
            $user  = $cancel_product->user->email;
            $name = $cancel_product->user->name;
        }
        $email_user = $user;
        $user_name = $name;
        $shipping_address = UserAddress::where('user_id', $cancel_product->user_id)->where(
            'shipping_active_address',
            1
        )->first();
        $billing_address = UserAddress::where('user_id', $cancel_product->user_id)->where(
            'billing_active_address',
            2
        )->first();
        Mail::send(
            'frontend.emails.approve-cancel',
            ['cancel_status' => $cancel_status, 'count_cancel_order'
            => $count_cancel_order, 'user_name' => $user_name, 'shipping_address' => $shipping_address, 'billing_address' =>
            $billing_address, 'email_user' => $email_user],
            function ($message)
            use ($email_user) {
                $message
                    ->to($email_user, 'Approve Cancel Request')->subject('Approve Cancel Request');
            }
        );

        $check_cancel = OrderCancellation::where('billing_info_id', $cancel->id)->get();
        foreach ($check_cancel as $cancelorder) {
            $cancelorder->check_status = 3;
            $cancelorder->cancellation_status =  $cancel->admin_product_approval_status;
            $cancelorder->save();
        }


        $order_notes  = new OrderNote();
        $order_notes->order_id =  $cancel->order_id;
        $order_notes->product_id = $cancel->product_id;
        $order_notes->product_variantion_id = $cancel->product_variantion_id;
        $order_notes->attributes = $cancel->attributes;
        $order_notes->attribute_values = $cancel->attribute_values;
        $order_notes->order_comment = $request->admin_cancel_reason;
        $order_notes->order_notes_status = 7;
        $order_notes->status_changed_time = Carbon::now();
        $order_notes->save();




        // check complete cancellations orders
        $check_order_cancellations  =  BillingInfo::where('order_id', $id)->get();
        if (count($check_order_cancellations) > 0) {

            $is_whole_order_cancelled_check_count = 0;
            $is_whole_order_cancelled = 0;
            foreach ($check_order_cancellations as $check_order_cancellation) {
                // check order complete cancallations in single checkbox
                $is_whole_order_cancelled_check_count += 1;
                if ($check_order_cancellation->return_quantity == $check_order_cancellation->quantity) {
                    $is_whole_order_cancelled += 1;
                }
            }


            if ($is_whole_order_cancelled == $is_whole_order_cancelled_check_count) {
                // complete order aproval
                $whole_order_cancel = Order::find($id);
                $whole_order_cancel->order_status = 4;
                $whole_order_cancel->user_whole_order_status = 1;
                $whole_order_cancel->user_whole_order_admin_approval = 1;
                $whole_order_cancel->save();
            } else {
                // single prodct aproval
                $status_change  = Order::where('id', $id)->first();
                $status_change->order_status = 1;
                $status_change->user_request = 1;
                $status_change->save();
            }
        }


        $user_cancellations = Order::where('id', $id)->with('purchased_items')->get();
        $data = [];


        $notification = array('message' => 'Product Status Changed Successfully! ', 'alert-type' => 'success');
        return redirect()->route('orderManagement.index')->with($notification);
    }

    public function refundstatus(Request $request, $id)
    {

        $this->validate($request, [
            'admin_refund_reason' => 'required',
        ]);
        // check complete cancellations orders
        $check_order_cancellations  =  BillingInfo::where('order_id', $id)->get();
        if (count($check_order_cancellations) > 0) {

            $is_whole_order_cancelled_check_count = 0;
            $is_whole_order_cancelled = 0;
            foreach ($check_order_cancellations as $check_order_cancellation) {
                // check order complete cancallations in single checkbox
                $is_whole_order_cancelled_check_count += 1;
                if ($check_order_cancellation->return_quantity == $check_order_cancellation->quantity) {
                    $is_whole_order_cancelled += 1;
                }
            }



            $refund_status = BillingInfo::where('order_id', $id)->where('product_request_status', 3)->with('product', 'variations', 'user')->get();
            $count_cancel_order  = count($refund_status);
            foreach ($refund_status as $cancel_product) {
                $user  = $cancel_product->user->email;
                $name = $cancel_product->user->name;
            }
            $email_user = $user;
            $user_email = $user;
            $user_name = $name;
            $shipping_address = UserAddress::where(
                'user_id',
                $cancel_product->user_id
            )->where(
                'shipping_active_address',
                1
            )->first();
            $billing_address = UserAddress::where(
                'user_id',
                $cancel_product->user_id
            )->where(
                'billing_active_address',
                2
            )->first();
            $user_data = User::find($shipping_address->user_id);


            $email_data = $user_data;
            Mail::send(
                'frontend.emails.approve-refund',
                ['refund_status' => $refund_status, 'count_cancel_order' => $count_cancel_order, 'shipping_address' => $shipping_address, 'billing_address' => $billing_address, 'user_name' => $user_name, 'email_data' => $email_data],
                function ($message) use ($email_user) {
                    $message
                        ->to($email_user, 'Approve Refund Request')->subject('Approve Refund Request');
                }
            );



            if ($is_whole_order_cancelled == $is_whole_order_cancelled_check_count) {



                $refund_status = BillingInfo::where('order_id', $id)->where('product_request_status', 3)->get();
                foreach ($refund_status as $refund) {
                    $refund->product_request_status = 3;
                    $refund->admin_product_approval_status = 2;
                    $refund->admin_cancel_reason = $request->admin_refund_reason;
                    $refund->save();
                }

                $check_cancel = OrderCancellation::where('billing_info_id', $refund->id)->get();
                foreach ($check_cancel as $cancelorder) {
                    $cancelorder->check_status = 4;
                    $cancelorder->cancellation_status =  $refund->product_request_status;
                    $cancelorder->save();
                }

                $order_notes  = new OrderNote();
                $order_notes->order_id =  $refund->order_id;
                $order_notes->product_id = $refund->product_id;
                $order_notes->product_variantion_id = $refund->product_variantion_id;
                $order_notes->attributes = $refund->attributes;
                $order_notes->attribute_values = $refund->attribute_values;
                $order_notes->order_comment = $request->admin_refund_reason;
                $order_notes->order_notes_status = 8;
                $order_notes->status_changed_time = Carbon::now();
                $order_notes->save();


                // complete order aproval
                $whole_order_cancel = Order::find($id);
                $whole_order_cancel->order_status = 3;
                $whole_order_cancel->user_whole_order_status = 2;
                $whole_order_cancel->user_whole_order_admin_approval = 1;
                $whole_order_cancel->order_refund_request_count = 1;
                $whole_order_cancel->save();
            } else {



                $refund_status = BillingInfo::where('order_id', $id)->where('product_request_status', 3)->get();
                foreach ($refund_status as $refund) {
                    $refund->product_request_status = 3;
                    $refund->admin_product_approval_status = 2;
                    $refund->admin_cancel_reason = $request->admin_cancel_reason;
                    $refund->save();
                }

                $check_cancel = OrderCancellation::where('billing_info_id', $refund->id)->get();
                foreach ($check_cancel as $cancelorder) {
                    $cancelorder->check_status = 4;
                    $cancelorder->cancellation_status =  $refund->product_request_status;
                    $cancelorder->save();
                }

                $order_notes  = new OrderNote();
                $order_notes->order_id =  $refund->order_id;
                $order_notes->product_id = $refund->product_id;
                $order_notes->product_variantion_id = $refund->product_variantion_id;
                $order_notes->attributes = $refund->attributes;
                $order_notes->attribute_values = $refund->attribute_values;
                $order_notes->order_comment = $request->admin_refund_reason;
                $order_notes->order_notes_status = 8;
                $order_notes->status_changed_time = Carbon::now();
                $order_notes->save();



                // single prodct aproval
                $whole_order_cancel = Order::find($id);
                $whole_order_cancel->order_status = 3;
                $whole_order_cancel->order_refund_request_count = 1;
                $whole_order_cancel->save();
            }
        }

        // // check complete cancellations orders
        // $check_order_cancellations  =  BillingInfo::where('order_id', $id)->get();
        // if(count($check_order_cancellations) > 0){

        //     $is_whole_order_cancelled_check_count = 0;
        //     $is_whole_order_cancelled = 0;
        //     foreach($check_order_cancellations as $check_order_cancellation){
        //         // check order complete cancallations in single checkbox
        //         $is_whole_order_cancelled_check_count += 1;
        //         if($check_order_cancellation->return_quantity == $check_order_cancellation->quantity){
        //             $is_whole_order_cancelled += 1;
        //         }
        //     }


        //     if($is_whole_order_cancelled == $is_whole_order_cancelled_check_count){
        //         // complete order aproval
        //         $whole_order_cancel = Order::find($id);
        //         $whole_order_cancel->order_status = 4;
        //         $whole_order_cancel->user_whole_order_status = 1;
        //         $whole_order_cancel->user_whole_order_admin_approval = 1;
        //         $whole_order_cancel->save();
        //     }else{
        //         // single prodct aproval
        //         $status_change  = Order::where('id',$id)->first();
        //         $status_change->order_status = 1;
        //         $status_change->user_request = 1;
        //         $status_change->save();
        //     }

        // }

        $notification = array('message' => 'Product Refund Approved Successfully! ', 'alert-type' => 'success');
        return redirect()->route('orderManagement.index')->with($notification);
    }

    public function ordertracking(Request $request, $id)
    {

        $this->validate($request, [
            'tracking_id' => 'required|max:100',
            'tracking_link' => 'required|max:200',
        ]);

        $tracking_details = Order::where('id', $id)->first();
        $tracking_details->tracking_link = $request->tracking_link;
        $tracking_details->order_tracking_id = $request->tracking_id;
        $tracking_details->save();
        $notification = array('message' => 'Tracking Details Added Successfully! ', 'alert-type' => 'success');
        return back()->with($notification);

        // return $tracking_details;

    }


    // update work 3

    public function declinecancel(Request $request, $id)
    {
        // return $request->all();

        $this->validate($request, [
            'admin_cancel_reason' => 'required',
        ]);
        // check complete cancellations orders
        $check_order_cancellations  =  BillingInfo::where('order_id', $id)->get();
        if (count($check_order_cancellations) > 0) {

            $is_whole_order_cancelled_check_count = 0;
            $is_whole_order_cancelled = 0;
            foreach ($check_order_cancellations as $check_order_cancellation) {
                // check order complete cancallations in single checkbox
                $is_whole_order_cancelled_check_count += 1;
                if ($check_order_cancellation->return_quantity == $check_order_cancellation->quantity) {
                    $is_whole_order_cancelled += 1;
                }
            }



            $cancel_status = BillingInfo::where('order_id', $id)->where('product_request_status', 2)->with('product', 'variations', 'user')->get();
            $count_cancel_order  = count($cancel_status);
            foreach ($cancel_status as $cancel_product) {
                $user  = $cancel_product->user->email;
                $name = $cancel_product->user->name;
            }
            $email_user = $user;
            $user_name = $name;

            $shipping_address = UserAddress::where(
                'user_id',
                $cancel_product->user_id
            )->where(
                'shipping_active_address',
                1
            )->first();
            $billing_address = UserAddress::where('user_id', $cancel_product->user_id)->where(
                'billing_active_address',
                2
            )->first();
            Mail::send(
                'frontend.emails.decline-cancel',
                [
                    'cancel_status' => $cancel_status, 'user_name' => $user_name, 'email_user' => $email_user,
                    'count_cancel_order' =>
                    $count_cancel_order, 'shipping_address' =>
                    $shipping_address, 'billing_address' => $billing_address
                ],
                function ($message) use ($email_user) {
                    $message
                        ->to($email_user, 'Decline Cancel Request')->subject('Decline Cancel Request');
                }
            );



            if ($is_whole_order_cancelled == $is_whole_order_cancelled_check_count) {

                $cancel_status = BillingInfo::where('order_id', $id)->where('product_request_status', 2)->get();
                foreach ($cancel_status as $cancel) {
                    $cancel->admin_product_approval_status = null;
                    $cancel->product_request_status = null;
                    $cancel->return_quantity = null;
                    $cancel->admin_cancel_reason = $request->admin_cancel_reason;
                    $cancel->save();
                }

                $check_cancel = OrderCancellation::where('billing_info_id', $cancel->id)->get();
                foreach ($check_cancel as $cancelorder) {
                    $cancelorder->check_status = 3;
                    $cancelorder->cancellation_status =  $cancel->admin_product_approval_status;
                    $cancelorder->save();
                }

                $order_notes  = new OrderNote();
                $order_notes->order_id =  $cancel->order_id;
                $order_notes->product_id = $cancel->product_id;
                $order_notes->product_variantion_id = $cancel->product_variantion_id;
                $order_notes->attributes = $cancel->attributes;
                $order_notes->attribute_values = $cancel->attribute_values;
                $order_notes->order_comment = $request->admin_cancel_reason;
                $order_notes->order_notes_status = 9;
                $order_notes->status_changed_time = Carbon::now();
                $order_notes->save();






                // complete order aproval
                $whole_order_cancel = Order::find($id);
                $whole_order_cancel->order_status = 1;
                $whole_order_cancel->user_request = null;
                $whole_order_cancel->user_whole_order_status = null;
                $whole_order_cancel->user_whole_order_admin_approval = null;
                $whole_order_cancel->order_cancel_request_count = null;
                $whole_order_cancel->save();
            } else {



                $cancel_status = BillingInfo::where('order_id', $id)->where('product_request_status', 2)->get();
                foreach ($cancel_status as $cancel) {
                    $cancel->admin_product_approval_status = null;
                    $cancel->product_request_status = null;
                    $cancel->return_quantity = null;
                    $cancel->admin_cancel_reason = $request->admin_cancel_reason;
                    $cancel->save();
                }

                $check_cancel = OrderCancellation::where('billing_info_id', $cancel->id)->get();
                foreach ($check_cancel as $cancelorder) {
                    $cancelorder->check_status = 3;
                    $cancelorder->cancellation_status =  $cancel->admin_product_approval_status;
                    $cancelorder->save();
                }

                $order_notes  = new OrderNote();
                $order_notes->order_id =  $cancel->order_id;
                $order_notes->product_id = $cancel->product_id;
                $order_notes->product_variantion_id = $cancel->product_variantion_id;
                $order_notes->attributes = $cancel->attributes;
                $order_notes->attribute_values = $cancel->attribute_values;
                $order_notes->order_comment = $request->admin_cancel_reason;
                $order_notes->order_notes_status = 9;
                $order_notes->status_changed_time = Carbon::now();
                $order_notes->save();

                // single prodct aproval
                $status_change  = Order::where('id', $id)->first();
                $status_change->order_status = 1;
                $status_change->user_request = null;
                $status_change->user_whole_order_status = null;
                $status_change->user_whole_order_admin_approval = null;
                $status_change->save();
            }
        }


        $notification = array('message' => 'Product Cancell  Declined Successfully! ', 'alert-type' => 'success');
        return redirect()->route('orderManagement.index')->with($notification);
    }

    public function declinerefund(Request $request, $id)
    {

        // return $request->all();

        $this->validate($request, [
            'admin_refund_reason' => 'required',
        ]);

        // check complete cancellations orders
        $check_order_cancellations  =  BillingInfo::where('order_id', $id)->get();
        if (count($check_order_cancellations) > 0) {

            $is_whole_order_cancelled_check_count = 0;
            $is_whole_order_cancelled = 0;
            foreach ($check_order_cancellations as $check_order_cancellation) {
                // check order complete cancallations in single checkbox
                $is_whole_order_cancelled_check_count += 1;
                if ($check_order_cancellation->return_quantity == $check_order_cancellation->quantity) {
                    $is_whole_order_cancelled += 1;
                }
            }



            $refund_status = BillingInfo::where('order_id', $id)->where('product_request_status', 3)->with('product', 'variations', 'user')->get();
            $count_cancel_order  = count($refund_status);
            foreach ($refund_status as $cancel_product) {
                $user  = $cancel_product->user->email;
                $name = $cancel_product->user->name;
            }
            $email_user = $user;
            $user_name = $name;
            $shipping_address = UserAddress::where(
                'user_id',
                $cancel_product->user_id
            )->where(
                'shipping_active_address',
                1
            )->first();
            $billing_address = UserAddress::where(
                'user_id',
                $cancel_product->user_id
            )->where(
                'billing_active_address',
                2
            )->first();
            Mail::send(
                'frontend.emails.decline-refund',
                [
                    'refund_status' => $refund_status, 'count_cancel_order' => $count_cancel_order,
                    'user_name' => $user_name, 'email_user' => $email_user, 'shipping_address' =>
                    $shipping_address, 'billing_address' => $billing_address
                ],
                function ($message) use ($email_user) {
                    $message
                        ->to($email_user, 'Decline Refund Request')->subject('Decline Refund Request');
                }
            );





            if ($is_whole_order_cancelled == $is_whole_order_cancelled_check_count) {

                $decline_refund_status = BillingInfo::where('order_id', $id)->where('product_request_status', 3)->get();
                foreach ($decline_refund_status as $decline_refund) {
                    $decline_refund->product_request_status = null;
                    $decline_refund->admin_product_approval_status = null;
                    $decline_refund->return_quantity = null;
                    $decline_refund->admin_cancel_reason = $request->admin_refund_reason;
                    $decline_refund->save();
                }



                $check_cancel = OrderCancellation::where('billing_info_id', $decline_refund->id)->get();

                foreach ($check_cancel as $decline_refundorder) {
                    $decline_refundorder->check_status = 4;
                    $decline_refundorder->cancellation_status = $decline_refund->admin_product_approval_status;
                    $decline_refundorder->save();
                }

                $order_notes  = new OrderNote();
                $order_notes->order_id =  $decline_refund->order_id;
                $order_notes->product_id = $decline_refund->product_id;
                $order_notes->product_variantion_id = $decline_refund->product_variantion_id;
                $order_notes->attributes = $decline_refund->attributes;
                $order_notes->attribute_values = $decline_refund->attribute_values;
                $order_notes->order_comment = $request->admin_refund_reason;
                $order_notes->order_notes_status = 10;
                $order_notes->status_changed_time = Carbon::now();
                $order_notes->save();


                // complete order aproval
                $whole_order_refund_decline = Order::find($id);
                $whole_order_refund_decline->order_status = 3;
                $whole_order_refund_decline->user_request = null;
                $whole_order_refund_decline->user_whole_order_status = null;
                $whole_order_refund_decline->user_whole_order_admin_approval = null;
                $whole_order_refund_decline->order_cancel_request_count = null;
                $whole_order_refund_decline->save();
            } else {



                $decline_refund_status = BillingInfo::where('order_id', $id)->where('product_request_status', 3)->get();
                foreach ($decline_refund_status as $decline_refund) {
                    $decline_refund->product_request_status = null;
                    $decline_refund->admin_product_approval_status = null;
                    $decline_refund->return_quantity = null;
                    $decline_refund->admin_cancel_reason = $request->admin_refund_reason;
                    $decline_refund->save();
                }

                $check_cancel = OrderCancellation::where('billing_info_id', $decline_refund->id)->get();

                foreach ($check_cancel as $decline_refundorder) {
                    $decline_refundorder->check_status = 4;
                    $decline_refundorder->cancellation_status = $decline_refund->admin_product_approval_status;
                    $decline_refundorder->save();
                }


                $order_notes  = new OrderNote();
                $order_notes->order_id =  $decline_refund->order_id;
                $order_notes->product_id = $decline_refund->product_id;
                $order_notes->product_variantion_id = $decline_refund->product_variantion_id;
                $order_notes->attributes = $decline_refund->attributes;
                $order_notes->attribute_values = $decline_refund->attribute_values;
                $order_notes->order_comment = $request->admin_refund_reason;
                $order_notes->order_notes_status = 10;
                $order_notes->status_changed_time = Carbon::now();
                $order_notes->save();


                // complete order aproval
                $whole_order_refund_decline = Order::find($id);
                $whole_order_refund_decline->order_status = 3;
                $whole_order_refund_decline->user_request = null;
                $whole_order_refund_decline->user_whole_order_status = null;
                $whole_order_refund_decline->user_whole_order_admin_approval = null;
                $whole_order_refund_decline->order_cancel_request_count = null;
                $whole_order_refund_decline->save();
            }
        }


        $notification = array('message' => 'Product Refund  Declined Successfully! ', 'alert-type' => 'success');
        return redirect()->route('orderManagement.index')->with($notification);
    }

    // update work 6

    public function orderinvoice(Request $request)
    {

        $order_status = $request->order_status;


        $order = Order::where('id', $request->id)->with(
            "purchased_items",
            'purchased_items.product',
            'purchased_items.variations',
            'purchased_items.get_state',
            'purchased_items.get_city'
        )->withSum(
            "purchased_items",
            "price"
        )->first();
        $shipping_address = UserAddress::where('user_id', $order->user_id)->where(
            'shipping_active_address',
            1
        )->with('get_state', 'get_city')->first();
        $billing_address = UserAddress::where('user_id', $order->user_id)->where(
            'billing_active_address',
            2
        )->with('get_state', 'get_city')->first();
        $user = User::find($order->user_id);
        $delivery_fee = $order->delivery_fee ?? 0;
        // return $user_shippings[0]->shipping_fee;
        // shipping fee according to user city


        $payment_method = '';

        if ($order->payment_method == 2) {
            $payment_method = 'Paypal';
        }
        if ($order->payment_method == 3) {
            $payment_method = 'Stripe';
        }

        $cancelitmes = [];
        $purchased_items = [];
        $total_amount = 0;
        $total_discount = 0;
        $cancelproductamount = 0;
        $canceldiscount = 0;
        foreach ($order->purchased_items as $item) {
            $product = Product::find($item->product_id);

            $arr = [];
            $arr['product_name'] = $product->product_name;
            $arr['qty'] = $item->quantity;

            // checking discounts
            if ($item->discounted_price == null) {
                $arr['price'] = number_format($item->price, 2);
                $arr['total'] = number_format($item->total, 2);
                $total_amount += $item->total;
            } else {
                $arr['price'] = number_format($item->discounted_price, 2);
                $arr['total'] = number_format($item->total, 2);
                $total_amount += $item->total;
                $total_discount += $item->discount;
            }
            array_push($purchased_items, $arr);


            if ($item->order_status == 2 || $item->order_status == 3) {
                if ($item->cancel_discounted_price == null) {
                    $arr['cancelprice'] = number_format($item->price, 2);
                    $arr['canceltotal'] = number_format($item->total, 2);
                    $cancelproductamount += $item->total;
                } else {
                    $arr['cancelprice'] = number_format($item->discounted_price, 2);
                    $arr['canceltotal'] = number_format($item->total, 2);
                    $cancelproductamount += $item->total;
                    $canceldiscount += $item->discount;
                }
            }


            array_push($cancelitmes, $arr);


            // return dd($arr);

        }
        // return $purchased_items;
        return response()->json([
            'user' => $user,
            'order' => $order,
            'purchased_items_sum_price' => number_format($total_amount, 2),
            'cancel_item_sum_price' => number_format($total_amount - $cancelproductamount, 2),
            // 'delivery_fee' => number_format($delivery_fee->shipping_fee, 2),
            'delivery_fee' => number_format($order->delivery_fee, 2),
            'total' => number_format($total_amount + $delivery_fee, 2),
            'canceltotal' => number_format($total_amount - $cancelproductamount + $delivery_fee, 2),
            'total_discount' => number_format($total_discount, 2),
            'created_at' => date('d/M/Y', strtotime($order->created_at)),
            'shipping_address' => $shipping_address,
            'billing_address' => $billing_address,
            'payment_method' => $payment_method,
            'processing_at' => date('d M Y - G:i', strtotime($order->processing_at)),
            'shipped_at' => date('d M Y - G:i', strtotime($order->shipped_at)),
            'delivered_at' => date('d M Y - G:i', strtotime($order->delivered_at)),
            'cancelled_at' => date('d M Y - G:i', strtotime($order->cancelled_at)),
            'verified_at' => date('d M Y - G:i', strtotime($order->verified_at)),
            'hold_at' => date('d M Y - G:i', strtotime($order->hold_at)),
            'purchased_items' => $purchased_items,
            'order_status' => $order_status
        ]);
    }

    public function send_invoice(Request $request)
    {
        // dd($request->all());

        $order = Order::where('id',$request->order_id)->with('order_product.product','order_address.country','order_address.state','order_address.city')->withSum('order_product','quantity')->first();

        if(!$order){
            return redirect()->route('user.order_list')->with("message_error", "Order not found!");
        }

        $total_price = 0;
        if($order){
            foreach($order->order_product as $product){
                $_quantity = $product->quantity;
                $_sub_total = $product->discounted_price ? $_quantity * $product->discounted_price : $_quantity * $product->price;
                $total_price += $_sub_total;
            }
            // $configuration = Configuration::find(1);
            $email_user = $order->order_address->email;
            // dd($order);
            $urlhtml = view('emails.invoice', get_defined_vars());
            // dd($urlhtml);
            $subject = "Invoice Email From Edify";
            $data = ['email' => $email_user, 'subject' => $subject, 'html' => $urlhtml];
            // dd($data);
            email($data);



            // $configuration = Configuration::find(1);
            //  $email_user = $order->order_address->email;

            // Mail::send('email_templates.invoice', ['order' => $order, 'total_price' => $total_price, 'configuration' => $configuration ], function ($message) use ($email_user) {
            //     $message->to($email_user, 'Invoice')->subject('Invoice');
            // });

            $notification = array('message' => 'message','Invoice has been sent to client', 'alert-type' => 'success');
            return redirect()->back()->with($notification);

        }else{
            $notification = array('message' => 'message','Sorry!, Something went wrong.', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }




    }
}
