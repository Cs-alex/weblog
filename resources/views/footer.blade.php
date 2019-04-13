<footer class="{{ session('scheme') == null ? 'menu-scheme-0' : 'menu-'.session('scheme') }}">
    <span>WeBlog 2018 - {{ now()->year }}</span>
    <a href="https://twitter.com/CsendeAlex" class="{{ session('scheme') == null ? 'footer-scheme-0' : 'footer-'.session('scheme') }}" target="_blank">
        <i class="fab fa-twitter"></i>
    </a>
    <a href="https://www.facebook.com/alex.csende" class="{{ session('scheme') == null ? 'footer-scheme-0' : 'footer-'.session('scheme') }}" target="_blank">
        <i class="fab fa-facebook-square"></i>
    </a>
    <a href="https://plus.google.com/u/0/115400433331324453869" class="{{ session('scheme') == null ? 'footer-scheme-0' : 'footer-'.session('scheme') }}" target="_blank">
        <i class="fab fa-google-plus-g"></i>
    </a>
</footer>