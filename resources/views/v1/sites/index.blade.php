@extends('v1.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div
        class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mb-6 text-center text-sm-start gap-2">
        <div class="mb-2 mb-sm-0">
            <h4 class="mb-1">Customer ID #634759</h4>
            <p class="mb-0">Aug 17, 2020, 5:48 (ET)</p>
        </div>
        <button type="button" class="btn btn-label-danger delete-customer">Delete Customer</button>
    </div>

    <div class="row">
        <!-- Customer-detail Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- Customer-detail Card -->
            <div class="card mb-6">
                <div class="card-body pt-12">
                    <div class="customer-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img
                                class="img-fluid rounded mb-4"
                                src="../../assets/img/avatars/1.png"
                                height="120"
                                width="120"
                                alt="User avatar" />
                            <div class="customer-info text-center mb-6">
                                <h5 class="mb-0">Lorine Hischke</h5>
                                <span>Customer ID #634759</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap mb-6 gap-0 gap-md-3 gap-lg-4">
                        <div class="d-flex align-items-center gap-4 me-5">
                            <div class="avatar">
                                <div class="avatar-initial rounded bg-label-primary">
                                    <i class="icon-base ti tabler-shopping-cart icon-lg"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-0">184</h5>
                                <span>Orders</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <div class="avatar">
                                <div class="avatar-initial rounded bg-label-primary">
                                    <i class="icon-base ti tabler-currency-dollar icon-lg"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-0">$12,378</h5>
                                <span>Spent</span>
                            </div>
                        </div>
                    </div>

                    <div class="info-container">
                        <h5 class="pb-4 border-bottom text-capitalize mt-6 mb-4">Details</h5>
                        <ul class="list-unstyled mb-6">
                            <li class="mb-2">
                                <span class="h6 me-1">Username:</span>
                                <span>lorine.hischke</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6 me-1">Email:</span>
                                <span>vafgot@vultukir.org</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6 me-1">Status:</span>
                                <span class="badge bg-label-success">Active</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6 me-1">Contact:</span>
                                <span>(123) 456-7890</span>
                            </li>

                            <li class="mb-2">
                                <span class="h6 me-1">Country:</span>
                                <span>USA</span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <a
                                href="javascript:;"
                                class="btn btn-primary w-100"
                                data-bs-target="#editUser"
                                data-bs-toggle="modal"
                            >Edit Details</a
                            >
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Customer-detail Card -->
            <!-- Plan Card -->

            <div class="card mb-4 bg-gradient-primary">
                <div class="card-body">
                    <div class="row justify-content-between mb-4">
                        <div
                            class="col-md-12 col-lg-7 col-xl-12 col-xxl-7 text-center text-lg-start text-xl-center text-xxl-start order-1 order-lg-0 order-xl-1 order-xxl-0">
                            <h5 class="card-title text-white text-nowrap mb-4">Upgrade to premium</h5>
                            <p class="card-text text-white">
                                Upgrade customer to premium membership to access pro features.
                            </p>
                        </div>
                        <span class="col-md-12 col-lg-5 col-xl-12 col-xxl-5 text-center mx-auto mx-md-0 mb-2"
                        ><img src="../../assets/img/illustrations/rocket.png" class="w-px-75 m-2" alt="3dRocket"
                            /></span>
                    </div>
                    <button
                        class="btn btn-white text-primary w-100 fw-medium shadow-xs"
                        data-bs-target="#upgradePlanModal"
                        data-bs-toggle="modal">
                        Upgrade to premium
                    </button>
                </div>
            </div>

            <!-- /Plan Card -->
        </div>
        <!--/ Customer Sidebar -->

        <!-- Customer Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- Customer Pills -->
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-md-row mb-6 row-gap-2 flex-wrap">
                    <li class="nav-item">
                        <a class="nav-link" href="app-ecommerce-customer-details-overview.html"
                        ><i class="icon-base ti tabler-user icon-sm me-1_5"></i>Overview</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="app-ecommerce-customer-details-security.html"
                        ><i class="icon-base ti tabler-lock icon-sm me-1_5"></i>Security</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="app-ecommerce-customer-details-billing.html"
                        ><i class="icon-base ti tabler-map-pin icon-sm me-1_5"></i>Address & Billing</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"
                        ><i class="icon-base ti tabler-bell icon-sm me-1_5"></i>Notifications</a
                        >
                    </li>
                </ul>
            </div>
            <!--/ Customer Pills -->
            <!-- Project table -->
            <div class="card mb-6">
                <!-- Notifications -->
                <div class="card-header">
                    <h5 class="card-title mb-1">Notifications</h5>
                    <span class="text-body">You will receive notification for the below selected items.</span>
                </div>
                <div>
                    <div class="table-responsive border-bottom">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-nowrap">Type</th>
                                <th class="text-nowrap text-center">Email</th>
                                <th class="text-nowrap text-center">Browser</th>
                                <th class="text-nowrap text-center">App</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-nowrap text-heading">New for you</td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1" checked />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck2" checked />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck3" checked />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap text-heading">Account activity</td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck4" checked />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck5" checked />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck6" checked />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap text-heading">A new browser used to sign in</td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck7" checked />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck8" checked />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck9" />
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-transparent">
                                <td class="text-nowrap text-heading">A new device is linked</td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck10" checked />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck11" />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check d-flex justify-content-center mb-0">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck12" />
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body pt-6">
                    <button type="submit" class="btn btn-primary me-3">Save changes</button>
                    <button type="reset" class="btn btn-label-secondary">Discard</button>
                </div>
                <!-- /Notifications -->
            </div>
            <!-- /Project table -->
        </div>
        <!--/ Customer Content -->
    </div>

    <!-- Modal -->
    <!-- Edit User Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Edit User Information</h4>
                        <p>Updating user details will receive a privacy audit.</p>
                    </div>
                    <form id="editUserForm" class="row g-6" onsubmit="return false">
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserFirstName">First Name</label>
                            <input
                                type="text"
                                id="modalEditUserFirstName"
                                name="modalEditUserFirstName"
                                class="form-control"
                                placeholder="John"
                                value="John" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLastName">Last Name</label>
                            <input
                                type="text"
                                id="modalEditUserLastName"
                                name="modalEditUserLastName"
                                class="form-control"
                                placeholder="Doe"
                                value="Doe" />
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="modalEditUserName">Username</label>
                            <input
                                type="text"
                                id="modalEditUserName"
                                name="modalEditUserName"
                                class="form-control"
                                placeholder="johndoe007"
                                value="johndoe007" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Email</label>
                            <input
                                type="text"
                                id="modalEditUserEmail"
                                name="modalEditUserEmail"
                                class="form-control"
                                placeholder="example@domain.com"
                                value="example@domain.com" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserStatus">Status</label>
                            <select
                                id="modalEditUserStatus"
                                name="modalEditUserStatus"
                                class="select2 form-select"
                                aria-label="Default select example">
                                <option selected>Status</option>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                                <option value="3">Suspended</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditTaxID">Tax ID</label>
                            <input
                                type="text"
                                id="modalEditTaxID"
                                name="modalEditTaxID"
                                class="form-control modal-edit-tax-id"
                                placeholder="123 456 7890"
                                value="123 456 7890" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserPhone">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text">US (+1)</span>
                                <input
                                    type="text"
                                    id="modalEditUserPhone"
                                    name="modalEditUserPhone"
                                    class="form-control phone-number-mask"
                                    placeholder="202 555 0111"
                                    value="202 555 0111" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLanguage">Language</label>
                            <select
                                id="modalEditUserLanguage"
                                name="modalEditUserLanguage"
                                class="select2 form-select"
                                multiple>
                                <option value="">Select</option>
                                <option value="english" selected>English</option>
                                <option value="spanish">Spanish</option>
                                <option value="french">French</option>
                                <option value="german">German</option>
                                <option value="dutch">Dutch</option>
                                <option value="hebrew">Hebrew</option>
                                <option value="sanskrit">Sanskrit</option>
                                <option value="hindi">Hindi</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserCountry">Country</label>
                            <select
                                id="modalEditUserCountry"
                                name="modalEditUserCountry"
                                class="select2 form-select"
                                data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Australia">Australia</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="India" selected>India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Russia">Russian Federation</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="editBillingAddress" />
                                <label for="editBillingAddress" class="switch-label">Use as a billing address?</label>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-3">Submit</button>
                            <button
                                type="reset"
                                class="btn btn-label-secondary"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Edit User Modal -->

    <!-- Add New Credit Card Modal -->
    <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-simple modal-upgrade-plan">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-6">
                        <h2>Upgrade Plan</h2>
                        <p class="text-body-secondary">Choose the best plan for user.</p>
                    </div>
                    <form id="upgradePlanForm" class="row g-4" onsubmit="return false">
                        <div class="col-sm-9">
                            <label class="form-label" for="choosePlan">Choose Plan</label>
                            <select id="choosePlan" name="choosePlan" class="form-select" aria-label="Choose Plan">
                                <option selected>Choose Plan</option>
                                <option value="standard">Standard - $99/month</option>
                                <option value="exclusive">Exclusive - $249/month</option>
                                <option value="Enterprise">Enterprise - $499/month</option>
                            </select>
                        </div>
                        <div class="col-sm-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary">Upgrade</button>
                        </div>
                    </form>
                </div>
                <hr class="mx-md-n5 mx-n3" />
                <div class="modal-body">
                    <h6 class="mb-0">User current plan is standard plan</h6>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex justify-content-center me-2 mt-1">
                            <sup class="h6 pricing-currency pt-1 mt-2 mb-0 me-1 text-primary">$</sup>
                            <h1 class="mb-0 text-primary">99</h1>
                            <sub class="pricing-duration mt-auto mb-5 pb-1 small text-body">/month</sub>
                        </div>
                        <button class="btn btn-label-danger cancel-subscription">Cancel Subscription</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Add New Credit Card Modal -->

    <!-- /Modal -->
</div>
@endsection
