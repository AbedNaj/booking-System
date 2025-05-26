<?php



use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        $startHour = fake()->numberBetween(9, 16);
        $duration = fake()->randomElement([15, 30, 45, 60]);
        $startTime = Carbon::createFromTime($startHour, 0);
        $endTime = (clone $startTime)->addMinutes($duration);

        return [
            'date' => fake()->dateTimeBetween('now', '+7 days')->format('Y-m-d'),
            'start_time' => $startTime->format('H:i:s'),
            'end_time' => $endTime->format('H:i:s'),
            'duration' => $duration,
            'price' => fake()->numberBetween(10, 200),
            'status' => fake()->randomElement(['pending', 'confirmed', 'expired', 'cancelled', 'completed', 'no_show', 'rejected']),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
