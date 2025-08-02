# Sundanese Wedding Theme

A beautiful wedding invitation theme inspired by traditional Sundanese culture, featuring pastel colors, natural patterns, and ornamental motifs.

## Theme Overview

The Sundanese Wedding theme captures the essence of West Java's rich cultural heritage with:

- **Traditional Color Palette**: Beige (#f5f5dc), Green (#8bc34a), and Gold (#ffd700)
- **Cultural Elements**: Batik patterns, traditional ornaments, and Sundanese motifs
- **Elegant Typography**: Playfair Display for headings and Poppins for body text
- **Responsive Design**: Optimized for all screen sizes
- **Animation Effects**: Smooth fade-in animations with cultural touch

## Features

### Cultural Integration
- Sundanese greeting ("Wilujeng Sumping")
- Traditional wisdom quotes in Sundanese language
- Batik and traditional pattern overlays
- Ornamental decorations inspired by Sundanese art

### Color Scheme
- **Primary Beige** (#f5f5dc): Main background color representing elegance
- **Secondary Green** (#8bc34a): Natural green representing growth and harmony
- **Accent Gold** (#ffd700): Traditional gold representing prosperity
- **Supporting Colors**: Warm brown, sage green, and earth tones

### Typography
- **Headings**: Playfair Display (serif) for elegance
- **Body Text**: Poppins (sans-serif) for readability
- **Decorative Text**: Custom Sundanese-inspired styling

### Responsive Design
- Mobile-first approach
- Adaptive layouts for different screen sizes
- Touch-friendly interactions
- Optimized animations for mobile devices

## Slide Structure

### 1. Opening Slide (`slide_opening`)
- Sundanese greeting
- Couple logo
- Cover title
- Couple names
- Optional countdown timer

### 2. Quote Slide (`slide_quote`)
- Religious quote (Al-Quran)
- Quote source
- Sundanese wisdom/proverb
- Decorative elements

### 3. Couple Slide (`slide_couple`)
- Individual couple information
- Photo frames with traditional borders
- Parents' names
- Child order information

### 4. Event Slide (`slide_event`)
- Akad Nikah (Wedding Ceremony) details
- Reception details
- Location with map integration
- Traditional ceremony information

### 5. Message Slide (`slide_message`)
- Guest messages and wishes
- RSVP functionality
- Elegant message display

### 6. Story Slide (`slide_story`) - Gold Package
- Love story timeline
- Photo integration
- Traditional storytelling approach

### 7. Gallery Slide (`slide_gallery`) - Gold Package
- Photo gallery
- Traditional frame styling
- Responsive image display

### 8. Wish Slide (`slide_wish`) - Diamond Package
- Gift/money transfer information
- Payment options
- Traditional blessing context

### 9. Closing Slide (`slide_closing`)
- Closing message
- Couple signature
- Sundanese closing ("Hatur nuhun pisan")
- Final ornamental elements

## Customization Options

### Colors
Users can easily modify the color scheme by updating CSS custom properties:
```css
:root {
    --primary-beige: #f5f5dc;
    --secondary-green: #8bc34a;
    --accent-gold: #ffd700;
    --warm-brown: #8d6e63;
    --soft-cream: #faf6f2;
}
```

### Typography
Font families can be changed in the CSS:
```css
.couple-name {
    font-family: "Your Custom Font", "Playfair Display", serif;
}
```

### Patterns and Ornaments
- Background patterns can be customized via SVG files
- Ornamental elements are modular and can be adjusted
- Opacity and positioning can be modified through CSS

## Assets Included

### Background Elements
- `background.svg`: Main background with Sundanese landscape
- `batik-pattern.svg`: Repeating batik pattern for overlays
- `sundanese-motif.svg`: Traditional motif pattern

### Decorative Elements
- `frame.svg`: Photo frame with traditional ornaments
- `sundanese-ornament.svg`: Corner and decorative ornaments
- `batik-corner.svg`: Corner decoration with batik motifs

### Theme Preview
- `thumbnail.svg`: Theme thumbnail for selection

## Technical Specifications

### File Structure
```
sundanese-wedding/
├── meta.json              # Theme metadata
├── view.blade.php         # Main Laravel Blade template
├── view.css              # Theme styles
├── view.js               # Theme JavaScript
├── view.json             # Slide configuration
└── assets/               # Theme assets
    ├── background.svg
    ├── frame.svg
    ├── sundanese-ornament.svg
    ├── batik-corner.svg
    ├── batik-pattern.svg
    ├── sundanese-motif.svg
    └── thumbnail.svg
```

### Browser Compatibility
- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile browsers (iOS Safari, Chrome Mobile)
- Responsive breakpoints: 768px, 480px

### Performance
- Optimized SVG assets
- CSS animations using transform and opacity
- Minimal JavaScript footprint
- Efficient CSS selectors

## Package Features

### Basic Package (Free)
- All basic slides
- Standard customization options
- Core Sundanese design elements

### Gold Package
- Countdown timer
- Save the date feature
- Story timeline
- Photo gallery

### Diamond Package
- All Gold features
- Gift/payment integration
- Advanced customization options

## Installation

1. Upload the `sundanese-wedding` folder to your themes directory
2. The theme will automatically appear in the theme selection
3. Users can select and customize the theme through the admin panel

## Cultural Notes

This theme pays respect to Sundanese culture by incorporating:
- Traditional color palettes used in Sundanese textiles
- Batik patterns common in West Java
- Natural motifs reflecting the region's agricultural heritage
- Typography choices that balance modern readability with cultural elegance

## Support

For theme customization or technical support, please refer to the main theme development guide or contact the development team.

---

**Theme Version**: 1.0  
**Author**: abdulbasit.muham@gmail.com  
**Category**: Pernikahan (Wedding)  
**Last Updated**: 2024