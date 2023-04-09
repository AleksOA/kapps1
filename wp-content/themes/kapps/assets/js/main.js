
// ===============================



menuHeader();

function menuHeader(){
    let menuItem = document.querySelectorAll('.menu-item-has-children');
    let header = document.querySelector('.header');
    let btnMenu = document.querySelector('.btn-menu');
    let btnClose = document.querySelector('.close');
    let btnHeader = document.querySelector('.btn-header');
    let headerMenu = document.querySelector('.header-menu');
    let btnUp = document.querySelector('.btn-up');
    let technologies_link = document.getElementById('menu-item-59').children[0];
    let services_link = document.getElementById('menu-item-58').children[0];
    let technologies_footer_link = document.getElementById('menu-item-120').children[0];
    let services_footer_link = document.getElementById('menu-item-112').children[0];
    let banner_slick_button_one = document.querySelectorAll('.banner__slick-item-button-one');

    banner_slick_button_one.forEach(button =>{
        button.addEventListener('click', (event)=>{
            event.preventDefault();
        });
    });

    technologies_link.addEventListener('click', (event)=>{
        event.preventDefault();
    });
    services_link.addEventListener('click', (event)=>{
        event.preventDefault();
    });
    technologies_footer_link.addEventListener('click', (event)=>{
        event.preventDefault();
    });
    services_footer_link.addEventListener('click', (event)=>{
        event.preventDefault();
    });



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
            btnUp.classList.add('visible');
        }
        if(scroll < 20){
            header.classList.remove('scroll');
            btnUp.classList.remove('visible');
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


// Partners
// ==========================================
const partnersItem = document.querySelectorAll('.partner__item');
let qw =true;
const screenWidth = document.documentElement.clientWidth;
const btnMore = document.querySelector('.partner__btn-more');


const title = document.querySelector('.partners__title');


function removeHidden(min, point){
    partnersItem.forEach((item, index) => {
        if(index>min && index < 8 && point == 705)  {
            item.classList.remove('hidden');
        }
        if(index>min && index < 10 && point == 1025)  {
            item.classList.remove('hidden');
        }
        if( min == undefined )  {
            item.classList.remove('hidden');
        }
        if(point == 'more') {
            item.classList.remove('hidden');
        }

    });
}

function  hideItem(data){
 let length = partnersItem.length;
 if(length > data) {
     partnersItem.forEach((item, index) => {
         if(index>data) {
                item.classList.add('hidden');
         }
     });
 }

}


if(partnersItem.length != 0 && btnMore != null ) {
    firstRendering(screenWidth);
}

function firstRendering(screenWidth1){
    if ( screenWidth1 < 346  ) {
        removeHidden();
        hideItem(3);
        qw = 0;

        btnMore.setAttribute('data-index', '4');
        btnMore.setAttribute('data-add-item', '1');
    }else if (346 < screenWidth1 && screenWidth1 < 1025 && qw != 0 ) {
        removeHidden();
        hideItem(7);
        qw = 1;

        btnMore.setAttribute('data-index', '8');
        btnMore.setAttribute('data-add-item', '2');
    }else if (1025 < screenWidth1 && screenWidth1 < 1316) {
        removeHidden();
        hideItem(8);
        qw = 2;

        btnMore.setAttribute('data-index', '9');
        btnMore.setAttribute('data-add-item', '3');
    } else if (1317 < screenWidth1) {
        removeHidden();
    }
}



if(partnersItem.length != 0 && btnMore != null ) {
    window.addEventListener("resize", toggleItem);
}


function toggleItem() {
    let screenWidth = document.documentElement.clientWidth;

    if ( screenWidth < 346  ) {
        hideItem(3);
        qw = 0;
        btnMore.classList.remove('hidden'); // 123


    }else if (346 < screenWidth && screenWidth < 1024 && qw != 0 ) {
        hideItem(7);
        qw = 1;
        btnMore.classList.remove('hidden'); // 123

    }else if (1024 < screenWidth && screenWidth < 1316 && qw != 1 && qw != 0) {
        hideItem(8);
        qw = 2;
        btnMore.classList.remove('hidden'); // 123


    }

    if(screenWidth > 1317 ){
        removeHidden();
        qw = 2;
    }else if(screenWidth > 1025 && qw != 2){
        removeHidden(8, 1025);

    }else if(screenWidth > 346 && qw != 2 && qw != 1){
        removeHidden(3, 705);

    }
}

// ===================================


if(partnersItem.length != 0 && btnMore != null ) {
    btnMore.addEventListener('click', addItem);
}

function addItem() {
    removeHidden('', 'more');
    btnMore.classList.add('hidden');

}

// ==========================================



// Popup contact us
// =============================================

const popupContactUs = document.querySelector('.popup-contact-us');
const btnClosePopup = document.querySelector('.popup__close-btn');
const btnHeader = document.querySelector('.btn-header');
const btnHeaderDesktop = document.querySelector('.btn-header--desktop');
const btnHeaderMobile = document.querySelector('.btn-header--mobile');
const btnTalk = document.querySelector('.let-is-talk__btn');
const body = document.querySelector('body');

function openPopupContactUs(event) {
    event.preventDefault();
    popupContactUs.classList.add('open');
    body.classList.add('popup-open');
}
function closePopupContactUs() {
    popupContactUs.classList.remove('open');
    body.classList.remove('popup-open');

}

// btnHeader.addEventListener('click', openPopupContactUs);
btnHeaderDesktop.addEventListener('click', openPopupContactUs);
btnHeaderMobile.addEventListener('click', openPopupContactUs);
if(btnTalk != null) { btnTalk.addEventListener('click', openPopupContactUs)}
btnClosePopup.addEventListener('click', closePopupContactUs);
document.addEventListener('click', (event)=>{
    if(!event.target.closest(".popup__content") && !event.target.closest(".let-is-talk__btn") && !event.target.closest(".btn-header") && !event.target.closest(".openings__item-btn") ) {
        closePopupContactUs();
    }
});
// ==========================================


// Join the team start
// ==============================================
const openingsItemBtn = document.querySelectorAll('.openings__item-btn--first');
const openingsItemBtnSecond = document.querySelectorAll('.openings__item-btn--second');
const popupCurrentOpenings = document.querySelector('.popup-current-openings');
const btnClosePopupAll = document.querySelectorAll('.popup__close-btn');
const formJoinOpeningName = document.getElementById('formJoinOpeningName');


function openPopupCurrentOpenings(event) {
    event.preventDefault();
    if(this.closest('.openings__item-btn--first ') != null) {
        let valueTitle = this.parentNode.querySelector('.openings__item-title').innerHTML;
        formJoinOpeningName.innerHTML = valueTitle;
    }

    if(this.closest('.openings__item-btn--second ') != null) {
        let valueTitle = this.parentNode.parentNode.parentNode.parentNode.querySelector('.openings__item-title').innerHTML;
        formJoinOpeningName.innerHTML = valueTitle;
    }

    popupCurrentOpenings.classList.add('open');
    body.classList.add('popup-open');
}
function closePopupCurrentOpenings() {
    popupCurrentOpenings.classList.remove('open');
    popupContactUs.classList.remove('open');
    body.classList.remove('popup-open');

}

if(body.classList.contains('page-template-join_the_team')) {
    btnClosePopupAll.forEach((item) =>{
        item.addEventListener('click', closePopupCurrentOpenings);
    })

    document.addEventListener('click', (event)=>{
        if(!event.target.closest(".popup__content") && !event.target.closest(".openings__item-btn") && !event.target.closest(".btn-header") ) {
            closePopupCurrentOpenings();
        }
    });


    if(openingsItemBtn != null){
        openingsItemBtn.forEach((item) =>{
            item.addEventListener('click', openPopupCurrentOpenings);
        })
    }

    if(openingsItemBtnSecond != null){
        openingsItemBtnSecond.forEach((item) =>{
            item.addEventListener('click', openPopupCurrentOpenings);
        })
    }
}
// ==============================================
// Join the team finish



// Blog single start
// ==============================================
const blogShare = document.querySelector('.blog__share');
const shareBtn = document.querySelector('.blog__share-btn');

function openButtonsShare(){
    console.log('openButtonsShare');
    blogShare.classList.toggle('open');
}

if(shareBtn != null) {
    shareBtn.addEventListener('click', openButtonsShare);
}

// ==============================================
// Blog single finish

// Clutch finish
// ==============================================
const btnClutch = document.querySelector('.clutch__item-button-link-btn');

if(btnClutch != null){
    btnClutch.addEventListener('click', (event)=>{
        event.preventDefault();
    });
}
// ==============================================
// Clutch finish
