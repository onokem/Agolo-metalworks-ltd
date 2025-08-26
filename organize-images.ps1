# Create target directories if they don't exist
$dirs = @(
    'public/images/hero',
    'public/images/about',
    'public/images/services',
    'public/images/portfolio',
    'public/images/projects',
    'public/images/team',
    'public/images/products'
)

foreach ($dir in $dirs) {
    if (!(Test-Path -Path $dir)) {
        New-Item -Path $dir -ItemType Directory -Force
    }
}

# Copy and organize images
# Hero images
Copy-Item 'public/agolomage/welding work shop.webp' 'public/images/hero/workshop-hero.webp'
Copy-Item 'public/agolomage/welding workshop.jpeg' 'public/images/hero/workshop-detail.jpeg'
Copy-Item 'public/agolomage/fabrication workshop.jpg' 'public/images/hero/fabrication-hero.jpg'

# About images
Copy-Item 'public/agolomage/team-partners-planning-project-at-workplace-architect-engineer-meeting-at-building-site-construction-site-office-teamwork-concepts-photo.jpg' 'public/images/about/team-planning.jpg'
Copy-Item 'public/agolomage/construction office team.jpeg' 'public/images/about/office-team.jpeg'
Copy-Item 'public/agolomage/Team-Industries_B4A7052_image 5.jpg' 'public/images/about/team-workshop.jpg'

# Services images
Copy-Item 'public/agolomage/structural welding.jpeg' 'public/images/services/structural-welding.jpeg'
Copy-Item 'public/agolomage/metal piece welding work.jpeg' 'public/images/services/metal-fabrication.jpeg'
Copy-Item 'public/agolomage/silo welding work.jpeg' 'public/images/services/silo-welding.jpeg'
Copy-Item 'public/agolomage/aluminium welding on site.jpeg' 'public/images/services/onsite-welding.jpeg'

# Portfolio/Products (Gates)
Copy-Item 'public/agolomage/exquisite ms-gate-work-.jpg' 'public/images/portfolio/gate-custom.jpg'
Copy-Item 'public/agolomage/Gate-Design-GD-4763.jpg' 'public/images/portfolio/gate-design.jpg'
Copy-Item 'public/agolomage/laser cut designed gate.jpg' 'public/images/portfolio/laser-cut-gate.jpg'
Copy-Item 'public/agolomage/laser cut gate .jpeg' 'public/images/portfolio/laser-gate.jpeg'
Copy-Item 'public/agolomage/Short-Metal-Path-Garden-Gate.jpg' 'public/images/portfolio/garden-gate.jpg'
Copy-Item 'public/agolomage/stainless gate .jpeg' 'public/images/portfolio/stainless-gate.jpeg'
Copy-Item 'public/agolomage/steel-gate-alloway-ayr-cutwood.jpg' 'public/images/portfolio/steel-gate.jpg'
Copy-Item 'public/agolomage/stylish gate fabrication.jpeg' 'public/images/portfolio/stylish-gate.jpeg'
Copy-Item 'public/agolomage/white gate.jpg' 'public/images/portfolio/white-gate.jpg'
Copy-Item 'public/agolomage/wrought iron gate.jpg' 'public/images/portfolio/wrought-iron-gate.jpg'
Copy-Item 'public/agolomage/aluminium gate.jpeg' 'public/images/portfolio/aluminium-gate.jpeg'
Copy-Item 'public/agolomage/composite gate .jpg' 'public/images/portfolio/composite-gate.jpg'

# Projects
Copy-Item 'public/agolomage/silo welding.jpg' 'public/images/projects/silo-project.jpg'

# Logo
Copy-Item 'public/agolomage/agolo logo.jpg' 'public/images/agolo-logo.jpg'
Copy-Item 'public/agolomage/agolo logo_2.jpg' 'public/images/agolo-logo-alt.jpg'

Write-Host 'Images organized successfully!'
