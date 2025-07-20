@extends('livewire.user.invitation.card.card-view')

@php
    use App\Models\Upload;
    use App\Helpers\TextHelper;
    use Carbon\Carbon;
@endphp

{{--
@section('style')
@endsection

@section('script')
@endsection

@section('background')
@endsection


@section('header')
@endsection
--}}

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

<!-- Banner -->
@section('banner')
    @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
        <x-couple-logo :color="'#333333'" :bride-first="$fields['bride_first']" :theme="$fields['couple_logo']" :class="'mt-5 a__fadeInDown__1s'" :bride="$fields['bride_nickname']"
            :groom="$fields['groom_nickname']" />
    @endif

    <div class="position-absolute w-100 bottom-0 text-center mb-5">

        @if (filled($fields['cover_photo']))
            <x-photo-frame id="cover_photo" class="a__fadeInDown__1s mb-5" :photo="Upload::getUrl($fields['cover_photo'])"
                frame="{{ Upload::getThemeAssetUrl('frame', $this->invitation->theme_slug) }}" rounded="0" f-width="200"
                p-width="115" p-height="150" />
        @endif

        @if (filled($fields['cover_title']))
            <div class="h6 ls-wide a__fadeInUp__2s">
                {{ $fields['cover_title'] }}</div>
        @endif

        @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
            <x-couple-name :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" :bride-first="$fields['bride_first']" class="my-3 font-script a__fadeIn__2s" />
        @endif

        @if (filled($fields['event_date']))
            <div class="fw-light mt-3 ls-wider a__fadeInDown__2s">
                {{ date('d . m . Y', strtotime($fields['event_date'])) }}
            </div>
        @endif

    </div>
@endsection

<!-- Cover -->
@section('cover')
    <x-card-img src="{{ Upload::getThemeAssetUrl('flower-1', $this->invitation->theme_slug) }}" width="200"
        position="bottom-left" bottom="225" left="-20" class="a__fadeIn__1s" in-class="opacity-50" :x-flip="false"
        :y-flip="false" />

    <x-card-img src="{{ Upload::getThemeAssetUrl('flower-1', $this->invitation->theme_slug) }}" width="100"
        position="bottom-right" bottom="125" right="-20" class="a__fadeInRight__1s" in-class="opacity-50"
        :x-flip="true" :y-flip="false" />

    <x-card-img src="{{ Upload::getThemeAssetUrl('flower-1', $this->invitation->theme_slug) }}" width="120"
        position="bottom-left" bottom="175" left="-20" class="a__rotateInDownLeft__1s" :x-flip="false" />

    <x-card-img src="{{ Upload::getThemeAssetUrl('flower-1', $this->invitation->theme_slug) }}" width="150"
        position="bottom-right" bottom="250" right="-20" class="a__rotateInDownRight__1s__slow" :x-flip="true" />

    @if (filled($fields['cover_title']))
        <div class="ls-wide a__fadeInDown__1s">
            {{ $fields['cover_title'] }}</div>
        <div>
    @endif

    @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
        <x-couple-name :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" :bride-first="$fields['bride_first']"
            class="my-3 font-script a__fadeInDown__1s" />
    @endif

    @if (filled($fields['event_date']))
        <div class="fw-light mt-3 ls-wider a__fadeInDown__2s">
            {{ date('d . m . Y', strtotime($fields['event_date'])) }}
        </div>
    @endif

    @if (filled($fields['cover_photo']))
        <x-photo-frame id="cover_photo" class="a__fadeInDown__1s" :photo="Upload::getUrl($fields['cover_photo'])"
            frame="{{ Upload::getThemeAssetUrl('frame', $this->invitation->theme_slug) }}" rounded="0" f-width="200"
            p-width="115" p-height="150" />
    @else
        <div class="mt-3 a__fadeInDown__1s">
            <img src="{{ Upload::getThemeAssetUrl('flower-2', $this->invitation->theme_slug) }}" />
        </div>
    @endif
@endsection

@section('slide_opening')

    <div>
        <div class="bird-container bird-container-one">
            <div class="bird bird-one"></div>
        </div>
        <div class="bird-container bird-container-two">
            <div class="bird bird-two"></div>
        </div>
        <div class="bird-container bird-container-three">
            <div class="bird bird-three"></div>
        </div>
        <div class="bird-container bird-container-four">
            <div class="bird bird-four"></div>
        </div>
    </div>

    <div class=" position-fixed top-50 start-50 translate-middle pe-none w-100"
        style="
    -webkit-mask-image: linear-gradient(to bottom, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
    mask-image: linear-gradient(to bottom, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);">
        <img src="{{ Upload::getThemeAssetUrl('badge-1', $this->invitation->theme_slug) }}"
            class="mx-auto a__fadeInUp__2s__slow" alt="badge" style="width: 100%; max-width:350px; height: auto;">
    </div>

    <div class="bottom-0 start-0">
        @if (filled($fields['cover_title']))
            <div class="h6 ls-wide a__fadeInUp__3s">
                {{ $fields['cover_title'] }}</div>
        @endif

        @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
            <x-couple-name :one-line="false" :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" :bride-first="$fields['bride_first']"
                class="my-3 font-script a__fadeIn__3s" />
        @endif

        @if (filled($fields['event_date']))
            <div class="fw-light mt-3 ls-wider a__fadeInDown__3s">
                {{ date('d . m . Y', strtotime($fields['event_date'])) }}
            </div>
        @endif
    </div>
    @if (filled($fields['show_countdown']) && filled($fields['event_date']) && $active_mode['gold'])
        <x-countdown :end="$fields['event_date']" class="mt-5 a__fadeInUp__3s" />
        <div class="mt-3 a__fadeInDown__4s">
            @php
                $title = $invitation ? trim($invitation->title) : '';
                $details = $invitation ? trim($invitation->title) : '';
                $start = Carbon::parse($fields['event_date'])->format('Ymd') . 'T010000Z';
                $end = Carbon::parse($fields['event_date'])->addDay()->format('Ymd') . 'T010000Z';
            @endphp
            @if (filled($fields['show_save_the_date']))
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ rawurlencode($title) }}&details={{ rawurlencode($details) }}&dates={{ $start }}/{{ $end }}"
                    class="btn btn-sm btn-outline-custom " style="--btn-outline-custom-color:#355e3b;" target="_blank"
                    rel="noopener noreferrer">
                    <i class="ti ti-calendar-pin"></i> Simpan Tanggal
                </a>
            @endif
        </div>
    @else
        <div style="height:100px">
        </div>
    @endif

    <div class="a__fadeInDown__3s mt-3 title-color">
        <x-chevron-stack />
    </div>

    <x-card-img src="{{ Upload::getThemeAssetUrl('tree-2', $this->invitation->theme_slug) }}" width="300"
        position="bottom-left" bottom="75" left="-150" class="a__rotateInDownLeft__1s__slow"
        in-class="a__wind opacity-75" :x-flip="false" />

    <x-card-img src="{{ Upload::getThemeAssetUrl('tree-2', $this->invitation->theme_slug) }}" width="300"
        position="bottom-right" bottom="75" right="-150" class="a__rotateInDownRight__1s__slow"
        in-class="a__wind opacity-75" :x-flip="true" />

    <x-card-img src="{{ Upload::getThemeAssetUrl('tree-1', $this->invitation->theme_slug) }}" width="200"
        position="bottom-left" left="-75" class="a__rotateInDownLeft__1s" in-class="a__wind opacity-75"
        :x-flip="false" />

    <x-card-img src="{{ Upload::getThemeAssetUrl('tree-1', $this->invitation->theme_slug) }}" width="200"
        position="bottom-right" right="-75" class="a__rotateInDownRight__1s" in-class="a__wind opacity-75"
        :x-flip="true" />

    <x-card-img src="{{ Upload::getThemeAssetUrl('flower-1', $this->invitation->theme_slug) }}" width="150"
        position="bottom-left" left="-25" bottom="350" in-class="a__wind" class="a__rotateInDownLeft__1s__slower"
        :x-flip="false" />

    <x-card-img src="{{ Upload::getThemeAssetUrl('flower-1', $this->invitation->theme_slug) }}" width="150"
        position="bottom-right" right="-25" bottom="350" in-class="a__wind"
        class="a__rotateInDownRight__1s__slower" :x-flip="true" />

@endsection

@section('slide_quote')
    <div class="rounded-2 px-3 py-5 mx-5 a__fadeInDown__1s__slow" style="background: rgba(255, 255, 255, 0.5)">

        <div class="mb-3">
            <img src="{{ Upload::getThemeAssetUrl('flower-2', $this->invitation->theme_slug) }}"
                class="mx-auto a__fadeInUp__2s__slow" style="width:100px" />
        </div>

        @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
            <x-couple-logo :bride-first="$fields['bride_first']" :class="'text-dark a__fadeInDown__2s'" :theme="$fields['couple_logo']" :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" />
        @endif

        @if (filled($fields['quote_content']))
            <div class="a__fadeIn__2s fst-italic mt-3">
                {!! TextHelper::toArabic($fields['quote_content']) !!}
            </div>
        @endif

        @if (filled($fields['quote_source']))
            <div class="a__fadeInDown__3s mt-3">
                {{ $fields['quote_source'] }}
            </div>
        @endif

    </div>
@endsection

@section('slide_couple')
    @php
        $bride_photos_url = [];
        foreach ($fields['bride_photos'] ?? [] as $photo) {
            $bride_photos_url[] = asset(Upload::getUrl($photo));
        }

        $groom_photos_url = [];
        foreach ($fields['groom_photos'] ?? [] as $photo) {
            $groom_photos_url[] = asset(Upload::getUrl($photo));
        }
    @endphp

    @if (filled($fields['couple_caption']))
        <div class="a__fadeIn__1s">
            {{ $fields['couple_caption'] }}
        </div>
    @endif

    @php ob_start(); @endphp
    @if (filled($fields['bride_photos']) && $active_mode['gold'])
        <x-photo-frame id="bride_photos" class="a__fadeInDown__1s" :photo="$bride_photos_url"
            frame="{{ Upload::getThemeAssetUrl('frame-floral', $this->invitation->theme_slug) }}" rounded="100"
            f-width="200" p-width="133" p-height="133" />
    @endif

    <div class="fs-5 mt-3 a__fadeInDown__2s">{{ $fields['bride_fullname'] }}</div>

    @if (filled($fields['bride_parent']))
        <div class="a__fadeInDown__2s">Putri dari {{ $fields['bride_parent'] }}</div>
    @endif

    @if (filled($fields['bride_origin']))
        <div class="a__fadeInDown__2s">{{ $fields['bride_origin'] }}</div>
    @endif

    @if (filled($fields['bride_instagram']))
        <div class="a__fadeInUp__2s">
            <a href="https://instagram.com/{{ $fields['bride_instagram'] }}" target="_blank" class="btn btn-sm btn-icon"
                style="--btn-outline-custom-color:#333333;">
                <i class="ti ti-brand-instagram"></i>
            </a>
        </div>
    @endif

    @php $brideBlock = ob_get_clean(); @endphp

    @php ob_start(); @endphp
    @if (filled($fields['groom_photos']) && $active_mode['gold'])
        <x-photo-frame :reverse="true" id="groom_photos" class="a__fadeInUp__1s" :photo="$groom_photos_url"
            frame="{{ Upload::getThemeAssetUrl('frame-floral', $this->invitation->theme_slug) }}" rounded="100"
            f-width="200" p-width="133" p-height="133" />
    @endif

    <div class="fs-5 mt-3 a__fadeInDown__2s">{{ $fields['groom_fullname'] }}</div>

    @if (filled($fields['groom_parent']))
        <div class="a__fadeInDown__2s">Putra dari {{ $fields['groom_parent'] }}</div>
    @endif

    @if (filled($fields['groom_origin']))
        <div class="a__fadeInDown__2s">{{ $fields['groom_origin'] }}</div>
    @endif

    @if (filled($fields['groom_instagram']))
        <div class="a__fadeInUp__2s">
            <a href="https://instagram.com/{{ $fields['groom_instagram'] }}" target="_blank" class="btn btn-sm btn-icon"
                style="--btn-outline-custom-color:#333333;">
                <i class="ti ti-brand-instagram"></i>
            </a>
        </div>
    @endif

    @php $groomBlock = ob_get_clean(); @endphp

    @if ($fields['bride_first'])
        {!! $brideBlock !!}

        @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
            <x-couple-name :bride="$fields['bride_nickname']" :one-line="false" :groom="$fields['groom_nickname']" :bride-first="$fields['bride_first']"
                class="my-3 font-script a__fadeIn__1s" />
        @else
            <div class="font-script fs-xxl my-3 a__fadeIn__2s">&</div>
        @endif

        {!! $groomBlock !!}
    @else
        {!! $groomBlock !!}

        @if (filled($fields['bride_nickname']) && filled($fields['groom_nickname']))
            <x-couple-name :bride="$fields['bride_nickname']" :one-line="false" :groom="$fields['groom_nickname']" :bride-first="$fields['bride_first']"
                class="my-3 font-script a__fadeIn__1s" />
        @else
            <div class="font-script fs-xxl my-3 a__fadeIn__2s">&</div>
        @endif

        {!! $brideBlock !!}
    @endif
@endsection

@section('slide_event')
    <div class="rounded-2 px-3 py-5 mx-5 a__fadeInDown__1s__slow" style="background: rgba(255, 255, 255, 0.5)">

        @if (filled($fields['show_ceremony']) && $active_mode['gold'])
            <div class="mb-5">
                <div class="fs-xxxxl font-script a__fadeInUp__2s">Akad</div>

                @if (filled($fields['ceremony_date']))
                    <div class="mt-5 a__fadeInDown__2s">
                        {{ Carbon::parse($fields['ceremony_date'])->translatedFormat('l, d F Y') }}
                    </div>
                @endif

                @if (filled($fields['ceremony_time']))
                    <div class="a__fadeInDown__2s">
                        {{ $fields['ceremony_time'] }}
                    </div>
                @endif

                @if (filled($fields['ceremony_location']))
                    <div class="a__fadeInDown__2s">
                        {{ $fields['ceremony_location'] }}
                    </div>
                @endif

                @if (filled($fields['ceremony_fulladdress']))
                    <div class="a__fadeInDown__2s">
                        {{ $fields['ceremony_fulladdress'] }}
                    </div>
                @endif

                @if (filled($fields['ceremony_coordinates']))
                    <div class="mt-3 a__fadeInUp__2s"><a target="_blank" class="btn btn-sm btn-outline-custom"
                            style="--btn-outline-custom-color:#333333; "
                            href="https://www.google.com/maps/place/?q={{ $fields['ceremony_coordinates'] }}">
                            <i class="ti ti-map-pin"></i>
                            Buka Maps</a></div>
                @endif
            </div>
        @endif

        <div>
            @if (filled($fields['event_name']))
                <div class="fs-xxxxl font-script a__fadeInUp__2s">
                    {{ $fields['event_name'] }}</div>
            @endif

            @if (filled($fields['event_date']))
                <div class="mt-5 a__fadeInDown__2s">
                    {{ Carbon::parse($fields['event_date'])->translatedFormat('l, d F Y') }}
                </div>
            @endif

            @if (filled($fields['event_time']))
                <div class="a__fadeInDown__2s">
                    @if (filled($fields['use_event_end_time']) && filled($fields['event_end_time']))
                        {{ $fields['event_time'] }} - {{ $fields['event_end_time'] }}
                    @else
                        {{ $fields['event_time'] }} - selesai
                    @endif
                </div>
            @endif

            @if (filled($fields['event_location']))
                <div class="a__fadeInDown__2s">
                    {{ $fields['event_location'] }}
                </div>
            @endif

            @if (filled($fields['event_fulladdress']))
                <div class="a__fadeInDown__2s">
                    {{ $fields['event_fulladdress'] }}
                </div>
            @endif

            @if (filled($fields['event_coordinates']))
                <div class="mt-3 a__fadeInUp__2s"><a target="_blank" class="btn btn-sm btn-outline-custom"
                        style="--btn-outline-custom-color:#333333; "
                        href="https://www.google.com/maps/place/?q={{ $fields['event_coordinates'] }}">
                        <i class="ti ti-map-pin"></i>
                        Buka Maps</a></div>
            @endif
        </div>

        @if (filled($fields['show_dresscode']))
            <div class="mt-3 a__fadeInDown__2s">Dresscode Acara</div>
            <div class="mt-2 a__fadeInUp__2s d-flex align-items-center justify-content-center ">

                @if (filled($fields['dresscode_1']))
                    <div class="rounded-circle mx-1"
                        style="width: 25px; height: 25px; background: {{ $fields['dresscode_1'] }}">
                    </div>
                @endif
                @if (filled($fields['dresscode_2']))
                    <div class="rounded-circle mx-1"
                        style="width: 25px; height: 25px; background: {{ $fields['dresscode_2'] }}">
                    </div>
                @endif
            </div>
        @endif
        @if (filled($fields['streaming_url']) && $active_mode['diamond'])
            <div class="mt-3 a__fadeInUp__2s d-flex align-items-center justify-content-center ">
                <a href="{{ $fields['streaming_url'] }}" target="_blank" class="btn btn-sm btn-outline-custom "
                    style="--btn-outline-custom-color:#333333;">
                    <i class="ti ti-video"></i>
                    Tautan Streaming
                </a>
            </div>
        @endif
    </div>
@endsection

@section('slide_message')
    @if (filled($fields['message_caption']))
        <div class="a__fadeInUp__1s">{{ $fields['message_caption'] }}</div>
    @endif

    <div class="mt-3 a__fadeInDown__2s">
        <a href="#" class="btn btn-sm btn-outline-custom " style="--btn-outline-custom-color:#333333"
            data-bs-target="#addMessageSheet" data-bs-toggle="offcanvas">Tulis
            Ucapan</a>
    </div>

    @if ($messages)
        <div wire:ignore.self>
            <div style="max-height:50vh"
                class="overflow-auto scrollable mt-3 a__fadeIn__2s row justify-content-center align-items-center mb-4 transparent">
                <x-card-message :messages="$messages" />
            </div>
        </div>
    @endif
@endsection

@section('slide_story')
    @if ($active_mode['gold'])
        <div style="max-height: 70vh" class="wide-block a__fadeInDown__1s">
            <div class="timeline timed d-inline-block mx-auto">
                @forelse ($fields['stories'] as $story)
                    <div class="item">
                        <span class="time">{{ Carbon::parse($story['date'])->translatedFormat('d F Y') }}</span>
                        <div class="dot plain"></div>
                        <div class="timeline-content ">
                            <div class="text text-start">{{ $story['caption'] }}</div>
                            @if ($story['file'])
                                <x-img width="75" height="75" src="{{ Upload::getUrl($story['file']) }}"></x-img>
                            @endif
                        </div>
                    </div>
                @empty
                @endforelse
            </div>

        </div>
    @endif
@endsection

@section('slide_gallery')
    @if ($active_mode['gold'])
        <div class="swiper swiper-gallery mt-3 a__fadeInDown__1s d-block">
            <div class="swiper-wrapper">

                @if (!empty($fields['prewedding_video']) && $active_mode['diamond'])
                    <a href="#" class="swiper-slide" data-bs-toggle="offcanvas" data-bs-target="#videoSheet">
                        <img
                            src="https://img.youtube.com/vi/{{ $this->getYoutubeId($fields['prewedding_video']) }}/maxresdefault.jpg" />
                        <i class="ti ti-brand-youtube text-light position-absolute top-50 start-50 translate-middle "
                            style="font-size:75px"></i>
                    </a>
                @endif

                @php
                    $limit = $active_mode['diamond'] ? 10 : 5;
                    $photos = array_slice($fields['prewedding_photos'], 0, $limit);
                @endphp

                @foreach ($photos as $foto)
                    <div class="swiper-slide">
                        <img src="{{ asset(Upload::getUrl($foto)) }}" />
                    </div>
                @endforeach

            </div>
        </div>
    @endif
@endsection

@section('slide_wish')
    <div class="rounded-2 px-3 py-5 mx-5 a__fadeInDown__1s__slow" style="background: rgba(255, 255, 255, 0.5)">

        @if (filled($fields['wish_caption']))
            <div class="a__fadeInUp__1s">
                {{ $fields['wish_caption'] }}
            </div>
        @endif

        <div class="mt-2 a__fadeIn__1s">
            <a href="#" class="btn btn-sm btn-outline-custom " style="--btn-outline-custom-color:#333333"
                data-bs-target="#confirmWishSheet" data-bs-toggle="offcanvas">Konfirmasi Kado</a>
        </div>

        <ul class="mt-3 listview image-listview media w-100 text-start transparent">
            @if (filled($fields['show_wish_address']) && filled($fields['show_wish_address'] && filled($owner)))
                <li class="transparent">
                    <div class="item transparent">
                        <div class="in">
                            <div>
                                <span class="fw-bold">Alamat</span>
                                <div>{{ $owner->full_address }}</div>
                                <footer>
                                    <div>
                                        {{ $owner->name }} ({{ $owner->phone }})
                                    </div>
                                    <div class="mt-1 a__fadeInDown__2s">
                                        <button type="button" id="bank_account_number_1" @click="window.copyValue"
                                            data-value="{{ $owner->full_address }}" class="btn btn-sm btn-text-custom"
                                            style="--btn-text-custom-color:#333333">
                                            <i class="ti ti-copy"></i>Salin
                                        </button>

                                        @if (filled($fields['show_wishlist']) && $active_mode['gold'])
                                            <button type="button" data-bs-target="#wishSheet" data-bs-toggle="offcanvas"
                                                class="btn btn-sm btn-text-custom"
                                                style="--btn-text-custom-color:#333333">
                                                <i class="ti ti-gift"></i>Kado Impian
                                            </button>
                                        @endif

                                    </div>

                                </footer>
                            </div>
                        </div>
                    </div>
                </li>
            @endif

            @if (filled($fields['show_bank_1']) && filled($fields['bank_name_1']))
                <li class="transparent">
                    <div class="item transparent">
                        <div class="in">
                            <div>
                                <span class="fw-bold">{{ $paymentOptions[$fields['bank_name_1']] }}</span>
                                <div>{{ $fields['bank_account_number_1'] }}</div>
                                <footer>
                                    <div>
                                        {{ $fields['bank_account_name_1'] }}
                                    </div>
                                    <div class="mt-1 a__fadeInDown__2s">
                                        <button type="button" id="bank_account_number_1" @click="window.copyValue"
                                            data-value="{{ preg_replace('/\D/', '', $fields['bank_account_number_1']) }}"
                                            class="btn btn-sm btn-text-custom" style="--btn-text-custom-color:#333333">
                                            <i class="ti ti-copy"></i>Salin
                                        </button>
                                    </div>
                                </footer>
                            </div>
                        </div>
                        <div class="imageWrapper">
                            <x-img src="/api/svg/payment/{{ strtolower($fields['bank_name_1']) }}" width="75" />
                        </div>
                    </div>
                </li>
            @endif

            @if (filled($fields['show_bank_2']) && filled($fields['bank_name_2']) && $active_mode['gold'])
                <li class="transparent">
                    <div class="item transparent">
                        <div class="in">
                            <div>
                                <span class="fw-bold">{{ $paymentOptions[$fields['bank_name_2']] }}</span>
                                <div>{{ $fields['bank_account_number_2'] }}</div>
                                <footer>
                                    <div>
                                        {{ $fields['bank_account_name_2'] }}
                                    </div>
                                    <div class="mt-1 a__fadeInDown__2s">
                                        <button type="button" id="bank_account_number_1" @click="window.copyValue"
                                            data-value="{{ preg_replace('/\D/', '', $fields['bank_account_number_2']) }}"
                                            class="btn btn-sm btn-text-custom" style="--btn-text-custom-color:#333333">
                                            <i class="ti ti-copy"></i>Salin
                                        </button>
                                    </div>
                                </footer>
                            </div>
                        </div>
                        <div class="imageWrapper">
                            <x-img src="/api/svg/payment/{{ strtolower($fields['bank_name_2']) }}" width="75" />
                        </div>
                    </div>
                </li>
            @endif

        </ul>
    </div>
@endsection

@section('slide_closing')
    <x-card-img src="{{ Upload::getThemeAssetUrl('tree-1', $this->invitation->theme_slug) }}" width="200"
        position="bottom-left" left="-75" class="a__rotateInDownLeft__1s" in-class="a__wind opacity-75"
        :x-flip="false" />

    <x-card-img src="{{ Upload::getThemeAssetUrl('tree-1', $this->invitation->theme_slug) }}" width="200"
        position="bottom-right" right="-75" class="a__rotateInDownRight__1s" in-class="a__wind opacity-75"
        :x-flip="true" />

    @if (filled($fields['closing_title']))
        <div class="fs-xxl font-script a__fadeInUp__1s ">
            {{ $fields['closing_title'] }}</div>
    @endif
    @if (filled($fields['closing_caption']))
        <div class="mt-3 a__fadeIn__1s">
            {{ $fields['closing_caption'] }}
        </div>
    @endif

    @if ($fields['show_couple_name'] || $fields['show_parent_name'])
        <div class="mt-3 a__fadeInDown__2s">
            Kami yang berbahagia
        </div>
    @endif

    @if ($fields['show_couple_name'] && $fields['bride_nickname'] && $fields['groom_nickname'])
        <x-couple-name :bride="$fields['bride_nickname']" :groom="$fields['groom_nickname']" :bride-first="$fields['bride_first']"
            class="mt-3 font-script a__fadeInDown__2s" />
    @endif
    @if (filled($fields['show_parent_name']))
        <div class="mt-3 a__fadeInDown__2s">
            Keluarga {{ $fields['groom_parent'] }}<br>
            & Keluarga {{ $fields['bride_parent'] }}
        </div>
    @endif
@endsection
