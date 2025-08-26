@extends('layouts.app')
@section('title','Quote #'.$quote->id)
@section('content')
<div class="max-w-3xl mx-auto px-4 py-10 space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-2xl font-bold">Quote #{{ $quote->id }}</h1>
    <a href="{{ route('admin.dashboard') }}" class="text-sm text-blue-600">← Back</a>
  </div>
  <div class="bg-white rounded-xl shadow p-6 space-y-4">
    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
      <div><dt class="font-semibold text-gray-600">Service</dt><dd>{{ $quote->service }}</dd></div>
      <div><dt class="font-semibold text-gray-600">Timeline</dt><dd>{{ $quote->timeline }}</dd></div>
      <div><dt class="font-semibold text-gray-600">Budget</dt><dd>{{ $quote->budget }}</dd></div>
      <div><dt class="font-semibold text-gray-600">Location</dt><dd>{{ $quote->location }}</dd></div>
      <div><dt class="font-semibold text-gray-600">Access</dt><dd>{{ $quote->access }}</dd></div>
      <div><dt class="font-semibold text-gray-600">Name</dt><dd>{{ $quote->first_name }} {{ $quote->last_name }}</dd></div>
      <div><dt class="font-semibold text-gray-600">Email</dt><dd><a href="mailto:{{ $quote->email }}" class="text-blue-600">{{ $quote->email }}</a></dd></div>
      <div><dt class="font-semibold text-gray-600">Phone</dt><dd>{{ $quote->phone }}</dd></div>
      <div><dt class="font-semibold text-gray-600">Subscribed</dt><dd>{{ $quote->subscribe ? 'Yes':'No' }}</dd></div>
      <div><dt class="font-semibold text-gray-600">Status</dt><dd>{{ ucfirst(str_replace('_',' ',$quote->status)) }}</dd></div>
      <div class="sm:col-span-2"><dt class="font-semibold text-gray-600">Details</dt><dd class="whitespace-pre-line mt-1">{{ $quote->details }}</dd></div>
    </dl>
  </div>
  <form method="POST" action="{{ route('admin.quotes.status',$quote) }}" class="bg-white rounded-xl shadow p-6 flex items-end gap-4">
    @csrf
    <div class="flex-1">
      <label class="block text-sm font-medium mb-1">Update Status</label>
      <select name="status" class="form-input w-full" required>
        @foreach(['new'=>'New','in_progress'=>'In Progress','closed'=>'Closed'] as $val=>$label)
          <option value="{{ $val }}" @selected($quote->status === $val)> {{ $label }} </option>
        @endforeach
      </select>
    </div>
    <button class="btn-primary mt-6">Save</button>
  </form>
  @if(session('ok'))<p class="text-green-600 text-sm">{{ session('ok') }}</p>@endif
  <div class="bg-white rounded-xl shadow p-6 space-y-4">
    <h2 class="font-semibold text-lg">Messages</h2>
    <ul class="space-y-3 max-h-64 overflow-y-auto pr-2">
      @forelse($quote->messages()->latest()->get() as $m)
        <li class="text-sm"><span class="text-gray-500">{{ $m->created_at->diffForHumans() }}:</span> {{ $m->body }}</li>
      @empty
        <li class="text-sm text-gray-500">No messages yet.</li>
      @endforelse
    </ul>
    <form method="POST" action="{{ route('admin.quotes.message',$quote) }}" class="space-y-3">
      @csrf
      <div>
        <label class="block text-sm font-medium mb-1">Add Message</label>
        <textarea name="body" rows="3" class="form-input w-full" required placeholder="Type an update for the client..."></textarea>
      </div>
      <label class="inline-flex items-center gap-2 text-xs"><input type="checkbox" name="email_client" class="rounded"> Email this to client</label>
      <button class="btn-secondary">Send</button>
    </form>
  </div>
</div>
@endsection
