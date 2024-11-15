@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h2 class="dashboard-title">Daftar Pemesanan Servis</h2>
        </div>
    </div>

    @if($bookings->isEmpty())
        <div class="alert alert-info" role="alert">
            Belum ada pemesanan servis.
        </div>
    @else
        <div class="booking-list">
            @foreach($bookings as $booking)
                <div class="booking-item" id="bookingItem_{{ $booking->id }}">
                    <div class="booking-status
                        @if($booking->status === 'pending') status-pending
                        @elseif($booking->status === 'confirmed') status-confirmed
                        @elseif($booking->status === 'completed') status-completed
                        @endif">
                    </div>
                    <div class="booking-content">
                        <h4 class="vehicle-type">{{ $booking->vehicle_type }}</h4>
                        <div class="booking-details">
                            <div class="detail-item">
                                <i class="far fa-calendar"></i>
                                {{ \Carbon\Carbon::parse($booking->service_date)->format('d M Y') }}
                            </div>
                            <div class="detail-item">
                                <i class="far fa-clock"></i>
                                {{ \Carbon\Carbon::parse($booking->service_date)->format('H:i') }}
                            </div>
                        </div>
                        @if($booking->details)
                            <p class="booking-notes">{{ $booking->details }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
