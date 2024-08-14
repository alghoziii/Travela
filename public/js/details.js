document.addEventListener('DOMContentLoaded', function() {
    const thumbnailLinks = document.querySelectorAll('.thumbnail-option');
  
    thumbnailLinks.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
  
        const clickedLink = event.currentTarget;
        const imageThumbnail = document.getElementById('image-thumbnail');
  
        // Change the src of the main image
        const newSrc = clickedLink.getAttribute('href');
        imageThumbnail.setAttribute('src', newSrc);
  
        // Toggle opacity and border classes
        thumbnailLinks.forEach(function(link) {
          link.classList.remove('border-blue');
          link.classList.add('opacity-50');
        });
  
        clickedLink.classList.remove('opacity-50');
        clickedLink.classList.add('border-blue');
      });
    });
  });