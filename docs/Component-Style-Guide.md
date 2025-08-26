# Component Style Guide
# Agolo Steelworks Ltd Website

## 1. Button Components

### 1.1 Primary Button
```html
<button class="btn btn-primary">
  Request Quote
</button>
```

```css
.btn {
  @apply px-6 py-3 rounded-lg font-semibold text-base transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2;
}

.btn-primary {
  @apply bg-primary-blue text-white hover:bg-blue-700 focus:ring-primary-blue;
}

.btn-primary:hover {
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
}
```

### 1.2 Secondary Button
```html
<button class="btn btn-secondary">
  Learn More
</button>
```

```css
.btn-secondary {
  @apply bg-transparent text-primary-blue border-2 border-primary-blue hover:bg-primary-blue hover:text-white focus:ring-primary-blue;
}
```

### 1.3 CTA Button (Call-to-Action)
```html
<button class="btn btn-cta">
  Get Free Quote Now
</button>
```

```css
.btn-cta {
  @apply bg-primary-orange text-white hover:bg-orange-600 focus:ring-primary-orange;
  position: relative;
}

.btn-cta::after {
  content: '→';
  margin-left: 8px;
  transition: transform 0.3s ease;
}

.btn-cta:hover::after {
  transform: translateX(3px);
}
```

## 2. Form Components

### 2.1 Input Field
```html
<div class="form-group">
  <label for="email" class="form-label">Email Address</label>
  <input type="email" id="email" name="email" class="form-input" placeholder="your@email.com" required>
  <span class="form-error" id="email-error"></span>
</div>
```

```css
.form-group {
  @apply mb-6;
}

.form-label {
  @apply block text-sm font-medium text-gray-700 mb-2;
}

.form-input {
  @apply w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent transition-all duration-300;
}

.form-input:focus {
  box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
}

.form-error {
  @apply block text-sm text-red-600 mt-1;
}
```

### 2.2 Select Dropdown
```html
<div class="form-group">
  <label for="service" class="form-label">Service Type</label>
  <select id="service" name="service" class="form-select" required>
    <option value="">Select a service</option>
    <option value="structural">Structural Welding</option>
    <option value="fabrication">Metal Fabrication</option>
    <option value="repair">Repair Services</option>
  </select>
</div>
```

```css
.form-select {
  @apply w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent transition-all duration-300 bg-white;
  background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'%3E%3Cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
  background-position: right 12px center;
  background-repeat: no-repeat;
  background-size: 16px;
  appearance: none;
}
```

## 3. Card Components

### 3.1 Service Card
```html
<div class="service-card">
  <div class="service-card__icon">
    <svg class="w-12 h-12 text-primary-blue"><!-- Icon SVG --></svg>
  </div>
  <div class="service-card__content">
    <h3 class="service-card__title">Structural Welding</h3>
    <p class="service-card__description">Professional structural welding services for construction projects.</p>
    <a href="/services/structural-welding" class="service-card__link">Learn More</a>
  </div>
</div>
```

```css
.service-card {
  @apply bg-white rounded-xl shadow-md p-8 text-center hover:shadow-xl transition-all duration-300;
}

.service-card:hover {
  transform: translateY(-4px);
}

.service-card__icon {
  @apply mb-6;
}

.service-card__title {
  @apply text-xl font-bold text-gray-900 mb-4;
}

.service-card__description {
  @apply text-gray-600 mb-6 leading-relaxed;
}

.service-card__link {
  @apply text-primary-blue font-semibold hover:text-blue-700 transition-colors duration-300;
}
```

### 3.2 Project Card (Portfolio)
```html
<div class="project-card">
  <div class="project-card__image">
    <img src="/images/project-1.jpg" alt="Industrial Welding Project" class="project-card__img">
    <div class="project-card__overlay">
      <button class="project-card__view-btn">View Details</button>
    </div>
  </div>
  <div class="project-card__content">
    <h3 class="project-card__title">Industrial Framework</h3>
    <p class="project-card__category">Structural Welding</p>
    <p class="project-card__description">Complete framework construction for manufacturing facility.</p>
  </div>
</div>
```

```css
.project-card {
  @apply bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300;
}

.project-card__image {
  @apply relative overflow-hidden;
}

.project-card__img {
  @apply w-full h-64 object-cover transition-transform duration-500;
}

.project-card:hover .project-card__img {
  transform: scale(1.05);
}

.project-card__overlay {
  @apply absolute inset-0 bg-black bg-opacity-0 flex items-center justify-center transition-all duration-300;
}

.project-card:hover .project-card__overlay {
  @apply bg-opacity-75;
}

.project-card__view-btn {
  @apply btn btn-primary opacity-0 transform translate-y-4 transition-all duration-300;
}

.project-card:hover .project-card__view-btn {
  @apply opacity-100 transform translate-y-0;
}

.project-card__content {
  @apply p-6;
}

.project-card__title {
  @apply text-lg font-bold text-gray-900 mb-2;
}

.project-card__category {
  @apply text-sm text-primary-blue font-medium mb-2;
}

.project-card__description {
  @apply text-gray-600 text-sm;
}
```

## 4. Navigation Components

### 4.1 Main Navigation
```html
<nav class="main-nav">
  <div class="main-nav__container">
    <div class="main-nav__brand">
      <img src="/images/logo.svg" alt="Agolo Steelworks" class="main-nav__logo">
    </div>
    <div class="main-nav__menu" id="main-menu">
      <a href="/" class="main-nav__link main-nav__link--active">Home</a>
      <a href="/services" class="main-nav__link">Services</a>
      <a href="/portfolio" class="main-nav__link">Portfolio</a>
      <a href="/about" class="main-nav__link">About</a>
      <a href="/contact" class="main-nav__link">Contact</a>
      <a href="/quote" class="main-nav__cta">Get Quote</a>
    </div>
    <button class="main-nav__toggle" id="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</nav>
```

```css
.main-nav {
  @apply bg-white shadow-md sticky top-0 z-50;
}

.main-nav__container {
  @apply max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16;
}

.main-nav__logo {
  @apply h-10 w-auto;
}

.main-nav__menu {
  @apply hidden md:flex items-center space-x-8;
}

.main-nav__link {
  @apply text-gray-700 hover:text-primary-blue font-medium transition-colors duration-300 relative;
}

.main-nav__link--active {
  @apply text-primary-blue;
}

.main-nav__link--active::after {
  content: '';
  @apply absolute bottom-0 left-0 w-full h-0.5 bg-primary-blue;
}

.main-nav__cta {
  @apply btn btn-primary;
}

.main-nav__toggle {
  @apply md:hidden flex flex-col justify-center items-center w-8 h-8 space-y-1;
}

.main-nav__toggle span {
  @apply w-6 h-0.5 bg-gray-700 transition-all duration-300;
}

/* Mobile Menu */
@media (max-width: 768px) {
  .main-nav__menu {
    @apply absolute top-full left-0 w-full bg-white shadow-lg py-4 flex-col space-x-0 space-y-4 transform -translate-y-full opacity-0 pointer-events-none transition-all duration-300;
  }
  
  .main-nav__menu.active {
    @apply transform translate-y-0 opacity-100 pointer-events-auto;
  }
}
```

## 5. Hero Section Component

```html
<section class="hero">
  <div class="hero__container">
    <div class="hero__content">
      <h1 class="hero__title">Professional Welding Services in Wigan</h1>
      <p class="hero__subtitle">Expert structural welding, custom fabrication, and repair services for construction, industrial, and residential projects.</p>
      <div class="hero__actions">
        <a href="/quote" class="btn btn-cta">Get Free Quote</a>
        <a href="/portfolio" class="btn btn-secondary">View Our Work</a>
      </div>
      <div class="hero__stats">
        <div class="hero__stat">
          <span class="hero__stat-number">15+</span>
          <span class="hero__stat-label">Years Experience</span>
        </div>
        <div class="hero__stat">
          <span class="hero__stat-number">500+</span>
          <span class="hero__stat-label">Projects Completed</span>
        </div>
        <div class="hero__stat">
          <span class="hero__stat-number">24/7</span>
          <span class="hero__stat-label">Emergency Service</span>
        </div>
      </div>
    </div>
    <div class="hero__image">
      <img src="/images/hero-welding.jpg" alt="Professional Welder at Work" class="hero__img">
    </div>
  </div>
</section>
```

```css
.hero {
  @apply bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-20 lg:py-32;
}

.hero__container {
  @apply max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center;
}

.hero__title {
  @apply text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6;
  background: linear-gradient(135deg, #ffffff 0%, #3b82f6 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.hero__subtitle {
  @apply text-xl text-gray-300 mb-8 leading-relaxed;
}

.hero__actions {
  @apply flex flex-col sm:flex-row gap-4 mb-12;
}

.hero__stats {
  @apply grid grid-cols-3 gap-8;
}

.hero__stat {
  @apply text-center;
}

.hero__stat-number {
  @apply block text-2xl md:text-3xl font-bold text-primary-orange mb-2;
}

.hero__stat-label {
  @apply text-sm text-gray-300;
}

.hero__image {
  @apply relative;
}

.hero__img {
  @apply w-full h-96 lg:h-full object-cover rounded-2xl shadow-2xl;
}
```

## 6. Animation and Interaction Guidelines

### 6.1 Scroll Animations
```css
.fade-in-up {
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.8s ease-out;
}

.fade-in-up.animate {
  opacity: 1;
  transform: translateY(0);
}

.stagger-children > * {
  transition-delay: calc(var(--stagger-delay, 0ms) * var(--index, 0));
}
```

### 6.2 Loading States
```css
.loading {
  position: relative;
  overflow: hidden;
}

.loading::after {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
  animation: shimmer 1.5s infinite;
}

@keyframes shimmer {
  0% { left: -100%; }
  100% { left: 100%; }
}
```

## 7. Responsive Design Patterns

### 7.1 Responsive Typography
```css
.responsive-text {
  font-size: clamp(1rem, 4vw, 2rem);
  line-height: 1.4;
}

.hero__title {
  font-size: clamp(2rem, 8vw, 4rem);
}
```

### 7.2 Responsive Spacing
```css
.section-padding {
  padding: clamp(2rem, 8vw, 6rem) 0;
}

.container-padding {
  padding-left: clamp(1rem, 4vw, 2rem);
  padding-right: clamp(1rem, 4vw, 2rem);
}
```

---

This style guide ensures consistent, professional, and accessible components throughout the Agolo Steelworks website.
