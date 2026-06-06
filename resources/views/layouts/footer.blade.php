<footer class="saas-footer">

    {{-- Gradient top bar --}}
    <div class="footer-gradient-bar"></div>

    <div class="footer-container">

        {{-- Top grid --}}
        <div class="footer-grid">

            {{-- Brand --}}
            <div class="footer-brand">
                <h2>{{ $settings->site_name ?? 'AgriWeb' }}</h2>

                <p>
                    Modern agricultural platform helping farmers connect, sell, and grow efficiently.
                </p>

                {{-- Social --}}
                <div class="footer-social">
                    @if($settings->facebook)
                        <a href="{{ $settings->facebook }}" target="_blank" aria-label="Facebook">
                            <svg viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.8-1.6 1.5V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12z"/></svg>
                        </a>
                    @endif

                    @if($settings->whatsapp)
                        <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" aria-label="WhatsApp">
                            <svg viewBox="0 0 24 24"><path d="M20 3.5A11.8 11.8 0 0 0 1.9 18L1 23l5.2-1.4A11.8 11.8 0 0 0 20 3.5zM12 21a9 9 0 0 1-4.6-1.3l-.3-.2-3.1.8.8-3-.2-.3A9 9 0 1 1 12 21zm5.1-6.3c-.3-.2-1.7-.8-2-.9-.3-.1-.5-.2-.7.2-.2.3-.8.9-1 .9-.2.1-.4.1-.7-.1-.3-.2-1.1-.4-2-1.3-.7-.6-1.2-1.4-1.4-1.7-.1-.3 0-.5.1-.6l.4-.5c.1-.2.2-.3.3-.5.1-.2 0-.4 0-.6s-.7-1.7-1-2.3c-.3-.6-.6-.5-.7-.5h-.6c-.2 0-.6.1-.9.4-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.5-.1 1.7-.7 1.9-1.4.2-.7.2-1.3.2-1.4-.1-.1-.3-.2-.6-.4z"/></svg>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Links --}}
            <div class="footer-links">
                <h3>Quick Links</h3>
                <a href="{{ route('landing') }}">Home</a>
                <a href="{{ route('guest.browse') }}">Browse Products</a>
                <a href="{{ route('guest.browse') }}">Place Order</a>
                <a href="{{ route('guest') }}">FAQ</a>
            </div>

            {{-- Contact --}}
            <div class="footer-contact">
                <h3>Contact</h3>

                @if($settings->phone)
                    <p>📞 {{ $settings->phone }}</p>
                @endif

                @if($settings->email)
                    <p>✉️ {{ $settings->email }}</p>
                @endif

                @if($settings->address)
                    <p>📍 {{ $settings->address }}</p>
                @endif
            </div>

            {{-- Newsletter --}}
            <div class="footer-newsletter">
                <h3>Newsletter</h3>
                <p>Get updates about agriculture tips & products.</p>

                <form>
                  <!--  <input type="email" placeholder="Enter your email"> -->
                    <button type="submit">Subscribe</button>
                </form>
            </div>

        </div>

        {{-- Bottom --}}
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} {{ $settings->site_name ?? 'AgriWeb' }}. All rights reserved.</p>
        </div>

    </div>
</footer>