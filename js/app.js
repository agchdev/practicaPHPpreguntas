$(document).ready(function() {
    
    $('.button').bind('click', function() {
        const divModal = document.createElement("div");
        const divFrame = document.querySelector(".frame");
        divFrame.innerHTML = `
            <div class="modal">
                <img src="https://100dayscss.com/codepen/alert.png" width="44" height="38" />
                <span class="title">ERROR!</span>
                <p>Este nombre de usuario ya está en uso.</p>
                <div class="button">Cerrar</div>
            </div>
        `;
        divModal.append(divFrame);
        $('.modal').addClass('hide');
        setTimeout(() => {
            divModal.remove();
        }, 1000);
    });
});