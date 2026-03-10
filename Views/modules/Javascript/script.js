/* --- JAVASCRIPT INTEGRADO --- */
        const userContainer = document.getElementById('userContainer');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const arrowIcon = document.getElementById('arrowIcon');

        // Abre e fecha o menu ao clicar no nome/ícone
        userContainer.addEventListener('click', (e) => {
            e.stopPropagation(); // Evita que o evento clique se espalhe
            dropdownMenu.classList.toggle('active');
            arrowIcon.classList.toggle('rotate-180');
        });

        // Fecha o menu se clicar em qualquer outro lugar da página
        document.addEventListener('click', (e) => {
            if (!userContainer.contains(e.target)) {
                dropdownMenu.classList.remove('active');
                arrowIcon.classList.remove('rotate-180');
            }
        });