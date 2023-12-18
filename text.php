<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden;
        }

        .slider {
            width: 60%;
            height: 40%;
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
        }

        img {
            width: 60%;
            height: 40%;
        }

        @media screen and (max-width: 768px) {
            .slide {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="slider-container">
        
    </div>

    <script>
        const slides = document.querySelector('.slides');

        function nextSlide() {
            slides.style.transition = "transform 0.5s ease-in-out";
            slides.style.transform = "translateX(-100%)";
            setTimeout(() => {
                slides.style.transition = "none";
                slides.appendChild(slides.firstElementChild);
                slides.style.transform = "translateX(0)";
            }, 500);
        }

        setInterval(nextSlide, 3000); // Change slide every 3 seconds
    </script>

</body>
</html>
