// Performance monitoring and optimization utilities
class PerformanceMonitor {
    constructor() {
        this.metrics = {};
        this.init();
    }

    init() {
        // Monitor Core Web Vitals
        this.observeLCP();
        this.observeFID();
        this.observeCLS();
        
        // Image lazy loading optimization
        this.optimizeImageLoading();
        
        // Intersection Observer for animations
        this.setupAnimationObserver();
    }

    // Largest Contentful Paint
    observeLCP() {
        if ('PerformanceObserver' in window) {
            const observer = new PerformanceObserver((list) => {
                const entries = list.getEntries();
                const lastEntry = entries[entries.length - 1];
                this.metrics.lcp = lastEntry.startTime;
                console.log('LCP:', lastEntry.startTime);
            });
            observer.observe({ entryTypes: ['largest-contentful-paint'] });
        }
    }

    // First Input Delay
    observeFID() {
        if ('PerformanceObserver' in window) {
            const observer = new PerformanceObserver((list) => {
                const entries = list.getEntries();
                entries.forEach((entry) => {
                    this.metrics.fid = entry.processingStart - entry.startTime;
                    console.log('FID:', entry.processingStart - entry.startTime);
                });
            });
            observer.observe({ entryTypes: ['first-input'] });
        }
    }

    // Cumulative Layout Shift
    observeCLS() {
        if ('PerformanceObserver' in window) {
            let clsValue = 0;
            const observer = new PerformanceObserver((list) => {
                const entries = list.getEntries();
                entries.forEach((entry) => {
                    if (!entry.hadRecentInput) {
                        clsValue += entry.value;
                    }
                });
                this.metrics.cls = clsValue;
                console.log('CLS:', clsValue);
            });
            observer.observe({ entryTypes: ['layout-shift'] });
        }
    }

    // Optimize image loading with Intersection Observer
    optimizeImageLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        
                        // Handle picture elements
                        if (img.tagName === 'IMG' && img.closest('picture')) {
                            const picture = img.closest('picture');
                            const sources = picture.querySelectorAll('source');
                            sources.forEach(source => {
                                if (source.dataset.srcset) {
                                    source.srcset = source.dataset.srcset;
                                }
                            });
                        }
                        
                        // Handle regular images
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                        }
                        if (img.dataset.srcset) {
                            img.srcset = img.dataset.srcset;
                        }
                        
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                });
            }, {
                rootMargin: '50px 0px',
                threshold: 0.01
            });

            // Observe all images with data-src
            document.querySelectorAll('img[data-src], img[loading="lazy"]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    // Setup animation observer for performance
    setupAnimationObserver() {
        if ('IntersectionObserver' in window) {
            const animationObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            // Observe elements with animation classes
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                animationObserver.observe(el);
            });
        }
    }

    // Report metrics (for analytics)
    reportMetrics() {
        if (typeof gtag !== 'undefined') {
            gtag('event', 'web_vitals', {
                custom_map: {
                    'metric_lcp': 'lcp',
                    'metric_fid': 'fid', 
                    'metric_cls': 'cls'
                }
            });
        }
        
        // Console report for development
        console.table(this.metrics);
    }
}

// Critical CSS inlining helper
class CriticalCSS {
    static inline() {
        // Identify above-the-fold content
        const criticalElements = [
            'nav',
            '.hero-section',
            '.nav-link',
            '.btn-primary',
            '.mobile-menu-button'
        ];

        // This would be used during build process
        // to extract critical CSS for inlining
        return criticalElements;
    }
}

// Initialize performance monitoring
document.addEventListener('DOMContentLoaded', () => {
    const monitor = new PerformanceMonitor();
    
    // Report metrics after page load
    window.addEventListener('load', () => {
        setTimeout(() => {
            monitor.reportMetrics();
        }, 5000);
    });
});

export { PerformanceMonitor, CriticalCSS };
