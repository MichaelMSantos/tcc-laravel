document.addEventListener('DOMContentLoaded', () => {
    const htmlElement = document.documentElement;
    const themeButton = document.getElementById('darkModeSwitch');
    const themeIcon = document.getElementById('themeIcon');
    
    const currentTheme = localStorage.getItem('bsTheme') || 'light';
    htmlElement.setAttribute('data-bs-theme', currentTheme);

    themeIcon.className = currentTheme === 'light' ? 'bi bi-moon' : 'bi bi-sun';

    themeButton.addEventListener('click', function() {
        const newTheme = htmlElement.getAttribute('data-bs-theme') === 'light' ? 'dark' : 'light';
        htmlElement.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('bsTheme', newTheme);

        themeIcon.className = newTheme === 'light' ? 'bi bi-moon' : 'bi bi-sun';

    });
});