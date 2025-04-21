<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }

        .container {
            background-color: white;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 120px;
            height: auto;
            margin-bottom: 20px;
        }

        h2 {
            color: #1f2937;
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .booking-details {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #2563eb;
        }

        .booking-details p {
            margin: 10px 0;
            display: flex;
            align-items: center;
        }

        .booking-details svg {
            margin-right: 10px;
            flex-shrink: 0;
        }

        .btn {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            padding: 14px 28px;
            text-decoration: none;
            border-radius: 8px;
            margin: 25px 0;
            font-weight: 600;
            text-align: center;
            transition: background-color 0.2s ease;
        }

        .btn:hover {
            background-color: #1e40af;
        }

        .btn-container {
            text-align: center;
        }

        .footer {
            margin-top: 30px;
            font-size: 0.9em;
            color: #6b7280;
            text-align: center;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }

        .important-note {
            background-color: #fff4ec;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            border: 1px solid #ffedd5;
            color: #d97706;
        }

        @media screen and (max-width: 480px) {
            .container {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="24" height="24" rx="12" fill="#2563eb" fill-opacity="0.1" />
                <path d="M16 12L10 16.3301L10 7.66987L16 12Z" fill="#2563eb" />
            </svg>
            <h2>Reservation Confirmation</h2>
        </div>

        <p>Hello {{ $booking->customer->name ?? 'Valued Customer' }},</p>

        <p>Thank you for choosing our services. Your reservation for
            <strong>{{ $booking->service->name ?? 'Service' }}</strong> has been successfully received.
        </p>

        <div class="important-note">
            <strong>Important:</strong> Please confirm your reservation using the button below to secure your
            appointment.
        </div>

        <div class="booking-details">
            <p>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 2.66666H3.99999C3.26666 2.66666 2.66666 3.26666 2.66666 3.99999V12C2.66666 12.7333 3.26666 13.3333 3.99999 13.3333H12C12.7333 13.3333 13.3333 12.7333 13.3333 12V3.99999C13.3333 3.26666 12.7333 2.66666 12 2.66666Z"
                        stroke="#2563eb" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M10.6667 1.33334V4.00001" stroke="#2563eb" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M5.33334 1.33334V4.00001" stroke="#2563eb" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M2.66666 6.66666H13.3333" stroke="#2563eb" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <strong>Date:</strong> {{ $booking->date }}
            </p>
            <p>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.00001 14.6667C11.6819 14.6667 14.6667 11.6819 14.6667 8.00001C14.6667 4.31811 11.6819 1.33334 8.00001 1.33334C4.31811 1.33334 1.33334 4.31811 1.33334 8.00001C1.33334 11.6819 4.31811 14.6667 8.00001 14.6667Z"
                        stroke="#2563eb" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M8 4V8L10.6667 9.33333" stroke="#2563eb" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <strong>Time:</strong> {{ $booking->start_time }} - {{ $booking->end_time }}
            </p>
            <p>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.00001 7.33334C9.47277 7.33334 10.6667 6.13943 10.6667 4.66668C10.6667 3.19392 9.47277 2.00001 8.00001 2.00001C6.52725 2.00001 5.33334 3.19392 5.33334 4.66668C5.33334 6.13943 6.52725 7.33334 8.00001 7.33334Z"
                        stroke="#2563eb" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M12.7267 14C12.7267 11.6067 10.6267 9.66666 8.00001 9.66666C5.37334 9.66666 3.27334 11.6067 3.27334 14"
                        stroke="#2563eb" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <strong>Service Provider:</strong> {{ $booking->employee->name ?? 'To be assigned' }}
            </p>
        </div>

        <div class="btn-container">
            <a href="{{ route('booking.confirmation', ['confirmation_code' => $booking->confirmation_code, 'tenants' => $booking->tenant->slug], true) }}"
                class="btn">
                Confirm My Reservation
            </a>
        </div>


        <p>After confirmation, you'll receive a final confirmation email with all the details of your appointment.</p>

        <div class="footer">
            <p>If you did not make this reservation, you can safely ignore this email.</p>
            <p>Need help? Contact our support team at <a href="mailto:support@example.com">support@example.com</a></p>
        </div>
    </div>
</body>

</html>