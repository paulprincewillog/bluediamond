window.addEventListener('load', function () {
  
  dd("#loading_cover").fadeOut(500);
  
  setTimeout(() => {
      dd("#iframe_map").select().src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.0235317057222!2d5.792473513560625!3d5.5635298959662585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1041adb341059367%3A0x85ef7875cfab9aab!2sBlue%20Diamond%20School!5e0!3m2!1sen!2sng!4v1600442938081!5m2!1sen!2sng";
  }, 5000);
  
  
  
});