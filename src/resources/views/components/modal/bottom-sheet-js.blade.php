<script>
    let hideOnClickOutside = '{{ $hideOnClickOutside }}'

    const showBottomSheet = (id) => {

        const bs = document.getElementById(id);

        bs.classList.toggle('show');
        bs.querySelector('.bottom-sheet-content').classList.toggle('show');

        if (hideOnClickOutside == 'true') {
            window.onclick = (event) => {
                if (event.target == bs) {
                    bs.classList.toggle('show');
                    bs.querySelector('.bottom-sheet-content').classList.toggle('show');
                }
            }
        }

    }

    const closeBottomSheet = (e) => {
        e.parentElement.parentElement.parentElement.classList.toggle('show');
        e.parentElement.parentElement.classList.toggle('show');
    };
</script>
