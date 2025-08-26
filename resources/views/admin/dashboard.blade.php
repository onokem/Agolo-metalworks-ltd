@extends('layouts.app')
@section('title','Admin Dashboard')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
  <div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold">Dashboard</h1>
    <div class="flex gap-3">
      <a href="{{ route('admin.quotes.export') }}" class="btn-secondary">Export CSV</a>
      <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="btn-secondary">Logout</button></form>
    </div>
  </div>
  <div class="grid sm:grid-cols-4 gap-4 mb-8">
    <div class="p-4 bg-white rounded-xl shadow"><p class="text-sm text-gray-500">Total</p><p class="text-2xl font-semibold">{{ $stats['total'] }}</p></div>
    <div class="p-4 bg-white rounded-xl shadow"><p class="text-sm text-gray-500">New</p><p class="text-2xl font-semibold text-blue-600">{{ $stats['new'] }}</p></div>
    <div class="p-4 bg-white rounded-xl shadow"><p class="text-sm text-gray-500">In Progress</p><p class="text-2xl font-semibold text-amber-600">{{ $stats['in_progress'] }}</p></div>
    <div class="p-4 bg-white rounded-xl shadow"><p class="text-sm text-gray-500">Closed</p><p class="text-2xl font-semibold text-green-600">{{ $stats['closed'] }}</p></div>
  </div>
  <div class="bg-white border rounded-xl overflow-hidden shadow">
    <table class="w-full text-sm">
      <thead class="bg-gray-50">
        <tr class="text-left">
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Service</th>
          <th class="px-4 py-2">Name</th>
          <th class="px-4 py-2">Email</th>
          <th class="px-4 py-2">Status</th>
          <th class="px-4 py-2">Created</th>
          <th class="px-4 py-2"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($quotes as $q)
          <tr class="border-t hover:bg-gray-50">
            <td class="px-4 py-2">{{ $q->id }}</td>
            <td class="px-4 py-2">{{ $q->service }}</td>
            <td class="px-4 py-2">{{ $q->first_name }} {{ $q->last_name }}</td>
            <td class="px-4 py-2"><a href="mailto:{{ $q->email }}" class="text-blue-600 hover:underline">{{ $q->email }}</a></td>
            <td class="px-4 py-2">
              <span class="inline-block px-2 py-1 text-xs rounded-full @class(['bg-blue-100 text-blue-700' => $q->status==='new','bg-amber-100 text-amber-700' => $q->status==='in_progress','bg-green-100 text-green-700' => $q->status==='closed'])">{{ str_replace('_',' ', ucfirst($q->status)) }}</span>
            </td>
            <td class="px-4 py-2">{{ $q->created_at->diffForHumans() }}</td>
            <td class="px-4 py-2 text-right"><a href="{{ route('admin.quotes.show',$q) }}" class="text-blue-600 hover:underline">View</a></td>
          </tr>
        @empty
          <tr><td colspan="7" class="px-4 py-6 text-center text-gray-500">No quotes yet.</td></tr>
        @endforelse
      </tbody>
    </table>
    <div class="p-4">{{ $quotes->links() }}</div>
  </div>
</div>
@endsection
