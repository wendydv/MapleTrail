// Get the current year for the copyright
$('#year').text(new Date().getFullYear());

  // Configure Slider
  $('.carousel').carousel({
    interval: 4000,
    //pause: 'hover',
  });

  //Init Slick Testimonials Slider
  $('.slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
 });

// Scroll Animations
 const feaders = document.querySelectorAll('.fade-in');
 const sliders = document.querySelectorAll('.slide-in');
 const appearOptions = {
   threshold: 0,
   rootMargin: "0px 0px -250px 0px"
 };
 const appearOnScroll = new IntersectionObserver(
   function(
     entries, 
     appearOnScroll
     ){
       entries.forEach(entry => {
        if(!entry.isIntersecting){
          return;
        }else{
          entry.target.classList.add('appear');
          appearOnScroll.unobserve(entry.target);
        }

       })
     }, 
     appearOptions);

  feaders.forEach(fader => {
    appearOnScroll.observe(fader);
  });

  sliders.forEach(slider => {
    appearOnScroll.observe(slider);
  });
  
