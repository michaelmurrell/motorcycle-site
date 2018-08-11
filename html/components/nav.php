<nav class="nav">
    <div class="nav-inner">
        <ul class="nav__list">
            <li 
                class="nav__list-item <?= $data->page == 'home' ? 'nav__list-item--active' : ''; ?>"
            >
                <a href="index.html">Home</a>
            </li>
            <li
                 class="nav__list-item <?= $data->page == 'build-plans' ? 'nav__list-item--active' : ''; ?>"
            >
                <a href="build-plans.html">Build Plans</a>
            </li>
            <li
                 class="nav__list-item <?= $data->page == 'progress' ? 'nav__list-item--active' : ''; ?>"
            >
                <a href="progress.html">Progress</a>
            </li>
            <li
                 class="nav__list-item <?= $data->page == 'buy-parts' ? 'nav__list-item--active' : ''; ?>"
            >
                <a href="buy-parts.html">Buy Parts</a>
            </li>
            <li
                 class="nav__list-item <?= $data->page == 'gallery' ? 'nav__list-item--active' : ''; ?>"
            >
                <a href="gallery.html">Gallery</a>
            </li>
            <li
                 class="nav__list-item <?= $data->page == 'history' ? 'nav__list-item--active' : ''; ?>"
            >
                <a href="history.html">K75 History</a>
            </li>
            <li
                 class="nav__list-item <?= $data->page == 'contact' ? 'nav__list-item--active' : ''; ?>"
            >
                <a href="contact.html">Contact</a>
            </li>
        </ul>
    </div>
</nav>