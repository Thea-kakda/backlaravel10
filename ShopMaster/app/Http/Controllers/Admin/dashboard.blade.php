@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
  <div class="stat-card">
    <div class="flex items-center justify-between">
      <div>
        <div class="stat-value">{{ number_format($stats['users']) }}</div>
        <div class="stat-label">Total Users</div>
      </div>
      <div class="text-success text-2xl">+8.5%</div>
    </div>
    <div class="text-xs text-gray-500 mt-2">Up from yesterday</div>
  </div>

  <div class="stat-card">
    <div class="flex items-center justify-between">
      <div>
        <div class="stat-value">{{ number_format($stats['orders']) }}</div>
        <div class="stat-label">Total Orders</div>
      </div>
      <div class="text-success text-2xl">+1.3%</div>
    </div>
    <div class="text-xs text-gray-500 mt-2">Up from past week</div>
  </div>

  <div class="stat-card">
    <div class="flex items-center justify-between">
      <div>
        <div class="stat-value">${{ number_format($stats['sales']) }}</div>
        <div class="stat-label">Total Sales</div>
      </div>
      <div class="text-danger text-2xl">-4.3%</div>
    </div>
    <div class="text-xs text-gray-500 mt-2">Down from yesterday</div>
  </div>

  <div class="stat-card">
    <div class="flex items-center justify-between">
      <div>
        <div class="stat-value">{{ number_format($stats['pending']) }}</div>
        <div class="stat-label">Total Pending</div>
      </div>
      <div class="text-success text-2xl">+1.8%</div>
    </div>
    <div class="text-xs text-gray-500 mt-2">Up from yesterday</div>
  </div>
</div>

<!-- Sales Chart -->
<div class="bg-gray-800 rounded-xl p-6 mb-8">
  <div class="flex justify-between items-center mb-4">
    <h3 class="text-lg font-semibold">Sales Details</h3>
    <select class="bg-gray-700 text-sm rounded px-3 py-1">
      <option>October</option>
    </select>
  </div>
  <canvas id="salesChart" height="100"></canvas>
</div>

<!-- Deals Table -->
<div class="bg-gray-800 rounded-xl p-6">
  <div class="flex justify-between items-center mb-4">
    <h3 class="text-lg font-semibold">Deals Details</h3>
    <select class="bg-gray-700 text-sm rounded px-3 py-1">
      <option>October</option>
    </select>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-sm">
      <thead>
        <tr class="text-left text-gray-400 border-b border-gray-700">
          <th class="pb-3">Product Name</th>
          <th class="pb-3">Location</th>
          <th class="pb-3">Date - Time</th>
          <th class="pb-3">Piece</th>
          <th class="pb-3">Amount</th>
          <th class="pb-3">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($deals as $deal)
        <tr class="border-b border-gray-700">
          <td class="py-3 flex items-center space-x-3">
            <div class="w-10 h-10 bg-gray-600 rounded-lg"></div>
            <span>{{ $deal['product'] }}</span>
          </td>
          <td class="py-3 text-gray-400">{{ $deal['location'] }}</td>
          <td class="py-3 text-gray-400">{{ $deal['time'] }}</td>
          <td class="py-3">{{ $deal['pieces'] }}</td>
          <td class="py-3">${{ number_format($deal['amount'], 2) }}</td>
          <td class="py-3">
            <span class="px-3 py-1 rounded-full text-xs bg-green-900 text-success">
              {{ $deal['status'] }}
            </span>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
