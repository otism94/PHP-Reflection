/**
 * Toggleable search bar
 */
let searchVisible = false;
$('.btn-search-toggle').on('click', () => {
    if (!searchVisible) {
        $('.buttons').fadeOut(200, () => {
            $('.search-bar').fadeIn(200, () => searchVisible = true);
        });
    } else {
        $('.search-bar').fadeOut(200, () => {
            $('.buttons').fadeIn(200, () => searchVisible = false);
        });
    }
})

/**
 * Sticky header
 */
// Get header height on document load and window resize
let headerHeight = 0;
$(document).ready(() => headerHeight = $('#topbar').outerHeight());
$(window).resize(() => {
    if (headerHeight !== $('#topbar').outerHeight()) {
        headerHeight = $('#topbar').outerHeight();
    }
    const scrollBarWidth = $(window).width() - $('#header-space').width();
    $('#topbar').css('width', `calc(100% - ${scrollBarWidth}px)`);
});

// Clone header
const createHeaderClone = () => {
    const clonedHeader = $('#topbar').clone();
    clonedHeader.prop('id', 'topbar-clone');
    $('#header-space').append(clonedHeader);
};

// Unclone header
const removeHeaderClone = () => $('#topbar-clone').remove();

// Check if browser is IE
const isIE = /*@cc_on!@*/false || !!document.documentMode;

// Sticky header event listener
let fromSideMenu = false;
let lastScrollTop = 0;
$('#container').on('scroll', function() {
    // Opening/closing sidebar causes a scroll; do nothing if this is the case
    if (!fromSideMenu) {
        clearTimeout($.data(this, 'scrollTimer'));
        // Fire scroll event if haven't scrolled in 200ms
        $.data(this, 'scrollTimer', setTimeout(() => {
            const st = $('#container').scrollTop();

            // Scroll down main event
            if (st > lastScrollTop) {
                if ($('#topbar').css('position') === 'fixed') {
                    $('#topbar').animate({top: -headerHeight}, 200, () => {
                        $('#topbar').css({'position': 'absolute',
                            'width': '100%',
                            'box-shadow': 'none'})
                            .animate({top: 0}, 0, () => {
                            fromSideMenu = false;
                            removeHeaderClone();
                        });
                    });
                }
        
            // Unstick header if scrolled all the way to the top
            } else if (st === 0 && $('#topbar').css('position') === 'fixed') {
                $('#topbar').animate({top: 0}, 0, () => {
                    $('#topbar').css({
                        'position': 'absolute',
                        'width': '100%',
                        'box-shadow': 'none'
                    });
                    removeHeaderClone();
                });
        
            // Empty condition to prevent sticky header appearing when scrolling up while in static header range
            } else if (st <= headerHeight) {
        
            // Scroll up main event
            } else if (st < lastScrollTop && st > headerHeight) {
                if ($('#topbar').css('position') === 'absolute') {
                    if (!$('#topbar-clone').length) {
                        createHeaderClone();
                    }
                    const scrollBarWidth = $(window).width() - $('#header-space').width()
                    $('#topbar').animate({top: -headerHeight}, 0, () => {
                        $('#topbar').css({
                            'position': 'fixed',
                            'width': `calc(100% - ${scrollBarWidth}px)`,
                            'box-shadow': '0 0 30px rgba(0, 0, 0, .15)'
                        })
                            .animate({top: 0}, 200);
                    });
                }
            }
            lastScrollTop = st;
        }, 200));
    }
});

/**
 * Side menu / Hamburger
 */
$('.menu-btn').click(() => {
    fromSideMenu = true;
    $('.menu-btn').toggleClass('is-active');
    $('#topbar').css({
        'top': $('#container').scrollTop(),
        'width': '100%'
    });
    isIE && $('#topbar').addClass('topbar-ie');
    if (isIE && $('#topbar').css('position') === 'fixed') {
        const scrollBarWidth = $(window).width() - $('#header-space').width();
        $('#topbar').addClass('push')
            .css('width', `calc(100% - ${scrollBarWidth}px)`);
    }
});

$('.site-overlay').click(() => {
    setTimeout(() => {
        const scrollBarWidth = $(window).width() - $('#header-space').width()
        $('#topbar').css('top', 0);
        $('#topbar').css('position') === 'fixed' && $('#topbar').css('width', `calc(100% - ${scrollBarWidth}px)`)
        isIE && $('#topbar').removeClass('topbar-ie push');
        fromSideMenu = false;
    }, 510); // I have no idea why this needs to be 510ms, but it does
    $('.menu-btn').toggleClass('is-active');

});

/**
 * Banner carousel
 */
// Carousel options
$('#banner-carousel').slick({
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: false,
    dots: true
});

// Additional formatting for the banner buttons
const bannerButtons = document.querySelectorAll('.btn-banner');
for (let i = 0; i < bannerButtons.length; i++) {
    bannerButtons[i].firstElementChild.textContent += `\xa0\xa0\xa0\xa0\xa0`;
}

/**
 * Cookies popup
 */
$(document).ready(function() {
    if(localStorage.getItem('eucookie') != '123'){
        $('#privacy-popup').css('display', 'flex');
    } 
    $('#cookies-accept').click(function() { 
        jQuery('#privacy-popup').css('display', 'none');
        localStorage.setItem('eucookie','123');
    });
});

/**
 * Out of Hours info click event listener
 */
$('#details-oohq').on('click', () => {
    const $details = $('#details-ooha');
    if ($details.css('display') === 'none') {
        $details.slideDown(500);
    } else {
        $details.slideUp(500);
    }
})

/**
 * Contact form invalid fields handler
 * Nightmare spaghetti but it works very well
 */
window.addEventListener('load', () => {
    let formToReview = '';
    let invalidFields = [];
    // Check for any input elements with the invalid class
    // Either the contact form or the newsletter form
    if (document.querySelectorAll('.contact-form--invalid').length) {
        formToReview = 'contact-form';
        invalidFields = document.querySelectorAll('.contact-form--invalid');
    } else if (document.querySelectorAll('.form-newsletter--invalid').length) {
        formToReview = 'form-newsletter';
        invalidFields = document.querySelectorAll('.form-newsletter--invalid');
    }

    // If any fields are invalid
    if (invalidFields.length) {
        let errorList = [];
        // Display the appropriate error list element (to be populated later)
        if (formToReview === 'contact-form') {
            errorList = document.getElementById('contact-us--form-errors');
        } else if (formToReview === 'form-newsletter') {
            errorList = document.querySelector('.form-newsletter--form-errors');
        }
        errorList.style.display = 'block';
        // Get the <ul> child element within the error list
        const errorListUL = errorList.childNodes[3];
        // Focus text cursor in topmost invalid field
        invalidFields[0].focus();

        // Loop through each invalid field
        invalidFields.forEach(element => {
            // Create an <li> element for each invalid field
            const listItem = document.createElement('li');
            // Get the field's name attribute, capitalise properly, and make that the <li>'s innerHTML
            const name = element.getAttribute('name');
            listItem.innerHTML = name.charAt(0).toUpperCase() + name.slice(1);
            // Append the <li> to the <ul>
            errorListUL.appendChild(listItem);
            // Get the user's initial bad value from the invalid field
            const initialValue =  element.value;

            // Listen to the invalid field for user input
            element.addEventListener('input', () => {
                // If the value isn't blank and is different from the initial invalid value
                if (element.value.length && element.value !== initialValue) {
                    // Remove the invalid class
                    element.classList.remove(`${formToReview}--invalid`);
                    // Loop through the <li> elements and hide the one that matches this field
                    errorListUL.childNodes.forEach(li => {
                        if (element.getAttribute('name') === li.textContent.toLowerCase()) {
                            li.style.display = 'none';
                        }
                    });

                    // Now prepare to hide the entire error message if all invalid fields have been changed acceptably
                    let hideList = true;
                    // Loop through each <li> element and see if it's showing (i.e. display === null or 'list-item')
                    // Stop the loop and do not hide the error message if any <li>s are visible
                    for (let i = 0; i < errorListUL.childNodes.length; i++) {
                        if (!errorListUL.childNodes[i].style.display || errorListUL.childNodes[i].style.display === 'list-item') {
                            hideList = false;
                            break;
                        }
                    }
                    // Show/hide the error message accordingly
                    if (hideList) {
                        errorList.style.display = 'none';
                    } else {
                        errorList.style.display = 'block';
                    }

                // User inputs a blank field or re-enters the initial value
                } else {
                    // Add the invalid class
                    element.classList.add(`${formToReview}--invalid`);
                    // Loop through the <li> elements and show the one that matches this field
                    errorListUL.childNodes.forEach(li => {
                        if (element.getAttribute('name') === li.textContent.toLowerCase()) {
                            li.style.display = 'list-item';
                        }
                    })

                    // Now prepare to hide the entire error message if all invalid fields have been changed acceptably
                    let hideList = true;
                    // Loop through each <li> element and see if it's showing (i.e. display === null or 'list-item')
                    // Stop the loop and do not hide the error message if any <li>s are visible
                    for (let i = 0; i < errorListUL.childNodes.length; i++) {
                        if (!errorListUL.childNodes[i].style.display || errorListUL.childNodes[i].style.display === 'list-item') {
                            hideList = false;
                            break;
                        }
                    }
                    // Show/hide the error message accordingly
                    if (hideList) {
                        errorList.style.display = 'none';
                    } else {
                        errorList.style.display = 'block';
                    }
                }
            });
        });
    }
});