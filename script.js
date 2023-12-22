// Smooth scrolling for anchor links
document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();
  
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
  
        if (targetElement) {
          targetElement.scrollIntoView({ behavior: 'smooth' });
        }
      });
    });
  });

  function scrollToSection(sectionId) {
    var section = document.getElementById(sectionId);
    
    if (section) {
      section.scrollIntoView({ behavior: 'smooth' });
    }
  }
  

  document.addEventListener("DOMContentLoaded", function () {
    var homeSection = document.getElementById("home");
  
    function handleScroll() {
      var scrollPosition = window.scrollY;
      var threshold = homeSection.offsetTop + homeSection.offsetHeight * 0.7;
  
      if (scrollPosition >= threshold) {
        homeSection.classList.add("animate");
      }
    }
  
    // Trigger animation on page load
    homeSection.classList.add("animate");
  
    window.addEventListener("scroll", handleScroll);
  });
   

  document.addEventListener("DOMContentLoaded", function () {
    var menuItems = document.querySelectorAll(".menu-item");
    var options = {
      rootMargin: "0px",
      threshold: 0.5,
    };
  
    var observer = new IntersectionObserver(function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("in-view");
        }
      });
    }, options);
  
    menuItems.forEach(function (item) {
      observer.observe(item);
    });
  
    // Trigger animation on page load
    document.getElementById("menu").classList.add("animate");
  });

  
  document.addEventListener("DOMContentLoaded", function () {
    var reserveTable = document.getElementById("reserve-table2");
  
    function isElementInViewport(el) {
      var rect = el.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <=
          (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    }
  
    function addAnimationClass() {
      if (isElementInViewport(reserveTable)) {
        reserveTable.classList.add("animate");
        window.removeEventListener("scroll", addAnimationClass);
      }
    }
  
    window.addEventListener("scroll", addAnimationClass);
    addAnimationClass(); // Call it initially to check if it's in the viewport on page load
  });