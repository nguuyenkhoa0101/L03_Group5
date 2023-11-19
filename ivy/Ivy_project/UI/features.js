// Product
// Tab product detail
const tabs= document.querySelectorAll('.product-tab-btn')
const all_content= document.querySelectorAll('.product-tab-content')
tabs.forEach((tab, index)=>{
    tab.addEventListener('click', (event)=>{
        tabs.forEach(tab=>{tab.classList.remove('active')})
        tab.classList.add('active')

        var line = document.querySelector('.line')
        line.style.width = event.target.offsetWidth + "px"
        line.style.left = event.target.offsetLeft + "px"
        
        all_content.forEach(content => {content.classList.remove('active')})
        all_content[index].classList.add('active')
    })

    
})

const button = document.querySelector(".show-more")
if(button)
{
    button.addEventListener("click", function() {
        document.querySelector(".product-detail-container").classList.toggle("activeB")
    })
}

// Cart-tab

const icon_cart = document.querySelector('.icon-cart')
const cart_tab = document.querySelector('.cart-tab')
const close_btn = document.querySelector('.close')

icon_cart.addEventListener('click', () => {
    cart_tab.classList.add('active')
})

close_btn.addEventListener('click', () => {
    cart_tab.classList.remove('active')
}) 

// Related product
var mySwiper = new Swiper('.swiper-container', {
    loop: true,
    // Các tùy chọn khác
});