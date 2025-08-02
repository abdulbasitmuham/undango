@extends('livewire.user.invitation.card.card-view')

@php
    use App\Models\Upload;
    use App\Helpers\TextHelper;
    use Carbon\Carbon;
@endphp

@section('background')
    <div class="swiper card-swiper-background image">
        <div class="swiper-wrapper">
            <div class="swiper-slide card">
                <div class="slide-bg"
                    style="background-image:url('{{ asset(Upload::getThemeAssetUrl('background', $invitation->theme_slug)) }}');">
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Banner Section -->
@section('banner')
    <div class="sundanese-ornament ornament-top-left"></div>
    <div class="sundanese-ornament ornament-top-right"></div>
    
    @if (filled($fields['sundanese_greeting']))
        <div class="text-center mb-3 sundanese-greeting">
            <h4 class="text-success font-weight-bold">{{ $fields['sundanese_greeting'] }}</h4>
        </div>
    @endif

    @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
        <x-couple-logo :color="'#8bc34a'" :bride-first="$fields['bride_first']" :theme="$fields['couple_logo']" 
            :class="'mt-5 a__fadeInDown__1s'" :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" />
    @endif

    <div class="position-absolute w-100 bottom-0 text-center mb-5">
        @if (filled($fields['cover_photo']))
            <x-photo-frame id="cover_photo" class="a__fadeInDown__1s mb-5" :photo="Upload::getUrl($fields['cover_photo'])"
                frame="{{ Upload::getThemeAssetUrl('frame', $this->invitation->theme_slug) }}" rounded="15" f-width="220"
                p-width="125" p-height="160" />
        @endif

        <div class="a__fadeInUp__2s">
            @if (filled($fields['cover_title']))
                <h5 class="text-muted mb-2" style="font-family: Poppins, sans-serif;">{{ $fields['cover_title'] }}</h5>
            @endif
            
            @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
                <x-couple-name :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" 
                    :bride-first="$fields['bride_first']" class="my-3 couple-nickname" 
                    style="font-family: 'Playfair Display', serif; color: var(--secondary-green);" />
            @endif
        </div>

        @if ($active_mode['gold'] && filled($fields['show_countdown']) && $fields['show_countdown'])
            <x-countdown :end="$fields['event_date']" class="mt-4 a__fadeInUp__3s" />
        @endif
    </div>
@endsection

<!-- Cover Slide -->
@section('cover')
    <div class="sundanese-pattern"></div>
    <div class="text-center h-100 d-flex flex-column justify-content-center align-items-center position-relative">
        @if (filled($fields['cover_photo']))
            <x-photo-frame id="cover_photo_main" class="a__fadeIn__1s mb-4" :photo="Upload::getUrl($fields['cover_photo'])"
                frame="{{ Upload::getThemeAssetUrl('frame', $this->invitation->theme_slug) }}" rounded="15" f-width="200"
                p-width="115" p-height="150" />
        @endif

        @if (filled($fields['cover_title']))
            <h4 class="text-muted mb-3 a__fadeInUp__1s" style="font-family: Poppins, sans-serif;">{{ $fields['cover_title'] }}</h4>
        @endif

        @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
            <x-couple-name :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" 
                :bride-first="$fields['bride_first']" class="my-4 couple-nickname a__fadeInUp__2s" />
        @endif

        @if (filled($fields['event_date']))
            <div class="event-date a__fadeInUp__3s" style="font-family: 'Playfair Display', serif; color: var(--earth-brown);">
                {{ Carbon::parse($fields['event_date'])->translatedFormat('l, d F Y') }}
            </div>
        @endif
    </div>
@endsection

<!-- Opening Slide -->
@section('slide_opening')
    <div class="slide_opening">
        <div class="batik-pattern"></div>
        <div class="h-100 d-flex flex-column justify-content-center align-items-center text-center position-relative">
            @if (filled($fields['sundanese_greeting']))
                <h3 class="sundanese-greeting a__fadeIn__1s mb-4" style="color: var(--earth-brown); font-family: 'Playfair Display', serif;">
                    {{ $fields['sundanese_greeting'] }}
                </h3>
            @endif

            @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
                <x-couple-logo :color="'#8bc34a'" :bride-first="$fields['bride_first']" :theme="$fields['couple_logo']" 
                    :class="'mb-4 a__fadeInDown__2s'" :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" />
            @endif

            @if (filled($fields['cover_title']))
                <h5 class="mb-3 a__fadeInUp__2s" style="color: var(--text-light); font-family: Poppins, sans-serif;">
                    {{ $fields['cover_title'] }}
                </h5>
            @endif

            @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
                <x-couple-name :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" 
                    :bride-first="$fields['bride_first']" class="my-4 couple-nickname a__fadeInUp__3s" />
            @endif

            @if ($active_mode['gold'] && filled($fields['show_countdown']) && $fields['show_countdown'])
                <x-countdown :end="$fields['event_date']" class="mt-4 a__fadeInUp__4s" />
            @endif
        </div>
    </div>
@endsection

<!-- Quote Slide -->
@section('slide_quote')
    <div class="slide_quote">
        <div class="h-100 d-flex flex-column justify-content-center align-items-center text-center px-4">
            @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
                <x-couple-logo :color="'#8d6e63'" :bride-first="$fields['bride_first']" :theme="$fields['couple_logo']" 
                    :class="'mb-4 a__fadeIn__1s'" :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" />
            @endif

            @if (filled($fields['quote_content']))
                <div class="sundanese-quote a__fadeInUp__2s">
                    {{ $fields['quote_content'] }}
                </div>
                <div class="quote-decoration a__fadeInUp__3s"></div>
            @endif

            @if (filled($fields['quote_source']))
                <p class="text-muted font-italic a__fadeInUp__3s" style="font-family: Poppins, sans-serif;">
                    — {{ $fields['quote_source'] }}
                </p>
            @endif

            @if (filled($fields['sundanese_wisdom']))
                <div class="mt-4 p-3 rounded" style="background: rgba(139, 195, 74, 0.1); border-left: 4px solid var(--secondary-green);">
                    <p class="mb-0 font-italic a__fadeInUp__4s" style="color: var(--earth-brown); font-family: 'Playfair Display', serif;">
                        "{{ $fields['sundanese_wisdom'] }}"
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection

<!-- Couple Slide -->
@section('slide_couple')
    <div class="slide_couple">
        <div class="h-100 d-flex flex-column justify-content-center px-3">
            <div class="text-center mb-4">
                <h3 class="a__fadeIn__1s" style="font-family: 'Playfair Display', serif; color: var(--earth-brown);">
                    Kedua Mempelai
                </h3>
            </div>

            <!-- Groom Information -->
            @if (!$fields['bride_first'])
                <div class="couple-info a__fadeInLeft__2s">
                    @if (filled($fields['groom_photo']))
                        <div class="text-center mb-3">
                            <x-photo-frame id="groom_photo" class="mb-3" :photo="Upload::getUrl($fields['groom_photo'])"
                                frame="{{ Upload::getThemeAssetUrl('frame', $this->invitation->theme_slug) }}" 
                                rounded="15" f-width="150" p-width="90" p-height="120" />
                        </div>
                    @endif
                    
                    @if (filled($fields['groom_fullname']))
                        <h4 class="couple-name text-center">{{ $fields['groom_fullname'] }}</h4>
                    @endif
                    
                    @if (filled($fields['groom_nickname']))
                        <div class="couple-nickname text-center">{{ $fields['groom_nickname'] }}</div>
                    @endif
                    
                    <div class="couple-parents text-center">
                        @if (filled($fields['groom_child_order']))
                            <p class="mb-1">{{ $fields['groom_child_order'] }} dari:</p>
                        @endif
                        @if (filled($fields['groom_father']))
                            <p class="mb-0">{{ $fields['groom_father'] }}</p>
                        @endif
                        @if (filled($fields['groom_mother']))
                            <p class="mb-0">&amp; {{ $fields['groom_mother'] }}</p>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Bride Information -->
            <div class="couple-info a__fadeInRight__2s">
                @if (filled($fields['bride_photo']))
                    <div class="text-center mb-3">
                        <x-photo-frame id="bride_photo" class="mb-3" :photo="Upload::getUrl($fields['bride_photo'])"
                            frame="{{ Upload::getThemeAssetUrl('frame', $this->invitation->theme_slug) }}" 
                            rounded="15" f-width="150" p-width="90" p-height="120" />
                    </div>
                @endif
                
                @if (filled($fields['bride_fullname']))
                    <h4 class="couple-name text-center">{{ $fields['bride_fullname'] }}</h4>
                @endif
                
                @if (filled($fields['bride_nickname']))
                    <div class="couple-nickname text-center">{{ $fields['bride_nickname'] }}</div>
                @endif
                
                <div class="couple-parents text-center">
                    @if (filled($fields['bride_child_order']))
                        <p class="mb-1">{{ $fields['bride_child_order'] }} dari:</p>
                    @endif
                    @if (filled($fields['bride_father']))
                        <p class="mb-0">{{ $fields['bride_father'] }}</p>
                    @endif
                    @if (filled($fields['bride_mother']))
                        <p class="mb-0">&amp; {{ $fields['bride_mother'] }}</p>
                    @endif
                </div>
            </div>

            <!-- Groom Information (if bride first) -->
            @if ($fields['bride_first'])
                <div class="couple-info a__fadeInLeft__3s">
                    @if (filled($fields['groom_photo']))
                        <div class="text-center mb-3">
                            <x-photo-frame id="groom_photo_alt" class="mb-3" :photo="Upload::getUrl($fields['groom_photo'])"
                                frame="{{ Upload::getThemeAssetUrl('frame', $this->invitation->theme_slug) }}" 
                                rounded="15" f-width="150" p-width="90" p-height="120" />
                        </div>
                    @endif
                    
                    @if (filled($fields['groom_fullname']))
                        <h4 class="couple-name text-center">{{ $fields['groom_fullname'] }}</h4>
                    @endif
                    
                    @if (filled($fields['groom_nickname']))
                        <div class="couple-nickname text-center">{{ $fields['groom_nickname'] }}</div>
                    @endif
                    
                    <div class="couple-parents text-center">
                        @if (filled($fields['groom_child_order']))
                            <p class="mb-1">{{ $fields['groom_child_order'] }} dari:</p>
                        @endif
                        @if (filled($fields['groom_father']))
                            <p class="mb-0">{{ $fields['groom_father'] }}</p>
                        @endif
                        @if (filled($fields['groom_mother']))
                            <p class="mb-0">&amp; {{ $fields['groom_mother'] }}</p>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

<!-- Event Slide -->
@section('slide_event')
    <div class="slide_event">
        <div class="h-100 d-flex flex-column justify-content-center px-3">
            <div class="text-center mb-4">
                <h3 class="a__fadeIn__1s" style="font-family: 'Playfair Display', serif; color: var(--earth-brown);">
                    Acara Pernikahan
                </h3>
            </div>

            <!-- Akad Nikah -->
            @if (filled($fields['akad_nikah']) && $fields['akad_nikah'])
                <div class="event-card a__fadeInUp__2s">
                    <h4 class="event-title">Akad Nikah</h4>
                    
                    @if (filled($fields['akad_date']))
                        <div class="event-date">
                            {{ Carbon::parse($fields['akad_date'])->translatedFormat('l, d F Y') }}
                        </div>
                    @endif
                    
                    @if (filled($fields['akad_time']) && filled($fields['akad_time_end']))
                        <div class="event-time">
                            {{ $fields['akad_time'] }} - {{ $fields['akad_time_end'] }} WIB
                        </div>
                    @endif
                    
                    @if (filled($fields['akad_location']))
                        <div class="event-location mt-2">
                            <strong>{{ $fields['akad_location'] }}</strong>
                        </div>
                    @endif
                    
                    @if (filled($fields['akad_address']))
                        <div class="event-location">
                            {{ $fields['akad_address'] }}
                        </div>
                    @endif
                    
                    @if (filled($fields['akad_maps']))
                        <div class="mt-3">
                            <a href="https://maps.google.com/?q={{ $fields['akad_maps'] }}" target="_blank" 
                               class="btn btn-outline-success btn-sm">
                                <i class="ti ti-map-pin"></i> Lihat Lokasi
                            </a>
                        </div>
                    @endif
                </div>
            @endif

            <!-- Resepsi -->
            <div class="event-card a__fadeInUp__3s">
                <h4 class="event-title">Resepsi Pernikahan</h4>
                
                @if (filled($fields['event_date']))
                    <div class="event-date">
                        {{ Carbon::parse($fields['event_date'])->translatedFormat('l, d F Y') }}
                    </div>
                @endif
                
                @if (filled($fields['event_time']) && filled($fields['event_time_end']))
                    <div class="event-time">
                        {{ $fields['event_time'] }} - {{ $fields['event_time_end'] }} WIB
                    </div>
                @endif
                
                @if (filled($fields['event_location']))
                    <div class="event-location mt-2">
                        <strong>{{ $fields['event_location'] }}</strong>
                    </div>
                @endif
                
                @if (filled($fields['event_address']))
                    <div class="event-location">
                        {{ $fields['event_address'] }}
                    </div>
                @endif
                
                @if (filled($fields['event_maps']))
                    <div class="mt-3">
                        <a href="https://maps.google.com/?q={{ $fields['event_maps'] }}" target="_blank" 
                           class="btn btn-outline-success btn-sm">
                            <i class="ti ti-map-pin"></i> Lihat Lokasi
                        </a>
                    </div>
                @endif
            </div>

            <!-- Sundanese Tradition -->
            @if (filled($fields['sundanese_tradition']))
                <div class="sundanese-tradition a__fadeInUp__4s">
                    <i class="ti ti-star"></i>
                    {{ $fields['sundanese_tradition'] }}
                </div>
            @endif
        </div>
    </div>
@endsection

<!-- Message Slide -->
@section('slide_message')
    <div class="slide_message">
        @if (filled($fields['enable_message']) && $fields['enable_message'])
            <div class="h-100 d-flex flex-column justify-content-center px-3">
                <div class="text-center mb-4">
                    @if (filled($fields['message_title']))
                        <h3 class="a__fadeIn__1s" style="font-family: 'Playfair Display', serif; color: var(--earth-brown);">
                            {{ $fields['message_title'] }}
                        </h3>
                    @endif
                    
                    @if (filled($fields['message_subtitle']))
                        <p class="text-muted a__fadeInUp__2s" style="font-family: Poppins, sans-serif;">
                            {{ $fields['message_subtitle'] }}
                        </p>
                    @endif
                </div>
                
                <!-- Message form and display will be handled by the application -->
                <div class="messages-container a__fadeInUp__3s">
                    <!-- Messages will be rendered here by Livewire -->
                </div>
            </div>
        @endif
    </div>
@endsection

<!-- Story Slide -->
@section('slide_story')
    <div class="slide_story">
        @if ($active_mode['gold'] && filled($fields['enable_story']) && $fields['enable_story'])
            <div class="h-100 d-flex flex-column justify-content-center px-3">
                <div class="text-center mb-4">
                    @if (filled($fields['story_title']))
                        <h3 class="a__fadeIn__1s" style="font-family: 'Playfair Display', serif; color: var(--earth-brown);">
                            {{ $fields['story_title'] }}
                        </h3>
                    @endif
                    
                    @if (filled($fields['story_subtitle']))
                        <p class="text-muted a__fadeInUp__2s" style="font-family: Poppins, sans-serif;">
                            {{ $fields['story_subtitle'] }}
                        </p>
                    @endif
                </div>
                
                <div class="story-timeline">
                    @if (filled($fields['stories']))
                        @foreach ($fields['stories'] as $index => $story)
                            <div class="story-item a__fadeInUp__{{ $index + 3 }}s">
                                <div class="story-date">
                                    {{ Carbon::parse($story['date'])->translatedFormat('d F Y') }}
                                </div>
                                <div class="story-caption">
                                    {{ $story['caption'] }}
                                </div>
                                @if (filled($story['file']))
                                    <div class="mt-2">
                                        <img src="{{ Upload::getUrl($story['file']) }}" 
                                             class="img-fluid rounded" style="max-height: 150px;" alt="Story Image">
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection

<!-- Gallery Slide -->
@section('slide_gallery')
    <div class="slide_gallery">
        @if ($active_mode['gold'] && filled($fields['enable_gallery']) && $fields['enable_gallery'])
            <div class="h-100 d-flex flex-column justify-content-center px-3">
                <div class="text-center mb-4">
                    @if (filled($fields['gallery_title']))
                        <h3 class="a__fadeIn__1s" style="font-family: 'Playfair Display', serif; color: var(--earth-brown);">
                            {{ $fields['gallery_title'] }}
                        </h3>
                    @endif
                    
                    @if (filled($fields['gallery_subtitle']))
                        <p class="text-muted a__fadeInUp__2s" style="font-family: Poppins, sans-serif;">
                            {{ $fields['gallery_subtitle'] }}
                        </p>
                    @endif
                </div>
                
                @if (filled($fields['gallery_photos']))
                    <div class="gallery-container a__fadeInUp__3s">
                        <!-- Gallery will be rendered here -->
                    </div>
                @endif
            </div>
        @endif
    </div>
@endsection

<!-- Wish Slide -->
@section('slide_wish')
    <div class="slide_wish">
        @if ($active_mode['diamond'] && filled($fields['enable_wish']) && $fields['enable_wish'])
            <div class="h-100 d-flex flex-column justify-content-center px-3">
                <div class="text-center mb-4">
                    @if (filled($fields['wish_title']))
                        <h3 class="a__fadeIn__1s" style="font-family: 'Playfair Display', serif; color: var(--earth-brown);">
                            {{ $fields['wish_title'] }}
                        </h3>
                    @endif
                    
                    @if (filled($fields['wish_subtitle']))
                        <p class="text-muted a__fadeInUp__2s" style="font-family: Poppins, sans-serif;">
                            {{ $fields['wish_subtitle'] }}
                        </p>
                    @endif
                </div>
                
                <!-- Payment options will be handled by the application -->
                <div class="payment-options a__fadeInUp__3s">
                    <!-- Payment options will be rendered here -->
                </div>
            </div>
        @endif
    </div>
@endsection

<!-- Closing Slide -->
@section('slide_closing')
    <div class="slide_closing">
        <div class="batik-pattern"></div>
        <div class="sundanese-ornament ornament-bottom-left"></div>
        <div class="sundanese-ornament ornament-bottom-right"></div>
        
        <div class="h-100 d-flex flex-column justify-content-center align-items-center text-center px-4 position-relative">
            @if (filled($fields['closing_message']))
                <div class="closing-message a__fadeIn__2s">
                    {{ $fields['closing_message'] }}
                </div>
            @endif
            
            @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
                <x-couple-logo :color="'#8bc34a'" :bride-first="$fields['bride_first']" :theme="$fields['couple_logo']" 
                    :class="'my-4 a__fadeInUp__3s'" :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" />
            @endif
            
            @if (filled($fields['closing_signature']))
                <div class="closing-signature a__fadeInUp__4s">
                    {{ $fields['closing_signature'] }}
                </div>
            @endif
            
            @if (filled($fields['sundanese_closing']))
                <div class="sundanese-closing a__fadeInUp__5s">
                    {{ $fields['sundanese_closing'] }}
                </div>
            @endif
        </div>
    </div>
@endsection