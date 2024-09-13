document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const submenu = document.querySelector('.submenu');

    if (menuToggle && submenu) {
        menuToggle.addEventListener('click', function () {
            submenu.classList.toggle('hidden');
            submenu.classList.toggle('transition-all');
            submenu.classList.toggle('duration-300');

            // Cập nhật aria-expanded để cải thiện khả năng truy cập
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
        });

        // Đóng menu khi nhấp ra ngoài
        document.addEventListener('click', function (event) {
            if (!menuToggle.contains(event.target) && !submenu.contains(event.target)) {
                submenu.classList.add('hidden');
            }
        });
    } else {
        console.error('Menu toggle or submenu element not found');
    }
});