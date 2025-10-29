import './bootstrap';

import Alpine from 'alpinejs';

import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('salesChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['5k', '10k', '15k', '20k', '25k', '30k', '35k', '40k', '45k', '50k', '55k', '60k'],
                datasets: [{
                    label: 'Sales',
                    data: [12000, 19000, 3000, 5000, 2000, 3000, 43664, 25000, 18000, 27000, 35000, 22000],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, ticks: { color: '#9ca3af' } },
                    x: { ticks: { color: '#9ca3af' } }
                }
            }
        });
    }
});

window.Alpine = Alpine;

Alpine.start();