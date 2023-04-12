<?php
$booking = \Modules\BookingModule\Entities\Booking::get();
$pending_providers = \Modules\ProviderManagement\Entities\Provider::ofApproval(2)->count();
$logo = business_config('business_logo', 'business_information');
?>

<aside class="aside">
    <!-- Aside Header -->
    <div class="aside-header">
        <!-- Logo -->
        <!-- <a href="{{route('admin.dashboard')}}" class="logo d-flex gap-2"> -->
            <a href="{{route('admin.dashboard')}}" class="logo d-flex gap-2">
                <img src="{{asset('storage/app/public/business')}}/{{$logo->live_values??""}}"
                     onerror="this.src='{{asset('public/assets/placeholder.png')}}'"
                     alt="" class="main-logo">
                <img src="{{asset('storage/app/public/business')}}/{{$logo->live_values??""}}"
                     onerror="this.src='{{asset('public/assets/placeholder.png')}}'"
                     alt="" class="mobile-logo">
            </a>
        <!-- </a> -->
        <!-- End Logo -->

        <!-- Aside Toggle Menu Button -->
        <button class="toggle-menu-button aside-toggle border-0 bg-transparent p-0 dark-color">
            <span class="material-icons">menu</span>
        </button>
        <!-- End Aside Toggle Menu Button -->
    </div>
    <!-- End Aside Header -->

    <!-- Aside Body -->
    <div class="aside-body" data-trigger="scrollbar">
        <div class="user-profile media gap-3 align-items-center my-3">
            <div class="avatar">
                <img class="avatar-img rounded-circle"
                     src="{{asset('storage/app/public/user/profile_image')}}/{{ auth()->user()->profile_image }}"
                     onerror="this.src='{{asset('public/assets/admin-module')}}/img/media/upload-file.png'"
                     alt="">
            </div>
            <div class="media-body ">
                <h5 class="card-title">{{\Illuminate\Support\Str::limit(auth()->user()->email,15)}}</h5>
                <span class="card-text">{{auth()->user()->user_type}}</span>
            </div>
        </div>

        <!-- Nav -->
        <ul class="nav">
            <li class="nav-category">{{translate('main')}}</li>
            <li>
                <a href="{{route('admin.dashboard')}}" class="{{request()->is('admin/dashboard')?'active-menu':''}}">
                    <span class="material-icons" title="{{translate('dashboard')}}">dashboard</span>
                    <span class="link-title">{{translate('dashboard')}}</span>
                </a>
            </li>

            @if(access_checker('service_management'))
                <li class="nav-category" title="{{translate('service_management')}}">
                    {{translate('service_management')}}
                </li>
                <li>
                    <a href="{{route('admin.zone.create')}}" class="{{request()->is('admin/zone/*')?'active-menu':''}}">
                        <span class="material-icons" title="{{translate('service_zones')}}">map</span>
                        <span class="link-title">{{translate('service_zones')}}</span>
                    </a>
                </li>
                <li class="has-sub-item {{(request()->is('admin/category/*') || request()->is('admin/sub-category/*'))?'sub-menu-opened':''}}">
                    <a href="#" class="{{(request()->is('admin/category/*') || request()->is('admin/sub-category/*'))?'active-menu':''}}">
                        <span class="material-icons" title="Service Categories">category</span>
                        <span class="link-title">{{translate('service_categories')}}</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li>
                            <a href="{{route('admin.category.create')}}"
                               class="{{request()->is('admin/category/*')?'active-menu':''}}">
                                {{translate('category_setup')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.sub-category.create')}}"
                               class="{{request()->is('admin/sub-category/*')?'active-menu':''}}">
                                {{translate('sub_category_setup')}}
                            </a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
                <li class="has-sub-item {{request()->is('admin/service/*')?'sub-menu-opened':''}}">
                    <a href="#" class="{{request()->is('admin/service/*')?'active-menu':''}}">
                        <span class="material-icons" title="Services">design_services</span>
                        <span class="link-title">{{translate('services')}}</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav flex-column sub-menu">
                        <li>
                            <a href="{{route('admin.service.index')}}"
                               class="{{request()->is('admin/service/list')?'active-menu':''}}">
                                {{translate('service_list')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.service.create')}}"
                               class="{{request()->is('admin/service/create')?'active-menu':''}}">
                                {{translate('add_new_service')}}
                            </a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
            @endif

            @if(access_checker('promotion_management'))
                <li class="nav-category" title="{{translate('promotion_management')}}">
                    {{translate('promotion_management')}}
                </li>
                <li class="has-sub-item {{request()->is('admin/discount/*')?'sub-menu-opened':''}}">
                    <a href="#" class="{{request()->is('admin/discount/*')?'active-menu':''}}">
                        <span class="material-icons" title="{{translate('discounts')}}">redeem</span>
                        <span class="link-title">{{translate('discounts')}}</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li>
                            <a href="{{route('admin.discount.list')}}"
                               class="{{request()->is('admin/discount/list')?'active-menu':''}}">
                                {{translate('discount_list')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.discount.create')}}"
                               class="{{request()->is('admin/discount/create')?'active-menu':''}}">
                                {{translate('add_new_discount')}}
                            </a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
                <li class="has-sub-item {{request()->is('admin/coupon/*')?'sub-menu-opened':''}}">
                    <a href="#" class="{{request()->is('admin/coupon/*')?'active-menu':''}}">
                        <span class="material-icons" title="{{translate('coupons')}}">sell</span>
                        <span class="link-title">{{translate('coupons')}}</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li>
                            <a href="{{route('admin.coupon.list')}}"
                               class="{{request()->is('admin/coupon/list')?'active-menu':''}}">
                                {{translate('coupon_list')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.coupon.create')}}"
                               class="{{request()->is('admin/coupon/create')?'active-menu':''}}">
                                {{translate('add_new_coupon')}}
                            </a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
                <li class="has-sub-item {{request()->is('admin/campaign/*')?'sub-menu-opened':''}}">
                    <a href="#" class="{{request()->is('admin/campaign/*')?'active-menu':''}}">
                        <span class="material-icons" title="{{translate('campaigns')}}">campaign</span>
                        <span class="link-title">{{translate('campaigns')}}</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li>
                            <a href="{{route('admin.campaign.list')}}"
                               class="{{request()->is('admin/campaign/list')?'active-menu':''}}">
                                {{translate('campaign_list')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.campaign.create')}}"
                               class="{{request()->is('admin/campaign/create')?'active-menu':''}}">
                                {{translate('add_new_campaign')}}
                            </a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
                <li>
                    <a href="{{route('admin.banner.create')}}"
                       class="{{request()->is('admin/banner/*')?'active-menu':''}}">
                        <span class="material-icons" title="{{translate('promotional_banners')}}">flag</span>
                        <span class="link-title">{{translate('promotional_banners')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.push-notification.create')}}"
                       class="{{request()->is('admin/push-notification/*')?'active-menu':''}}">
                        <span class="material-icons" title="{{translate('push_notification')}}">notifications</span>
                        <span class="link-title">{{translate('push_notification')}}</span>
                    </a>
                </li>
            @endif

            @if(access_checker('booking_management'))
                <li class="nav-category" title="{{translate('booking_management')}}">
                    {{translate('booking_management')}}
                </li>
                <li class="has-sub-item {{request()->is('admin/booking/*')?'sub-menu-opened':''}}">
                    <a href="#" class="{{request()->is('admin/booking/*')?'active-menu':''}}">
                        <span class="material-icons" title="Bookings">calendar_month</span>
                        <span class="link-title">{{translate('bookings')}}</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li><a href="{{route('admin.booking.list', ['booking_status'=>'pending'])}}"
                               class="{{request()->is('admin/booking/list') && request()->query('booking_status')=='pending'?'active-menu':''}}"><span
                                    class="link-title">{{translate('Booking_Requests')}} <span
                                        class="count">{{$booking->where('booking_status', 'pending')->count()}}</span></span></a>
                        </li>
                        <li><a href="{{route('admin.booking.list', ['booking_status'=>'accepted'])}}"
                               class="{{request()->is('admin/booking/list') && request()->query('booking_status')=='accepted'?'active-menu':''}}"><span
                                    class="link-title">{{translate('Accepted')}} <span
                                        class="count">{{$booking->where('booking_status', 'accepted')->count()}}</span></span></a>
                        </li>
                        <li><a href="{{route('admin.booking.list', ['booking_status'=>'ongoing'])}}"
                               class="{{request()->is('admin/booking/list') && request()->query('booking_status')=='ongoing'?'active-menu':''}}"><span
                                    class="link-title">{{translate('Ongoing')}} <span
                                        class="count">{{$booking->where('booking_status', 'ongoing')->count()}}</span></span></a>
                        </li>
                        <li><a href="{{route('admin.booking.list', ['booking_status'=>'completed'])}}"
                               class="{{request()->is('admin/booking/list') && request()->query('booking_status')=='completed'?'active-menu':''}}"><span
                                    class="link-title">{{translate('Completed')}} <span
                                        class="count">{{$booking->where('booking_status', 'completed')->count()}}</span></span></a>
                        </li>
                        <li><a href="{{route('admin.booking.list', ['booking_status'=>'canceled'])}}"
                               class="{{request()->is('admin/booking/list') && request()->query('booking_status')=='canceled'?'active-menu':''}}"><span
                                    class="link-title">{{translate('Canceled')}} <span
                                        class="count">{{$booking->where('booking_status', 'canceled')->count()}}</span></span></a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
            @endif

            @if(access_checker('provider_management'))
                <li class="nav-category"
                    title="{{translate('provider_management')}}">
                    {{translate('provider_management')}}
                </li>
                <li class="has-sub-item  {{(request()->is('admin/provider/list') || request()->is('admin/provider/create') || request()->is('admin/provider/details*') || request()->is('admin/provider/collect-cash*'))?'sub-menu-opened':''}}">
                    <a href="#" class="{{(request()->is('admin/provider/list') || request()->is('admin/provider/create') || request()->is('admin/provider/details*') || request()->is('admin/provider/collect-cash*'))?'active-menu':''}}">
                        <span class="material-icons" title="Providers">engineering</span>
                        <span class="link-title">{{translate('providers')}}</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li>
                            <a href="{{route('admin.provider.list', ['status'=>'all'])}}"
                                class="{{(request()->is('admin/provider/list'))?'active-menu':''}}">{{translate('Provider_List')}}</a>
                        </li>
                        <li><a href="{{route('admin.provider.create')}}"
                                class="{{(request()->is('admin/provider/create'))?'active-menu':''}}">{{translate('Add_New_Provider')}}</a></li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
                <li>
                    <a href="{{route('admin.withdraw.list')}}"
                        class="{{request()->is('admin/withdraw/list')?'active-menu':''}}">
                        <span class="material-icons" title="{{translate('withdraw_requests')}}">money</span>
                        <span class="link-title">{{translate('withdraw_requests')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.provider.onboarding_request', ['status'=>'onboarding'])}}"
                       class="{{request()->is('admin/provider/onboarding-request')?'active-menu':''}}">
                        <span class="material-icons" title="{{translate('Onboarding_Request')}}">description</span>
                        <span class="link-title">{{translate('Onboarding_Request')}} <span class="count">{{$pending_providers}}</span></span>
                    </a>
                </li>
            @endif

            @if(access_checker('system_management'))
                <li class="nav-category"
                    title="{{translate('system_management')}}">{{translate('system_management')}}</li>
                <li>
                    <a href="{{route('admin.business-settings.get-business-information')}}"
                       class="{{request()->is('admin/business-settings/get-business-information')?'active-menu':''}}">
                        <span class="material-icons" title="Business Settings">business_center</span>
                        <span class="link-title">{{translate('business_settings')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.business-settings.get-landing-information')}}"
                       class="{{request()->is('admin/business-settings/get-landing-information')?'active-menu':''}}">
                        <span class="material-icons" title="Business Settings">rocket_launch</span>
                        <span class="link-title">{{translate('landing_page_settings')}}</span>
                    </a>
                </li>
                <li class="has-sub-item {{request()->is('admin/configuration/*')?'sub-menu-opened':''}}">
                    <a href="#" class="{{request()->is('admin/configuration/*')?'active-menu':''}}">
                        <span class="material-icons" title="Configurations">settings</span>
                        <span class="link-title">{{translate('configurations')}}</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li>
                            <a href="{{route('admin.configuration.get-notification-setting')}}"
                               class="{{request()->is('admin/configuration/get-notification-setting')?'active-menu':''}}">
                                {{translate('notification')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.configuration.get-third-party-config')}}"
                               class="{{request()->is('admin/configuration/get-third-party-config')?'active-menu':''}}">
                                {{translate('3rd_party')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.configuration.get-email-config')}}"
                               class="{{request()->is('admin/configuration/get-email-config')?'active-menu':''}}">
                                {{translate('email_config')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.configuration.sms-get')}}"
                               class="{{request()->is('admin/configuration/sms-get')?'active-menu':''}}">
                                {{translate('SMS_config')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.configuration.payment-get')}}"
                               class="{{request()->is('admin/configuration/payment-get')?'active-menu':''}}">
                                {{translate('payment_config')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.configuration.get-app-settings')}}"
                               class="{{request()->is('admin/configuration/get-app-settings')?'active-menu':''}}">
                                {{translate('App_Settings')}}
                            </a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
                <li>
                    <a href="{{route('admin.business-settings.get-pages-setup')}}"
                       class="{{request()->is('admin/business-settings/get-pages-setup')?'active-menu':''}}">
                        <span class="material-icons" title="Page Settings">article</span>
                        <span class="link-title">{{translate('page_settings')}}</span>
                    </a>
                </li>
            @endif


            @if(access_checker('employee_management'))
                <li class="nav-category"
                    title="{{translate('employee_management')}}">{{translate('employee_management')}}</li>
                <li>
                    <a href="{{route('admin.role.create')}}" class="{{request()->is('admin/role/*')?'active-menu':''}}">
                        <span class="material-icons" title="Employee">settings</span>
                        <span class="link-title">{{translate('employee_roles')}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.employee.create')}}"
                       class="{{request()->is('admin/employee/create')?'active-menu':''}}">
                        <span class="material-icons" title="{{translate('add_new_employee')}}">add</span>
                        <span class="link-title">{{translate('add_new_employee')}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.employee.index')}}"
                       class="{{request()->is('admin/employee/list')?'active-menu':''}}">
                        <span class="material-icons" title="{{translate('employee_list')}}">list</span>
                        <span class="link-title">{{translate('employee_list')}}</span>
                    </a>
                </li>
            @endif


            @if(access_checker('customer_management'))
                <li class="nav-category" title="{{translate('customer_management')}}">
                    {{translate('customer_management')}}
                </li>
                <li class="has-sub-item {{request()->is('admin/customer/*')?'sub-menu-opened':''}}">
                    <a href="#" class="{{request()->is('admin/customer/*')?'active-menu':''}}">
                        <span class="material-icons" title="Customers">person_outline</span>
                        <span class="link-title">{{translate('customers')}}</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li>
                            <a href="{{route('admin.customer.index')}}"
                               class="{{request()->is('admin/customer/list')?'active-menu':''}}">
                                {{translate('customer_list')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.customer.create')}}"
                               class="{{request()->is('admin/customer/create')?'active-menu':''}}">
                                {{translate('add_new_customer')}}
                            </a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
            @endif

            @if(access_checker('transaction_management'))
                <li class="nav-category" title="{{translate('transaction_management')}}">
                    {{translate('transaction_management')}}
                </li>
                <li>
                    <a href="{{route('admin.transaction.list', ['trx_type'=>'all'])}}"
                       class="{{request()->is('admin/transaction/list')?'active-menu':''}}">
                        <span class="material-icons" title="Customers">article</span>
                        <span class="link-title">{{translate('transactions')}}</span>
                    </a>
                </li>
            @endif
        </ul>
        <!-- End Nav -->
    </div>
    <!-- End Aside Body -->
</aside>
