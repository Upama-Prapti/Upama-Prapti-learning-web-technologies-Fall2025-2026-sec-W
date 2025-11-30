document.addEventListener("DOMContentLoaded", function() {
    var images = [
        "https://images.unsplash.com/photo-1507525428034-b723cf961d3e",
        "https://images.unsplash.com/photo-1512343879784-a960bf40e7f2",
        "https://images.unsplash.com/photo-1506905925346-21bda4d32df4",
        "https://images.unsplash.com/photo-1469854523086-cc02fe5d8800",
        "https://images.unsplash.com/photo-1501594907352-04cda38ebc29"
    ];
    
    var currentIndex = 0;
    var mainImage = document.getElementById("mainImage");
    var prevButton = document.getElementById("prevButton");
    var nextButton = document.getElementById("nextButton");
    
    mainImage.src = images[currentIndex];
    
    prevButton.addEventListener("click", function() {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = images.length - 1;
        }
        mainImage.src = images[currentIndex];
    });
    
    nextButton.addEventListener("click", function() {
        currentIndex++;
        if (currentIndex >= images.length) {
            currentIndex = 0;
        }
        mainImage.src = images[currentIndex];
    });
    
    setInterval(function() {
        currentIndex++;
        if (currentIndex >= images.length) {
            currentIndex = 0;
        }
        mainImage.src = images[currentIndex];
    }, 3000);
});

