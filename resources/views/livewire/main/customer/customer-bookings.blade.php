<div>
    <section class="bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 py-12">
            <div x-data="{ showModal: false, booking: @entangle('selectedBooking') }">


                <div class="bg-white rounded-lg shadow-lg max-w-4xl mx-auto p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="text-2xl font-bold text-gray-800">My Bookings</h1>
                        <div class="flex">
                            <div class="relative">

                                <div class="absolute left-3 top-2.5">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Service</th>
                                    <th class="py-3 px-6 text-left">Date & Time</th>
                                    <th class="py-3 px-6 text-center">Status</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">

                                @foreach ($bookings as $booking)
                                                                <tr class="border-b border-gray-200 hover:bg-gray-50">

                                                                    <td class="py-4 px-6 text-left">
                                                                        <span class="font-medium">{{ $booking->service->name }}</span>
                                                                    </td>
                                                                    <td class="py-4 px-6 text-left">
                                                                        <div>{{ $booking->date }}</div>
                                                                        <div class="text-gray-500">
                                                                            {{ $booking->start_time . ' - ' . $booking->end_time }}
                                                                        </div>
                                                                    </td>
                                                                    <td class="py-4 px-6 text-center">
                                                                        <span @class([
                                                                            'py-1 px-3 rounded-full text-xs',
                                                                            'bg-yellow-100 text-yellow-800' => $booking->status === 'pending',
                                                                            'bg-blue-100 text-blue-800' => $booking->status === 'confirmed',
                                                                            'bg-gray-200 text-gray-600' => $booking->status === 'expired',
                                                                            'bg-red-100 text-red-800' => $booking->status === 'cancelled',
                                                                            'bg-green-100 text-green-800' => $booking->status === 'completed',
                                                                            'bg-orange-100 text-orange-800' => $booking->status === 'no_show',
                                                                            'bg-pink-100 text-pink-800' => $booking->status === 'rejected',
                                                                        ])>{{ $booking->status }}</span>
                                                                    </td>
                                                                    <td class="py-4 px-6 text-center">
                                                                        <div class="flex item-center justify-center space-x-2">
                                                                            <button
                                                                                @click="$wire.call('openBookingModal', {{ $booking->id }}).then(() => showModal = true)"
                                                                                class="transform hover:scale-110 transition-transform duration-300"
                                                                                title="View Details">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                                                    viewBox="0 0 24 24" fill="none" stroke="#173fde" stroke-width="2.5"
                                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                                    class="lucide hover:cursor-pointer lucide-eye-icon lucide-eye">
                                                                                    <path
                                                                                        d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                                                                    <circle cx="12" cy="12" r="3" />
                                                                                </svg>
                                                                            </button>


                                                                        </div>
                                                                    </td>
                                                                </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 text-center text-sm text-gray-500">
                        Showing {{ $bookingCount }} bookings
                    </div>
                </div>

                <div x-cloak x-show="showModal" @click.away="showModal = false"
                    class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center"
                    x-transition:enter="transition ease duration-200" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4" x-data="{ 
                                                        booking: {
                                                            id: {{ $selectedBooking->id ?? '' }} ,
                                                            service: '{{ $selectedBooking->service->name ?? ''}}',
                                                            employee: '{{ $selectedBooking->employee->name ?? ''}}',
                                                            date: '{{ $selectedBooking->date ?? ''}}',
                                                            start_time: '{{ $selectedBooking->start_time ?? ''}}',
                                                            end_time: '{{ $selectedBooking->end_time ?? ''}}',
                                                            duration: {{ $selectedBooking->duration ?? ''}},
                                                            price: {{ $selectedBooking->price ?? ''}},
                                                            status: '{{ $selectedBooking->status ?? ''}}',
                                                            payment_status: '{{ $selectedBooking->payment_status ?? ''}}'
                                                        }
                                                     }">
                        <div class="flex justify-between items-center border-b pb-3">
                            <h3 class="text-lg font-semibold text-gray-900" x-text="booking.service"></h3>
                            <button @click="showModal = false" class="text-gray-400 hover:text-gray-600">
                                x
                            </button>
                        </div>
                        <div class="py-4">
                            <div class="mb-3">
                                <p class="text-sm text-gray-500">Date & Time</p>
                                <p class="font-medium"
                                    x-text="booking.date + ' ' + booking.start_time + ' - ' + booking.end_time"></p>
                            </div>
                            <div class="mb-3">
                                <p class="text-sm text-gray-500">Duration</p>
                                <p class="font-medium" x-text="booking.duration + ' minutes'"></p>
                            </div>
                            <div class="mb-3">
                                <p class="text-sm text-gray-500">Staff</p>
                                <p class="font-medium" x-text="booking.employee"></p>
                            </div>
                            <div class="mb-3">
                                <p class="text-sm text-gray-500">Status</p>
                                <p class="font-medium" :class="booking . status === 'confirmed' ? 'text-green-600' :
        booking . status === 'cancelled' ? 'text-red-600' : 'text-yellow-600'"
                                    x-text="booking.status.charAt(0).toUpperCase() + booking.status.slice(1)"></p>
                            </div>
                            <div class="mb-3">
                                <p class="text-sm text-gray-500">Payment Status</p>
                                <p class="font-medium" :class="booking . payment_status === 'paid' ? 'text-green-600' : 'text-yellow-600'"
                                    x-text="booking.payment_status.charAt(0).toUpperCase() + booking.payment_status.slice(1)">
                                </p>
                            </div>
                            <div class="mb-3">
                                <p class="text-sm text-gray-500">Price</p>
                                <p class="font-medium" x-text="'$' + booking.price"></p>
                            </div>
                        </div>
                        <div class="border-t pt-4 flex justify-end space-x-3">
                            <button @click="showModal = false"
                                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                                Close
                            </button>
                            <button x-show="booking.status !== 'cancelled'"
                                class="px-4 py-2 bg-red-500 rounded-md text-white hover:bg-red-600">
                                Cancel Booking
                            </button>
                        </div>
                    </div>
                </div>

            </div>
    </section>
</div>