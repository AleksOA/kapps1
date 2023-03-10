
// ===============================



menuHeader();

function menuHeader(){
    let menuItem = document.querySelectorAll('.menu-item-has-children');
    let header = document.querySelector('.header');
    let btnMenu = document.querySelector('.btn-menu');
    let btnClose = document.querySelector('.close');
    let btnHeader = document.querySelector('.btn-header');
    let headerMenu = document.querySelector('.header-menu');



    function openMenu(){
        headerMenu.classList.add('open');
        btnHeader.classList.add('open');
    }
    function closeMenu(){
        headerMenu.classList.remove('open');
        btnHeader.classList.remove('open');
    }

    function menuClose(event){
        if(!event.target.closest('.header-menu') && !event.target.closest('.btn-menu')){
            closeMenu();
        }
    }
    btnMenu.addEventListener('click', openMenu);
    btnClose.addEventListener('click', closeMenu);
    document.addEventListener('click', menuClose);




    $(window).scroll(function() {
        let scroll = window.pageYOffset;
        if(scroll > 20){
            header.classList.add('scroll');
        }
        if(scroll < 20){
            header.classList.remove('scroll');
        }
    });



    if(menuItem != undefined){
        menuItem.forEach(item =>{
            item.addEventListener('mouseenter', openSubMenu);
            // item.addEventListener('click', openSubMenu);
            item.addEventListener('mouseleave', closeSubMenu);

        })
    }
}

function openSubMenu(){
    this.classList.add('open');
}

function closeSubMenu(){
    this.classList.remove('open');
}


//===============================