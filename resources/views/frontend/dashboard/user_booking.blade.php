@extends('frontend.main_master')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Inner Banner -->
<div class="inner-banner inner-bg6">
    <div class="container">
        <div class="inner-title">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>User Booking List </li>
            </ul>
            <h3>User Booking List</h3>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<!-- Service Details Area -->
<div class="service-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                @include('frontend.dashboard.user_menu')

            </div>


            <div class="col-lg-9">
                <div class="service-article">


                    <section class="checkout-area pb-30">
                        <div class="container">
                            <form action="{{ route('password.change.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-details">
                                            <h3 class="title">User Booking List </h3>


                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">B No</th>
                                                        <th scope="col">B Date</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col">Room</th>
                                                        <th scope="col">Check In/Out</th>
                                                        <th scope="col">Total Room</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Download Invoice</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allData as $item)
                                                    <tr>
                                                        <td>{{ $item->code }}</td>
                                                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                        <td>{{ $item['user']['name'] }}</td>
                                                        <td>{{ $item['room']['type']['name'] }}</td>
                                                        <td> <span class="badge bg-primary">{{ $item->check_in }}</span> <span class="badge bg-warning text-dark">{{ $item->check_out }}</span> </td>
                                                        <td>{{ $item->number_of_rooms }}</td>
                                                        <td>
                                                            @if ($item->status == 1)
                                                            <span class="badge bg-success">Complete</span>
                                                            @else
                                                            <span class="badge bg-info text-dark">Pending</span>
                                                            @endif

                                                        </td>
                                                        <td style="text-align: center;">
                                                            <a href="{{ route('user.invoice',$item->id) }}" style="display: inline-block; width: 100%; height: 100%;">
                                                                <i class='bx bx-download' style="font-size: 24px; line-height: 24px;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>



                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </section>

                </div>
            </div>


        </div>
    </div>
</div>
<!-- Service Details Area End -->

@endsection