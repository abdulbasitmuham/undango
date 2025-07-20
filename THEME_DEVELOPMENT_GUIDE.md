# Wedding Invitation Theme Development Guide

## Overview

This guide explains how to create custom themes for the Laravel-based wedding invitation web application. The application uses Laravel 12, Livewire, and Bootstrap 5 to create beautiful, interactive wedding invitations.

## Theme Structure

Each theme consists of several key files that work together to create a complete wedding invitation experience:

```
theme-name/
├── meta.json          # Theme metadata and configuration
├── view.blade.php     # Main template file with all slides
├── view.css          # Theme-specific styles
├── view.js           # Theme-specific JavaScript
├── view.json         # Slide configuration and form fields
└── assets/           # Theme assets (images, fonts, etc.)
    ├── background.jpg
    ├── frame.png
    ├── fonts/
    └── ...
```

## 1. Theme Metadata (meta.json)

The `meta.json` file contains basic information about your theme:

```json
{
    "slug": "theme-name",
    "name": "Theme Display Name",
    "author": "your-email@example.com",
    "category": "pernikahan",
    "is_public": true,
    "is_premium": false
}
```

### Properties:
- **slug**: Unique identifier for the theme (kebab-case)
- **name**: Display name shown to users
- **author**: Creator's email address
- **category**: Theme category (usually "pernikahan" for wedding)
- **is_public**: Whether theme is publicly available
- **is_premium**: Whether theme requires premium access

## 2. Main Template (view.blade.php)

The main template extends the base card view and defines content for each slide section.

### Basic Structure:

```php
@extends('livewire.user.invitation.card.card-view')

@php
    use App\Models\Upload;
    use App\Helpers\TextHelper;
    use Carbon\Carbon;
@endphp

@section('background')
    <!-- Background content -->
@endsection

@section('banner')
    <!-- Banner content for mobile view -->
@endsection

@section('cover')
    <!-- Cover slide content -->
@endsection

@section('slide_opening')
    <!-- Opening slide content -->
@endsection

@section('slide_quote')
    <!-- Quote slide content -->
@endsection

@section('slide_couple')
    <!-- Couple information slide -->
@endsection

@section('slide_event')
    <!-- Event details slide -->
@endsection

@section('slide_message')
    <!-- Guest messages slide -->
@endsection

@section('slide_story')
    <!-- Love story timeline slide -->
@endsection

@section('slide_gallery')
    <!-- Photo gallery slide -->
@endsection

@section('slide_wish')
    <!-- Gift/wishes slide -->
@endsection

@section('slide_closing')
    <!-- Closing slide -->
@endsection
```

### Available Variables:

- `$fields`: Array containing all form field values
- `$invitation`: Invitation model instance
- `$messages`: Collection of guest messages
- `$active_mode`: Array indicating active package features
- `$owner`: User model instance
- `$paymentOptions`: Available payment methods

### Helper Components:

#### Couple Name Component:
```php
<x-couple-name 
    :bride="$fields['bride_nickname']" 
    :groom="$fields['groom_nickname']" 
    :bride-first="$fields['bride_first']"
    class="my-3 font-script" 
/>
```

#### Couple Logo Component:
```php
<x-couple-logo 
    :bride="$fields['bride_nickname']" 
    :groom="$fields['groom_nickname']" 
    :bride-first="$fields['bride_first']"
    :theme="$fields['couple_logo']"
    :color="'#ffffff'"
    class="mt-5" 
/>
```

#### Photo Frame Component:
```php
<x-photo-frame 
    id="cover_photo" 
    class="a__fadeInDown__1s" 
    :photo="Upload::getUrl($fields['cover_photo'])"
    frame="{{ Upload::getThemeAssetUrl('frame', $this->invitation->theme_slug) }}" 
    rounded="0" 
    f-width="200"
    p-width="115" 
    p-height="150" 
/>
```

#### Card Image Component:
```php
<x-card-img 
    src="{{ Upload::getThemeAssetUrl('flower-1', $this->invitation->theme_slug) }}" 
    width="200"
    position="bottom-left" 
    bottom="225" 
    left="-20" 
    class="a__fadeIn__1s" 
    :x-flip="false"
    :y-flip="false" 
/>
```

#### Countdown Component:
```php
<x-countdown :end="$fields['event_date']" class="mt-5 a__fadeInUp__3s" />
```

### Animation Classes:

The application includes predefined animation classes:

- `a__fadeIn__1s`, `a__fadeIn__2s`, `a__fadeIn__3s`
- `a__fadeInUp__1s`, `a__fadeInUp__2s`, `a__fadeInUp__3s`
- `a__fadeInDown__1s`, `a__fadeInDown__2s`, `a__fadeInDown__3s`
- `a__fadeInLeft__1s`, `a__fadeInRight__1s`
- `a__rotateInDownLeft__1s`, `a__rotateInDownRight__1s`
- `a__wind` (for subtle wind animation)

The application includes predefined animation classes with flexible timing options:

#### Base Animation Classes:
- `a__fadeIn` - Fade in animation (immediate)
- `a__fadeInUp` - Fade in from bottom (immediate)
- `a__fadeInDown` - Fade in from top (immediate)
- `a__fadeInLeft` - Fade in from left (immediate)
- `a__fadeInRight` - Fade in from right (immediate)
- `a__rotateInDownLeft` - Rotate in from top-left (immediate)
- `a__rotateInDownRight` - Rotate in from top-right (immediate)
- `a__wind` - Subtle wind animation (continuous)

#### Animation Delays:
Add timing suffixes to delay animation start:
- `__1s` - Start after 1 second
- `__2s` - Start after 2 seconds  
- `__3s` - Start after 3 seconds
- `__4s` - Start after 4 seconds
- `__5s` - Start after 5 seconds (maximum)

#### Speed Modifiers:
- `__slow` - Slower animation speed
- `__slower` - Much slower animation speed

#### Usage Examples:
```html
<!-- Immediate animations -->
<div class="a__fadeIn">Fades in immediately</div>
<div class="a__fadeInUp">Slides up immediately</div>

<!-- Delayed animations -->
<div class="a__fadeIn__2s">Fades in after 2 seconds</div>
<div class="a__fadeInDown__3s">Slides down after 3 seconds</div>

<!-- Combined with speed modifiers -->
<div class="a__rotateInDownLeft__1s__slow">Rotates in slowly after 1 second</div>
<div class="a__fadeInUp__2s__slower">Fades up very slowly after 2 seconds</div>
```

### Package-Based Features:

Check feature availability using `$active_mode`:
@endif

### Font Integration:

```css
@font-face {
    font-family: "CustomFont";
    font-style: normal;
}

.font-script {
    font-family: "CustomFont", sans-serif;
}
```

### Slide Styling:

Each slide can have custom background and styling:

```css
.slide_opening {
    background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
    position: relative;
}

.slide_quote {
    background-color: rgba(255, 255, 255, 0.9) !important;
}

.slide_couple {
    background-color: rgba(254, 252, 242, 0.7) !important;
}
```

### Button Customization:

```css
.open-btn {
    --btn-outline-custom-color: #556b2f;
    background: transparent;
    border-color: var(--btn-outline-custom-color);
    color: var(--btn-outline-custom-color);
}
```

### Responsive Design:

Ensure your theme works on all devices:

```css
@media (max-width: 768px) {
    .font-script {
        font-size: 1.2rem;
    }
}
```

## 4. Theme JavaScript (view.js)

Add theme-specific JavaScript functionality:

```javascript
document.addEventListener("livewire:navigated", function () {
    // Theme-specific JavaScript code
    
    // Example: Custom animations
    const elements = document.querySelectorAll('.custom-animation');
    elements.forEach(el => {
        // Add custom behavior
    });
    
    // Example: Custom interactions
    document.querySelectorAll('.interactive-element').forEach(el => {
        el.addEventListener('click', function() {
            // Handle interaction
        });
    });
});
```

## 5. Slide Configuration (view.json)

Define the structure and form fields for each slide:

```json
{
    "slides": {
        "slide_opening": {
            "title": "Pembuka",
            "icon_class": "ti ti-sun",
            "show_header": false,
            "video_mode": true,
            "fields": {
                "cover_title": {
                    "type": "text",
                    "label": "Judul Sampul",
                    "default": "The Wedding of"
                },
                "show_countdown": {
                    "type": "switch",
                    "label": "Tampilkan Hitung Mundur",
                    "default": true,
                    "package": 2
                }
            }
        }
    }
}
```

### Field Types:

#### Text Fields:
```json
{
    "type": "text",
    "label": "Field Label",
    "default": "Default Value"
}
```

#### Textarea Fields:
```json
{
    "type": "textarea",
    "label": "Field Label",
    "default": "Default content",
    "assistant": "AI assistant prompt for this field"
}
```

#### Switch/Toggle Fields:
```json
{
    "type": "switch",
    "label": "Enable Feature",
    "default": true,
    "package": 2
}
```

#### Select Fields:
```json
{
    "type": "select",
    "label": "Choose Option",
    "default": "option1",
    "options": {
        "option1": "Option 1",
        "option2": "Option 2"
    }
}
```

#### File Upload Fields:
```json
{
    "type": "files",
    "label": "Upload Photos",
    "mimes": "jpg,png,jpeg,webp",
    "array_max": 5,
    "package": 2
}
```

#### Date/Time Fields:
```json
{
    "type": "date",
    "label": "Event Date",
    "default": "2025-07-20"
},
{
    "type": "time",
    "label": "Event Time",
    "default": "10:00"
}
```

#### Color Fields:
```json
{
    "type": "color",
    "label": "Theme Color",
    "default": "#F8BBD0"
}
```

#### Map Fields:
```json
{
    "type": "map",
    "label": "Event Location",
    "default": "-7.257190034874759,112.75269245962629"
}
```

#### Stories Fields:
```json
{
    "type": "stories",
    "label": "Love Story",
    "array_max": 3,
    "package": 2,
    "default": [
        {
            "date": "2020-02-04",
            "file": "photo-id",
            "caption": "Story description"
        }
    ]
}
```

### Package Restrictions:

- `"package": 2` - Gold package required
- `"package": 3` - Diamond package required
- No package property - Available in all packages

## 6. Assets Management

### Asset Organization:

```
assets/
├── background.jpg     # Main background image
├── frame.png         # Photo frame overlay
├── frame-floral.png  # Alternative frame
├── fonts/
│   └── custom.ttf    # Custom fonts
├── decorations/
│   ├── flower-1.png
│   ├── flower-2.png
│   └── tree-1.png
└── icons/
    └── badge-1.png
```

### Using Assets in Templates:

```php
<!-- Theme assets -->
{{ Upload::getThemeAssetUrl('background', $invitation->theme_slug) }}
{{ Upload::getThemeAssetUrl('frame', $invitation->theme_slug) }}

<!-- User uploaded assets -->
{{ Upload::getUrl($fields['cover_photo']) }}
```

### Asset Optimization:

- Use WebP format for better compression
- Optimize PNG files for transparency
- Keep file sizes reasonable for web performance
- Provide multiple sizes if needed

## 7. Best Practices

### Performance:
- Optimize images and assets
- Use CSS animations over JavaScript when possible
- Minimize HTTP requests
- Use efficient selectors

### Accessibility:
- Provide alt text for images
- Ensure sufficient color contrast
- Use semantic HTML structure
- Support keyboard navigation

### Responsive Design:
- Test on multiple screen sizes
- Use relative units (rem, em, %)
- Implement mobile-first approach
- Consider touch interactions

### Code Quality:
- Follow Laravel/Blade conventions
- Use consistent naming conventions
- Comment complex logic
- Validate user inputs

## 8. Testing Your Theme

### Checklist:
- [ ] All slides render correctly
- [ ] Animations work smoothly
- [ ] Responsive design functions properly
- [ ] Form fields save and display correctly
- [ ] Package restrictions work as expected
- [ ] Assets load properly
- [ ] Cross-browser compatibility
- [ ] Performance is acceptable

### Test Data:
Create comprehensive test data covering:
- All field types
- Different package levels
- Various content lengths
- Multiple photos/files
- Edge cases

## 9. Common Patterns

### Conditional Content:
```php
@if (filled($fields['field_name']))
    <div>{{ $fields['field_name'] }}</div>
@endif
```

### Package-Based Features:
```php
@if (filled($fields['feature']) && $active_mode['gold'])
    <!-- Gold feature content -->
@endif
```

### Photo Handling:
```php
@php
    $photos_url = [];
    foreach ($fields['photos'] ?? [] as $photo) {
        $photos_url[] = asset(Upload::getUrl($photo));
    }
@endphp
```

### Date Formatting:
```php
{{ Carbon::parse($fields['event_date'])->translatedFormat('l, d F Y') }}
```

## 10. Deployment

### File Structure Validation:
Ensure all required files are present:
- meta.json
- view.blade.php
- view.css
- view.js
- view.json

### Asset Verification:
- All referenced assets exist
- File paths are correct
- Permissions are set properly

### Testing in Production:
- Test with real user data
- Verify performance under load
- Check mobile responsiveness
- Validate cross-browser support

## Conclusion

Creating a wedding invitation theme requires attention to detail, understanding of the application structure, and consideration for user experience. Follow this guide to create beautiful, functional themes that provide couples with memorable digital invitations.

For questions or support, contact the development team or refer to the existing theme examples in the codebase.