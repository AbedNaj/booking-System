import Chart from 'chart.js/auto';

// Global variable to track the chart instance
let bookingChart = null;

function isDarkMode() {
    return document.documentElement.classList.contains('dark');
}

function getThemeColors() {
    return {
        backgroundColor: isDarkMode() ? '#6366f1' : '#4f46e5',
        textColor: isDarkMode() ? '#e4e4e7' : '#18181b',
        gridColor: isDarkMode() ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)',
    };
}

function renderBookingChart() {
    // Check if the chart element exists in the DOM
    const chartElement = document.getElementById('bookingChart');
    if (!chartElement) {
        console.log('Chart element not found in DOM');
        return;
    }

    const ctx = chartElement.getContext('2d');
    if (!ctx) return;

    // Destroy existing chart instance if it exists
    if (bookingChart) {
        bookingChart.destroy();
        bookingChart = null;
    }

    // Use the data from window or fall back to empty arrays
    const labels = window.bookingChartLabels || [];
    const data = window.bookingChartData || [];
    const title = window.bookingChartTitle || 'Bookings';

    const themeColors = getThemeColors();

    // Create new chart instance
    bookingChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: title,
                data: data,
                backgroundColor: themeColors.backgroundColor,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: themeColors.gridColor },
                    ticks: {
                        color: themeColors.textColor,
                        stepSize: 1
                    }
                },
                x: {
                    grid: { color: themeColors.gridColor },
                    ticks: { color: themeColors.textColor }
                }
            },
            plugins: {
                legend: {
                    labels: { color: themeColors.textColor }
                }
            }
        }
    });

    console.log('Chart rendered successfully');
}

// Function to set up all event listeners
function setupChartEventListeners() {
    // Listen for Livewire events that update the chart data
    window.addEventListener('update-booking-chart', event => {
        console.log('Received update-booking-chart event', event.detail);
        window.bookingChartLabels = event.detail.labels;
        window.bookingChartData = event.detail.data;
        renderBookingChart();
    });

    // Re-render on Livewire navigation events
    window.addEventListener('livewire:navigated', () => {
        console.log('Livewire navigation detected');
        setTimeout(renderBookingChart, 100); // Small delay to ensure DOM is ready
    });

    // Also listen for Livewire page updates which may occur during pagination
    window.addEventListener('livewire:load', () => {
        console.log('Livewire loaded');
        Livewire.hook('message.processed', (message, component) => {
            console.log('Livewire message processed');
            setTimeout(renderBookingChart, 100);
        });
    });

    // Listen for theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', renderBookingChart);
    document.addEventListener('theme-changed', renderBookingChart);

    // Special handler for pagination clicks
    document.addEventListener('click', event => {
        // Check if the clicked element is a pagination link
        if (event.target.closest('.pagination') ||
            event.target.getAttribute('wire:click')?.includes('gotoPage')) {
            console.log('Pagination click detected');
            setTimeout(renderBookingChart, 200); // Slightly longer delay for pagination
        }
    });
}

// Initial setup on DOM content loaded
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM loaded, setting up chart');
    setupChartEventListeners();
    renderBookingChart();
});