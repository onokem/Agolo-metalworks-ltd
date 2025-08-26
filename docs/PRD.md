# Product Requirements Document (PRD)
# Agolo Steelworks Ltd Website

## 1. Introduction

### 1.1 Purpose
This document outlines the requirements for the Agolo Steelworks Ltd website, a professional platform designed to showcase the company's welding and metal fabrication services, attract new clients, and provide efficient quote request capabilities.

### 1.2 Product Overview
The Agolo Steelworks Ltd website will serve as the primary online presence for the company, highlighting its services, portfolio of completed projects, and facilitating communication with potential clients. The website will be built using Laravel for the backend with a modern, responsive frontend.

### 1.3 Company Information
- **Location**: 2 Palm Grove, Wigan, WN5 9QB, United Kingdom
- **Contact**: +44 7397 105077
- **Service Area**: Wigan and surrounding areas in the UK

### 1.4 Target Audience
- Construction companies seeking welding services
- Individuals requiring custom metal fabrication
- Businesses needing industrial metal work
- Potential clients looking for specialized welding services
- Architects and designers seeking custom metal elements

### 1.5 Competitive Analysis
- **Local Competitors**: Analysis of 5 Wigan-area welding companies shows limited online presence with outdated designs and minimal portfolio examples
- **Regional Leaders**: Larger welding companies in Manchester and Liverpool feature more robust websites but lack personalized service emphasis
- **Key Differentiators**: Opportunity to stand out with superior visual presentation, user-friendly quote system, and showcasing specialized services
- **Industry Trends**: Growing emphasis on digital portfolios and before/after project comparisons
- **Gaps to Fill**: Most competitor websites lack mobile optimization and detailed service descriptions

## 2. Business Objectives

### 2.1 Primary Goals
- Increase brand awareness and online visibility
- Generate quality leads through the website
- Showcase the company's expertise and portfolio
- Streamline the quote request process
- Establish Agolo Steelworks as a trusted provider in the UK welding industry

### 2.2 Success Metrics
- Increase in quote requests (target: 30% increase in 3 months)
- Growth in website traffic (target: 50% increase in 6 months)
- Improved conversion rate from visitors to leads (target: 10% of visitors)
- Positive client feedback on website usability
- Reduced time to process quote requests

## 3. User Requirements

### 3.1 User Personas

#### 3.1.1 Construction Project Manager
- Needs: Quick access to service information, portfolio examples of structural welding, and ability to request quotes for large projects
- Pain points: Time constraints, needs assurance of quality and reliability

#### 3.1.2 Small Business Owner
- Needs: Cost-effective solutions, clear pricing information, examples of similar work
- Pain points: Budget concerns, unsure about technical specifications

#### 3.1.3 Individual Client
- Needs: Easy to understand service descriptions, inspiration from previous work, simple contact process
- Pain points: Limited technical knowledge, concerns about quality and cost

#### 3.1.4 Architect/Designer
- Needs: Portfolio of artistic and precision work, technical capabilities, collaboration process
- Pain points: Finding fabricators who can execute complex designs

### 3.2 User Stories

1. As a potential client, I want to easily understand the services offered so I can determine if they meet my needs.
2. As a construction manager, I want to see examples of similar projects so I can assess the quality of work.
3. As a business owner, I want to request a quote quickly so I can make timely decisions.
4. As a client with technical specifications, I want to be able to upload documents with my quote request.
5. As a mobile user, I want the website to be fully functional on my device so I can browse while on a job site.
6. As a returning visitor, I want to see the latest projects and news so I can stay updated on the company's capabilities.
7. As an admin, I want a secure dashboard to manage quote requests and content.

## 4. Functional Requirements

### 4.1 Core Website Features

#### 4.1.1 Public-Facing Pages
- Home page with company overview, featured projects, and call-to-action
  * Hero section with high-impact welding imagery
  * Featured projects carousel with professional photography
  * Visual representation of services with icons and supporting images
- Services page detailing all offered welding and fabrication services
  * Each service with descriptive imagery and example photos
  * Visual process explanations with supporting imagery
- Portfolio page showcasing completed projects with categories and filters
  * Gallery-style presentation with high-quality project photography
  * Before/after comparisons for restoration projects
  * Filterable by project type, industry, and technique
- About page with company history, team, certifications, and equipment
  * Professional team photos and workshop imagery
  * Equipment showcase with modern photography
  * Map showing Wigan location and service area
- Contact page with form, map, and business hours
  * Google Maps integration showing 2 Palm Grove, Wigan location
  * Contact form with visual feedback elements
- Quote request system with multi-step form
  * Visual service selection interface
  * Progress visualization with icons and progress bar
- Blog/News section for industry updates and company announcements
  * Featured images for all articles
  * Photo galleries within blog posts
- Testimonials section with client photos and project imagery
- FAQ page with visual organization and supporting graphics

#### 4.1.2 Quote System
- Multi-step form with progress indicator
- Service selection with visual aids
- Project details collection with optional file upload
- Client information collection
- Quote summary and submission
- Automated email notifications for both client and company
- Quote tracking capability

#### 4.1.3 Admin Dashboard
- Secure login system with role-based access
- Quote management (view, respond, update status)
- Content management for portfolio and services
- User management for admin staff
- Blog post creation and management
- File management for uploads
- Analytics dashboard with key performance indicators

### 4.2 Non-Functional Requirements

#### 4.2.1 Performance
- Page load time under 3 seconds
- Mobile responsiveness across all devices
- Browser compatibility (Chrome, Firefox, Safari, Edge)
- Support for file uploads up to 10MB
- Optimized image loading with lazy load implementation
- First Contentful Paint under 1.5 seconds
- Cumulative Layout Shift score below 0.1

#### 4.2.2 Security
- SSL certificate implementation
- Secure handling of client data
- GDPR compliance
- Protection against common web vulnerabilities
- Regular security updates
- Rate limiting on forms to prevent abuse
- Security headers implementation (CSP, X-XSS-Protection)
- Regular security scanning and vulnerability assessments

#### 4.2.3 Scalability
- Ability to handle increasing traffic
- Easy addition of new services and portfolio items
- Database optimization for growth
- Compatibility with Hostinger shared business hosting resource limits

### 4.3 Hosting and Deployment Requirements

#### 4.3.1 Hosting Environment
- Compatible with Hostinger shared business hosting plan
- PHP 8.1+ support
- MySQL 5.7+ database support
- Adequate storage for high-quality imagery (minimum 10GB)
- Sufficient bandwidth for expected traffic volume
- Support for Laravel framework requirements

#### 4.3.2 Database Requirements
- Efficient database design to minimize resource usage
- Optimized queries to stay within hosting plan limits
- Adequate database size allocation (starting with 1GB)
- Regular database backups (automated daily)
- Database performance monitoring
- Indexing strategy for optimal performance on shared hosting
- Query caching implementation where appropriate

### 4.4 Accessibility Requirements
- WCAG 2.1 Level AA compliance
- Proper heading structure and semantic HTML
- Sufficient color contrast ratios (minimum 4.5:1 for normal text)
- Alt text for all images and appropriate ARIA labels
- Keyboard navigation functionality throughout the site
- Screen reader compatibility testing
- Form fields with proper labels and error messages
- Focus indicators for interactive elements
- Text resizing without loss of functionality
- Accessible PDF downloads where applicable

### 4.5 Mobile-First Requirements
- Progressive enhancement approach to development
- Touch-friendly interface with appropriate tap target sizes (minimum 44x44px)
- Simplified navigation for mobile users
- Responsive images that adapt to screen size and resolution
- Consideration for limited bandwidth with data-saving options
- Optimized forms for mobile input
- Testing on various device sizes and connection speeds
- Mobile-specific features for on-site usage (e.g., click-to-call)
- Performance optimization for mobile networks
- Offline capabilities for basic information access

### 4.6 Conversion Strategy
- Strategic placement of CTAs throughout the site
- Multiple conversion points tailored to different user journeys
- Value proposition clearly communicated on all pages
- Trust indicators (certifications, testimonials, portfolio)
- Simplified quote request process with minimal required fields
- Follow-up automation for abandoned quote requests
- A/B testing framework for key conversion elements
- Clear service comparison information
- Urgency and scarcity elements where appropriate
- Customer journey mapping with conversion touchpoints

## 5. Technical Specifications

### 5.1 Technology Stack
- **Backend**: Laravel PHP framework
- **Frontend**: HTML5, CSS3, JavaScript (with optional Vue.js components)
- **Database**: MySQL 5.7+ (compatible with Hostinger shared business hosting)
- **Server**: Apache/Nginx on Linux
- **Deployment**: Version control with Git, CI/CD pipeline

### 5.1.1 Frontend Development Workflow
- **Design System**: Establish a component-based design system using Tailwind CSS or Bootstrap
- **Development Process**:
  1. Initial wireframing and mockup approval
  2. Component development using atomic design principles
  3. Integration with Laravel Blade templates
  4. Responsive testing across device sizes
  5. Performance optimization
  6. Accessibility testing and remediation
- **Tools and Standards**:
  * SASS/SCSS for CSS preprocessing with modular architecture
  * JavaScript modules with ES6+ standards
  * Webpack or Laravel Mix for asset compilation
  * Version-controlled component library
  * Browser compatibility testing (Chrome, Firefox, Safari, Edge)
  * CSS naming conventions using BEM methodology
  * SVG for icons and simple illustrations
- **Performance Practices**:
  * Critical CSS inline loading
  * Deferred loading of non-critical resources
  * Image optimization pipeline
  * Code splitting for JavaScript
  * Lazy loading for below-the-fold content
  * HTTP/2 optimization
- **Collaboration**:
  * Design handoff via Figma or Adobe XD
  * Component documentation
  * Regular UI/UX review sessions
  * Cross-functional testing with backend team

### 5.2 Integration Requirements
- Email service for notifications
- Google Maps for location display (showing 2 Palm Grove, Wigan, WN5 9QB)
- Social media sharing capabilities
- Image optimization and content delivery network (CDN) for visual assets
- Analytics tracking
- Optional CRM integration for lead management
- Image compression and optimization tools
- Gallery and lightbox functionality for portfolio images

### 5.3 SEO Requirements
- SEO-friendly URL structure
- Meta tags optimization
- Sitemap generation
- Schema markup for business information
- Mobile-friendly design (Google Mobile-First Index)
- Page speed optimization
- Local SEO implementation for Wigan area
- Structured data for services and business information
- Google Business Profile integration
- Keyword strategy focused on welding services in Northwest England
- Image optimization with descriptive filenames and alt text
- Content strategy for regular fresh content
- Analytics integration with conversion tracking
- Internal linking strategy
- Technical SEO audit schedule

## 6. Content Requirements

### 6.1 Website Copy
- Professional, clear, and concise copywriting
- Service descriptions with technical details and benefits
- Company story and values
- Team member profiles with credentials
- Clear calls-to-action throughout the site

### 6.2 Visual Assets
- High-quality project photographs showing completed welding and fabrication work
- Professional images of workshop, equipment, and welding processes
- Before/after images of repair and restoration projects
- Service illustration/icons for each service category
- Team photographs of welders and staff in professional settings
- Aerial and exterior shots of the Wigan facility
- Action shots of welders working on various projects
- Close-up detail shots highlighting quality of welds and finishes
- Logo and brand elements in various formats and resolutions
- Video testimonials from satisfied clients (optional)
- Process diagrams for complex services
- Visual walkthroughs of the fabrication process
- Images showcasing industry-specific projects (construction, automotive, etc.)

### 6.3 Image Requirements
- All images should be high-resolution (minimum 1920x1080px) with compressed versions for web
- Professional photography is recommended for key portfolio pieces
- Image optimization for web performance is essential
- Consistent style and lighting across all imagery
- Alt text and metadata for all images to improve SEO and accessibility
- Categorization system for portfolio images
- Mix of wide shots, medium shots, and detail shots for each project
- Regular updates with new project photos (quarterly recommended)

### 6.4 Social Proof Strategy
- Client testimonials with full names, companies, and photos where possible
- Case studies for significant projects with measurable outcomes
- Before/after comparisons with client quotes
- Industry certifications and accreditations prominently displayed
- Reviews aggregated from Google Business, Facebook, and industry platforms
- Featured client logos (with permission)
- Video testimonials from satisfied clients
- Project statistics (e.g., "Over 500 structural welding projects completed")
- Awards and recognition badges
- Customer satisfaction metrics
- Social media endorsements and engagement

### 6.5 Multilingual Considerations
- Primary content in English
- Welsh language option for key pages (considering Wales proximity to Wigan)
- Potential for Polish language option (large Polish community in Northwest England)
- Language selector clearly visible in header
- Cultural considerations in imagery and messaging
- Translation quality review process
- Consistent terminology across languages
- SEO strategy adjusted for multilingual content

## 7. Implementation Plan

### 7.1 Development Phases

#### Phase 1: Foundation (Weeks 1-2)
- Project setup and environment configuration
- Database design and implementation aligned with Hostinger hosting constraints
- User authentication system
- Basic frontend template implementation
- Initial photoshoot at 2 Palm Grove, Wigan facility to gather core visual assets
- Setup of frontend development environment and toolchain
- Creation of design system and component library foundations

#### Phase 2: Core Development (Weeks 3-6)
- Public-facing pages development
- Quote system implementation
- Admin dashboard core functionality
- Initial content population
- Image processing and optimization
- Implementation of image galleries and visual components
- Photography of completed projects for portfolio section

#### Phase 3: Refinement (Weeks 7-8)
- UI/UX polishing
- Performance optimization
- Security hardening
- Testing and bug fixing
- Database query optimization for Hostinger shared hosting
- Implementation of caching strategies for improved performance

#### Phase 4: Launch Preparation (Weeks 9-10)
- Final content review and population
- SEO implementation
- Analytics setup
- User acceptance testing
- Server configuration and deployment
- Staging environment testing on Hostinger infrastructure
- Database migration and optimization for production

### 7.2 Post-Launch Activities
- Performance monitoring
- User feedback collection
- Content updates
- Feature enhancements based on analytics and feedback
- Quarterly photoshoots for new projects and portfolio updates
- Regular refresh of visual content to maintain visual interest
- Seasonal promotional imagery updates
- Database performance monitoring and optimization
- Regular database backups and maintenance

### 7.3 Maintenance Plan
- Weekly security updates and patches
- Monthly content refresh (blog posts, project updates)
- Quarterly performance review and optimization
- Bi-annual UX review and enhancement
- Scheduled database maintenance and optimization
- Regular broken link checking and fixing
- Monitoring of user feedback and implementation of improvements
- SEO performance review and adjustment
- Analytics review and strategy refinement
- Technology stack updates as needed

### 7.4 Backup Strategy
- Daily automated database backups
- Weekly full site backups
- Secure off-site storage of all backups
- Monthly backup restoration testing
- Documented backup and recovery procedures
- Redundant backup systems
- Backup retention policy (daily for 7 days, weekly for 1 month, monthly for 1 year)
- Disaster recovery plan with defined RTO and RPO
- Emergency contact protocol for critical issues

### 7.5 Success Criteria
- Website launches on time and within budget
- All core features function as specified
- Page load times meet performance requirements
- Successful quote submissions from day one
- Mobile experience receives positive user feedback
- Admin dashboard allows efficient content management
- SEO baseline established with improvement trend
- Analytics properly tracking user behavior
- Hosting environment stable under expected load
- Security scans pass with no critical vulnerabilities

## 8. Additional Services Expansion

Based on research into UK welding services and revenue opportunities, the website should be structured to accommodate future expansion into these service areas:

### 8.1 Core Service Categories
- Structural Welding
- Custom Metal Fabrication
- Repair Services
- Specialized Welding Techniques
- Mobile Welding Services

### 8.2 Future Revenue Opportunities
- Specialized Alloy Welding
- Precision Welding
- Artistic Metal Work
- Design Services
- Industry-Specific Solutions
- Training Programs
- Custom Product Lines
- Maintenance Contracts

## 9. Approval and Stakeholders

### 9.1 Approval Process
This PRD is subject to review and approval by:
- Agolo Steelworks Ltd Owner/Director at 2 Palm Grove, Wigan
- Operations Manager
- Marketing Team
- Web Development Team

### 9.2 Change Management
Any significant changes to these requirements after approval will require:
- Documentation of proposed changes
- Impact assessment
- Approval from key stakeholders
- Update to project timeline and budget if necessary

### 9.3 Budget Considerations
- Development costs estimated at £15,000-£18,000
- Professional photography budget: £1,500
- Ongoing maintenance: £250-£350 monthly
- Hostinger business hosting plan: £120-£150 annually
- Domain registration and renewal: £15-£20 annually
- SSL certificate: Included with hosting
- Third-party services and integrations: £300-£500 annually
- Content creation and copywriting: £1,000-£1,500
- Contingency budget: 15% of total project cost

### 9.4 Emergency Response Plan
- Designated emergency contacts for technical issues
- Defined severity levels with response time expectations
- Procedure for temporary site maintenance mode
- Backup restoration process documentation
- Security incident response protocol
- Communication templates for different types of outages
- Escalation path for critical issues
- After-incident analysis and prevention planning
- Regular testing of emergency procedures

## 10. Glossary

- **CRM**: Customer Relationship Management
- **GDPR**: General Data Protection Regulation
- **KPI**: Key Performance Indicator
- **SEO**: Search Engine Optimization
- **UI/UX**: User Interface/User Experience
- **MIG**: Metal Inert Gas welding
- **TIG**: Tungsten Inert Gas welding
- **SMAW**: Shielded Metal Arc Welding (stick welding)
- **FCAW**: Flux-Cored Arc Welding
- **CDN**: Content Delivery Network
- **Shared Hosting**: Web hosting where multiple websites share server resources
- **WCAG**: Web Content Accessibility Guidelines
- **RTO**: Recovery Time Objective (maximum acceptable downtime)
- **RPO**: Recovery Point Objective (maximum acceptable data loss)
- **CSP**: Content Security Policy
- **CLS**: Cumulative Layout Shift (page stability metric)
- **FCP**: First Contentful Paint (page load speed metric)

---

Document Version: 1.1  
Last Updated: August 1, 2025  
Prepared by: GitHub Copilot
