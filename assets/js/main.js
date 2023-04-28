document.addEventListener('DOMContentLoaded', () => {
  "use strict";

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Sticky header on scroll
   */
  const selectHeader = document.querySelector('#header');
  if (selectHeader) {
    document.addEventListener('scroll', () => {
      window.scrollY > 100 ? selectHeader.classList.add('sticked') : selectHeader.classList.remove('sticked');
    });
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = document.querySelectorAll('#navbar a');

  function navbarlinksActive() {
    navbarlinks.forEach(navbarlink => {

      if (!navbarlink.hash) return;

      let section = document.querySelector(navbarlink.hash);
      if (!section) return;

      let position = window.scrollY + 200;

      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active');
      } else {
        navbarlink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navbarlinksActive);
  document.addEventListener('scroll', navbarlinksActive);

  /**
   * Mobile nav toggle
   */
  const mobileNavShow = document.querySelector('.mobile-nav-show');
  const mobileNavHide = document.querySelector('.mobile-nav-hide');

  document.querySelectorAll('.mobile-nav-toggle').forEach(el => {
    el.addEventListener('click', function (event) {
      event.preventDefault();
      mobileNavToogle();
    })
  });

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavShow.classList.toggle('d-none');
    mobileNavHide.classList.toggle('d-none');
  }

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navbar a').forEach(navbarlink => {

    if (!navbarlink.hash) return;

    let section = document.querySelector(navbarlink.hash);
    if (!section) return;

    navbarlink.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  const navDropdowns = document.querySelectorAll('.navbar .dropdown > a');

  navDropdowns.forEach(el => {
    el.addEventListener('click', function (event) {
      if (document.querySelector('.mobile-nav-active')) {
        event.preventDefault();
        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('dropdown-active');

        let dropDownIndicator = this.querySelector('.dropdown-indicator');
        dropDownIndicator.classList.toggle('bi-chevron-up');
        dropDownIndicator.classList.toggle('bi-chevron-down');
      }
    })
  });

  /**
   * Scroll top button
   */
  const scrollTop = document.querySelector('.scroll-top');
  if (scrollTop) {
    const togglescrollTop = function () {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
    window.addEventListener('load', togglescrollTop);
    document.addEventListener('scroll', togglescrollTop);
    scrollTop.addEventListener('click', window.scrollTo({
      top: 0,
      behavior: 'smooth'
    }));
  }

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Initiate pURE cOUNTER
   */
  new PureCounter();

  /**
   * Init swiper slider with 1 slide at once in desktop view
   */
  new Swiper('.slides-1', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });

  /**
   * Init swiper slider with 3 slides at once in desktop view
   */
  new Swiper('.slides-3', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 40
      },

      1200: {
        slidesPerView: 3,
      }
    }
  });

  /**
   * Gallery Slider
   */
  new Swiper('.gallery-slider', {
    speed: 400,
    loop: true,
    centeredSlides: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      640: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      992: {
        slidesPerView: 5,
        spaceBetween: 20
      }
    }
  });

  /**
   * Animation on scroll function and init
   */
  function aos_init() {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', () => {
    aos_init();
  });

});
/* MENU FILTER JS */
const menu = [
  {
    id: 1,
    title: "Oejja mergeuz",
    category: "lunch",
    price: "15 DT",
    img: "https://www.tounsia.net/media/cache/singlepost/uploads/2019/02/ojja-merguez.jpg",
    ingredients: "ahahhahahha ",


  },
  {
    id: 2,
    title: "Spaghetti",
    category: "lunch",
    price: "30 DT",
    img: "https://assets.afcdn.com/recipe/20180326/78158_w1024h576c1cx2736cy1824.webp",
    ingredients: "ahahhahhaah ",

  },
  {
    id: 3,
    title: "Croissant",
    category: "Breakfast",
    price: "4 DT ",
    img: "https://assets.afcdn.com/recipe/20131024/24713_w1024h1024c1cx2747cy1872.jpg",
    ingredients: "blalalal",

  },
  {
    id: 4,
    title: "Coscous",
    category: "dinner",
    price: "45 DT",
    img: "https://www.diari.tn/sites/default/files/image/recette/couscous-viande_0.jpg",
    ingredients: "besbes ",

  },

];
const sectionCenter = document.querySelector(".section-center");
const btnContainer = document.querySelector(".btn-container");
//console.log(filterBtns);
// load items 
window.addEventListener("DOMContentLoaded", function () {
  displayMenuItems(menu);
  displayMenuBtns();
});
// console.log(displayMenu); 
function displayMenuItems(menuItems) {
  let displayMenu = menuItems.map((item) => {
    // return `<article class="menu-item">
    // <img src=${item.img} class="photo" alt=${item.title}> 
    // <div class="item-info">
    //  <header> <h4>${item.title}</h4> 
    //   <h4 class="price">${item.price}</h4> </header> 
    //   <p>${item.desc}</p>
    // </div> 
    // </article>`
    return ` <div class="col-lg-4 menu-item">
<a href=${item.img} class="glightbox"><img src=${item.img} class="menu-img img-fluid" alt=""></a>
<h4>${item.title}</h4>
<p class="ingredients"> 
  ${item.ingredients} 
</p>
<p class="price">
  ${item.price}
</p>
</div>`
      ;
  });
  displayMenu = displayMenu.join("");
  sectionCenter.innerHTML = displayMenu;
}

function displayMenuBtns() {
  const categories = menu.reduce((values, item) => {
    if (!values.includes(item.category)) {
      values.push(item.category);
    }
    return values;
  }, ["all"]);

  const categoryBtns = categories.map((category) => {
    return `  <button class="filter-btn" type="button" data-id=${category}>${category}</button>`;
  }).join("");
  btnContainer.innerHTML = categoryBtns;
  const filterBtns = btnContainer.querySelectorAll(".filter-btn");
  console.log(categoryBtns);

  // filter items 
  filterBtns.forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      // console.log(e); 
      const category = e.currentTarget.dataset.id;
      const menuCategory = menu.filter(function (menuItem) {
        //  console.log(menuItem.category); 
        if (menuItem.category === category) {
          return menuItem;
        }
      });
      //  console.log(menuCategory);  
      if (category === "all") {
        displayMenuItems(menu);
      } else {
        displayMenuItems(menuCategory);
      }
    });
  });
};


function add() {

  var instruction = document.getElementById("in");
  var li = document.createElement("li");
  li.textContent = instruction.value;

  if (!document.getElementById("list")) {
    var oll = document.createElement("ol");
    var divv = document.createElement("div");
    var lk = document.getElementById("lk");
    oll.id = "list";
    oll.setAttribute("name", "list");
    lk.appendChild(divv);
    divv.appendChild(oll);
  }

  var oli = document.getElementById("list");
  oli.appendChild(li);
  instruction.value = '';
}