@extends('layouts.app')

@section('title', 'Get Quote | Agolo Steelworks Ltd')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Request a Free Quote</h1>

        <!-- Progress Steps -->
        <ol class="flex items-center justify-center gap-4 mb-8 text-sm" aria-label="Steps">
            <li class="step-item step-active">Service</li>
            <li class="step-item">Project</li>
            <li class="step-item">Contact</li>
            <li class="step-item">Review</li>
        </ol>

    @php($postAction = \Illuminate\Support\Facades\Route::has('quote.store') ? route('quote.store') : url('/quote'))
    <form id="quote-wizard" class="space-y-6" aria-label="Quote Wizard" novalidate action="{{ $postAction }}" method="POST">
            @csrf
            <!-- Step 1: Service selection with guidance -->
            <fieldset class="step" data-step="1" aria-label="Select Service">
                <legend class="sr-only">Select Service</legend>
                <div class="grid sm:grid-cols-2 gap-4">
                    @foreach([
                        ['id'=>'steel_fab','title'=>'Steel Fabrication','desc'=>'Custom parts, frames, gates, rails'],
                        ['id'=>'struct_weld','title'=>'Structural Welding','desc'=>'Beams, columns, mezzanines'],
                        ['id'=>'mobile_weld','title'=>'Mobile Welding','desc'=>'On-site, emergency repairs'],
                        ['id'=>'repairs','title'=>'Repairs & Maintenance','desc'=>'Inspection, patching, servicing'],
                    ] as $s)
                        <label class="block border rounded-xl p-4 cursor-pointer hover:border-blue-400 focus-within:ring-2 focus-within:ring-blue-500">
                            <input type="radio" name="service" value="{{ $s['title'] }}" class="sr-only" required>
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center">🏗️</div>
                                <div>
                                    <div class="font-semibold text-gray-900">{{ $s['title'] }}</div>
                                    <div class="text-sm text-gray-600">{{ $s['desc'] }}</div>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
                <p class="text-sm text-gray-600 mt-3">Tip: Not sure? Pick the closest option; you can refine details next.</p>
            </fieldset>

            <!-- Step 2: Project details with smart prompts -->
            <fieldset class="step hidden" data-step="2" aria-label="Project Details">
                <legend class="sr-only">Project Details</legend>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Timeline</label>
                        <select name="timeline" class="form-input" required>
                            <option value="">Select</option>
                            <option>ASAP (emergency)</option>
                            <option>2-4 weeks</option>
                            <option>1-3 months</option>
                            <option>Flexible</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Budget (GBP)</label>
                        <select name="budget" class="form-input">
                            <option value="">Select</option>
                            <option>< £1,000</option>
                            <option>£1,000 - £5,000</option>
                            <option>£5,000 - £20,000</option>
                            <option>£20,000+</option>
                        </select>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Location</label>
                        <input type="text" name="location" class="form-input" placeholder="City or site" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Site Access</label>
                        <select name="access" class="form-input">
                            <option value="">Select</option>
                            <option>Easy vehicle access</option>
                            <option>Restricted / permits needed</option>
                            <option>Indoor only</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Project Description</label>
                    <textarea name="details" rows="4" class="form-input" placeholder="E.g., dimensions, material grade, drawings available…" required></textarea>
                    <p class="text-xs text-gray-500 mt-1">Provide rough dimensions and any drawings/photos if available.</p>
                </div>
            </fieldset>

            <!-- Step 3: Contact details -->
            <fieldset class="step hidden" data-step="3" aria-label="Contact Details">
                <legend class="sr-only">Contact Details</legend>
                <div class="grid sm:grid-cols-2 gap-4">
                    <input type="text" name="first_name" class="form-input" placeholder="First Name" required>
                    <input type="text" name="last_name" class="form-input" placeholder="Last Name" required>
                </div>
                <div class="grid sm:grid-cols-2 gap-4">
                    <input type="email" name="email" class="form-input" placeholder="Email" required>
                    <input type="tel" name="phone" class="form-input" placeholder="Phone">
                </div>
                <div>
                    <label class="inline-flex items-center gap-2 text-sm">
                        <input type="checkbox" name="subscribe" class="rounded border-gray-300"> Keep me updated about relevant services.
                    </label>
                </div>
            </fieldset>

            <!-- Step 4: Review -->
            <section class="step hidden" data-step="4" aria-label="Review">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                    <h2 class="font-semibold mb-2">Review your request</h2>
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm" id="review-list"></dl>
                </div>
            </section>

            <!-- Controls -->
            <div class="flex items-center justify-between gap-3">
                <button type="button" class="btn-secondary" id="prev-step" disabled>Back</button>
                <button type="button" class="btn-primary" id="next-step">Next</button>
                <button type="submit" class="btn-primary hidden" id="submit-quote">Get My Quote</button>
            </div>
        </form>

        <p class="text-center text-gray-600 mt-6">Prefer to talk? Call <a href="tel:+447397105077" class="text-blue-600 font-medium">+44 7397 105077</a></p>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('quote-wizard');
  const steps = Array.from(form.querySelectorAll('.step'));
  const indicators = Array.from(document.querySelectorAll('.step-item'));
  const prevBtn = document.getElementById('prev-step');
  const nextBtn = document.getElementById('next-step');
  const submitBtn = document.getElementById('submit-quote');
  const reviewList = document.getElementById('review-list');
  let current = 0;

  const updateIndicators = () => {
    indicators.forEach((el, i) => {
      el.classList.toggle('step-active', i <= current);
      el.setAttribute('aria-current', i === current ? 'step' : 'false');
    });
  };

  const showStep = (idx) => {
    steps.forEach((s, i) => s.classList.toggle('hidden', i !== idx));
    prevBtn.disabled = idx === 0;
    nextBtn.classList.toggle('hidden', idx === steps.length - 1);
    submitBtn.classList.toggle('hidden', idx !== steps.length - 1);
    current = idx;
    updateIndicators();
    if (idx === steps.length - 1) buildReview();
  };

  const validateStep = () => {
    const fields = Array.from(steps[current].querySelectorAll('[required]'));
    return fields.every(f => f.reportValidity());
  };

  const buildReview = () => {
    const data = new FormData(form);
    const pairs = [
      ['Service', data.get('service')],
      ['Timeline', data.get('timeline')],
      ['Budget', data.get('budget')],
      ['Location', data.get('location')],
      ['Site Access', data.get('access')],
      ['Details', data.get('details')],
      ['First Name', data.get('first_name')],
      ['Last Name', data.get('last_name')],
      ['Email', data.get('email')],
      ['Phone', data.get('phone')]
    ];
    reviewList.innerHTML = pairs
      .filter(([,v]) => v && String(v).trim() !== '')
      .map(([k,v]) => `<div><dt class='text-gray-500'>${k}</dt><dd class='font-medium text-gray-900 break-words'>${String(v)}</dd></div>`) 
      .join('');
  };

  // Toggle card selection visuals
  form.querySelectorAll('input[type="radio"][name="service"]').forEach(r => {
    r.addEventListener('change', () => {
      form.querySelectorAll('label[for]').forEach(l => l.classList.remove('ring-2','ring-blue-500'));
    });
  });

  prevBtn.addEventListener('click', () => showStep(Math.max(0, current - 1)));
  nextBtn.addEventListener('click', () => { if (validateStep()) showStep(Math.min(steps.length - 1, current + 1)); });

    form.addEventListener('submit', async (e) => {
    e.preventDefault();
    if (!validateStep()) return;
        nextBtn.disabled = true; submitBtn.disabled = true;
        try {
            const res = await fetch(form.action, {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: new FormData(form)
            });
            if (!res.ok) throw new Error('Request failed');
            const data = await res.json();
            const toast = document.createElement('div');
            toast.className = 'fixed bottom-6 right-6 bg-blue-600 text-white px-4 py-2 rounded-lg shadow-lg';
            toast.textContent = data.message || 'Thanks! We\'ve received your request and will contact you shortly.';
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 4000);
            form.reset(); showStep(0); nextBtn.disabled = false; submitBtn.disabled = false;
        } catch (err) {
            const toast = document.createElement('div');
            toast.className = 'fixed bottom-6 right-6 bg-red-600 text-white px-4 py-2 rounded-lg shadow-lg';
            toast.textContent = 'Sorry, something went wrong. Please try again.';
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 4000);
            nextBtn.disabled = false; submitBtn.disabled = false;
        }
  });

  showStep(0);
});
</script>

<style>
.step-item { color: #64748b; }
.step-active { color: #1d4ed8; font-weight: 600; }
</style>
@endpush
@endsection
